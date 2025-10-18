<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $teacher = Auth::user();
        
        // Get subjects assigned to this teacher
        $my_subjects = Subject::whereHas('teachers', function($query) use ($teacher) {
            $query->where('teacher_subjects.teacher_id', $teacher->id)
                  ->where('teacher_subjects.is_active', true);
        })->with(['teachers' => function($query) use ($teacher) {
            $query->where('teacher_subjects.teacher_id', $teacher->id);
        }])->get();

        // Get students from classes this teacher teaches
        $my_classes = DB::table('teacher_subjects')
            ->where('teacher_subjects.teacher_id', $teacher->id)
            ->where('teacher_subjects.is_active', true)
            ->pluck('class')
            ->unique();
            
        $students_in_my_classes = Student::whereIn('class', $my_classes)->get();

        // Stats with real data
        $stats = [
            'my_subjects' => $my_subjects->count(),
            'my_classes' => $my_classes->count(),
            'total_students_in_classes' => $students_in_my_classes->count(),
            'grades_given' => Grade::where('teacher_id', $teacher->id)->count(),
            'attendances_today' => Attendance::where('teacher_id', $teacher->id)
                ->whereDate('date', today())->count(),
        ];

        // Recent grades given by this teacher
        $recent_grades = Grade::where('teacher_id', $teacher->id)
            ->with(['student', 'subject'])
            ->latest()
            ->take(5)
            ->get();

        return view('teacher.dashboard', compact('stats', 'my_subjects', 'recent_grades', 'students_in_my_classes'));
    }

    public function students()
    {
        $teacher = Auth::user();
        
        // Get classes this teacher teaches
        $my_classes = DB::table('teacher_subjects')
            ->where('teacher_subjects.teacher_id', $teacher->id)
            ->where('teacher_subjects.is_active', true)
            ->pluck('class')
            ->unique();
        
        // Get students from those classes
        $students = Student::with('parent')
            ->whereIn('class', $my_classes)
            ->paginate(20);
        
        return view('teacher.students.index', compact('students', 'my_classes'));
    }

    public function grades()
    {
        $teacher = Auth::user();
        
        // Get grades given by this teacher
        $grades = Grade::where('teacher_id', $teacher->id)
            ->with(['student', 'subject'])
            ->latest()
            ->paginate(20);
        
        return view('teacher.grades.index', compact('grades'));
    }

    public function attendances()
    {
        $teacher = Auth::user();
        
        // Get attendances taken by this teacher
        $attendances = Attendance::where('teacher_id', $teacher->id)
            ->with(['student', 'subject'])
            ->latest()
            ->paginate(20);
        
        return view('teacher.attendances.index', compact('attendances'));
    }

    public function createGrade()
    {
        $teacher = Auth::user();
        
        // Get subjects this teacher teaches
        $subjects = Subject::whereHas('teachers', function($query) use ($teacher) {
            $query->where('teacher_subjects.teacher_id', $teacher->id)
                  ->where('teacher_subjects.is_active', true);
        })->get();
        
        // Get students from classes this teacher teaches
        $my_classes = DB::table('teacher_subjects')
            ->where('teacher_subjects.teacher_id', $teacher->id)
            ->where('teacher_subjects.is_active', true)
            ->pluck('class')
            ->unique();
            
        $students = Student::whereIn('class', $my_classes)->get();
        
        return view('teacher.grades.create', compact('subjects', 'students'));
    }

    public function storeGrade(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'type' => 'required|in:tugas,quiz,uts,uas',
            'score' => 'required|numeric|min:0|max:100',
            'academic_year' => 'required|string',
            'semester' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        Grade::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => Auth::id(),
            'type' => $request->type,
            'score' => $request->score,
            'academic_year' => $request->academic_year,
            'semester' => $request->semester,
            'notes' => $request->notes
        ]);

        return redirect()->route('teacher.grades')->with('success', 'Nilai berhasil ditambahkan');
    }

    public function createAttendance()
    {
        $teacher = Auth::user();
        
        // Get subjects this teacher teaches
        $subjects = Subject::whereHas('teachers', function($query) use ($teacher) {
            $query->where('teacher_subjects.teacher_id', $teacher->id)
                  ->where('teacher_subjects.is_active', true);
        })->get();
        
        // Get students from classes this teacher teaches
        $my_classes = DB::table('teacher_subjects')
            ->where('teacher_subjects.teacher_id', $teacher->id)
            ->where('teacher_subjects.is_active', true)
            ->pluck('class')
            ->unique();
            
        $students = Student::whereIn('class', $my_classes)->get();
        
        return view('teacher.attendances.create', compact('subjects', 'students'));
    }

    public function storeAttendance(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date',
            'status' => 'required|in:hadir,tidak_hadir,izin,sakit',
            'notes' => 'nullable|string'
        ]);

        Attendance::updateOrCreate([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'date' => $request->date
        ], [
            'teacher_id' => Auth::id(),
            'status' => $request->status,
            'notes' => $request->notes
        ]);

        return redirect()->route('teacher.attendances')->with('success', 'Absensi berhasil dicatat');
    }

    public function profile()
    {
        $teacher = Auth::user();
        return view('teacher.profile', compact('teacher'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string'
        ]);

        $teacher = Auth::user();
        $teacher->update($request->only('name', 'email', 'phone', 'address'));

        return redirect()->route('teacher.profile')->with('success', 'Profil berhasil diperbarui');
    }
}