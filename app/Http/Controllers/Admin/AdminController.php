<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\Subject;
// use App\Models\Payment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Real stats with actual data - use try-catch to handle missing tables
        $stats = [
            'total_students' => $this->safeCount(Student::class),
            'total_teachers' => User::where('role', 'guru')->count(),
            'total_parents' => User::where('role', 'orang_tua')->count(),
            'total_subjects' => $this->safeCount(Subject::class),
            'pending_payments' => 0, // Payment::where('status', 'pending')->count(),
            'overdue_payments' => 0, // Payment::overdue()->count(),
        ];

        $recent_news = News::latest()->take(5)->get();
        // $recent_payments = Payment::with('student')->latest()->take(10)->get();

        return view('admin.dashboard', compact('stats', 'recent_news'));
    }

    /**
     * Safely count records from a model, return 0 if table doesn't exist
     */
    private function safeCount($modelClass)
    {
        try {
            return $modelClass::count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function users()
    {
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,guru,orang_tua',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['email_verified_at'] = now();
        $validated['is_active'] = $request->has('is_active');

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,guru,orang_tua',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed'
            ]);
            $validated['password'] = Hash::make($request->password);
        }

        $validated['is_active'] = $request->has('is_active');

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui!');
    }

    public function deleteUser(User $user)
    {
        // Prevent admin from deleting themselves
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }

    public function students()
    {
        $search = request('search');
        $class = request('class');
        $status = request('status');
        
        $query = Student::with('parent');
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        }
        
        if ($class) {
            $query->where('class', $class);
        }
        
        if ($status !== null) {
            $query->where('is_active', $status);
        }
        
        $students = $query->paginate(20);
        $classes = Student::distinct()->pluck('class');
        
        return view('admin.students.index', compact('students', 'classes'));
    }

    public function createStudent()
    {
        $parents = User::where('role', 'orang_tua')->get();
        $classes = ['7A', '7B', '7C', '8A', '8B', '8C', '9A', '9B', '9C'];
        return view('admin.students.create', compact('parents', 'classes'));
    }

    public function storeStudent(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:students,nis',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'class' => 'required|string|max:10',
            'parent_id' => 'required|exists:users,id',
        ]);

        $validated['is_active'] = true;
        
        Student::create($validated);
        
        return redirect()->route('admin.students')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function showStudent(Student $student)
    {
        $student->load('parent');
        return view('admin.students.show', compact('student'));
    }

    public function editStudent(Student $student)
    {
        $parents = User::where('role', 'orang_tua')->get();
        $classes = ['7A', '7B', '7C', '8A', '8B', '8C', '9A', '9B', '9C'];
        return view('admin.students.edit', compact('student', 'parents', 'classes'));
    }

    public function updateStudent(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id,
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'class' => 'required|string|max:10',
            'parent_id' => 'required|exists:users,id',
            'is_active' => 'required|boolean',
        ]);
        
        $student->update($validated);
        
        return redirect()->route('admin.students')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroyStudent(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students')->with('success', 'Data siswa berhasil dihapus!');
    }

    public function importStudents(Request $request)
    {
        // Implementation for Excel import will be added later
        return back()->with('info', 'Fitur import sedang dalam pengembangan.');
    }

    public function exportStudents()
    {
        // Implementation for Excel export will be added later
        return back()->with('info', 'Fitur export sedang dalam pengembangan.');
    }

    public function subjects()
    {
        $search = request('search');
        $status = request('status');
        
        $query = Subject::query();
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
            });
        }
        
        if ($status !== null) {
            $query->where('is_active', $status);
        }
        
        $subjects = $query->paginate(20);
        
        return view('admin.subjects.index', compact('subjects'));
    }

    public function createSubject()
    {
        return view('admin.subjects.create');
    }

    public function storeSubject(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:subjects,code|max:10',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'credit_hours' => 'required|integer|min:1|max:10',
        ]);

        $validated['is_active'] = true;
        
        Subject::create($validated);
        
        return redirect()->route('admin.subjects')->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }

    public function showSubject(Subject $subject)
    {
        $subject->load('teachers');
        return view('admin.subjects.show', compact('subject'));
    }

    public function editSubject(Subject $subject)
    {
        return view('admin.subjects.edit', compact('subject'));
    }

    public function updateSubject(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'code' => 'required|unique:subjects,code,' . $subject->id . '|max:10',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'credit_hours' => 'required|integer|min:1|max:10',
            'is_active' => 'required|boolean',
        ]);
        
        $subject->update($validated);
        
        return redirect()->route('admin.subjects')->with('success', 'Data mata pelajaran berhasil diperbarui!');
    }

    public function destroySubject(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('admin.subjects')->with('success', 'Mata pelajaran berhasil dihapus!');
    }

    public function assignTeacher(Subject $subject)
    {
        $teachers = User::where('role', 'guru')->get();
        $classes = ['7A', '7B', '7C', '8A', '8B', '8C', '9A', '9B', '9C'];
        $currentYear = date('Y') . '/' . (date('Y') + 1);
        
        return view('admin.subjects.assign-teacher', compact('subject', 'teachers', 'classes', 'currentYear'));
    }

    public function storeTeacherAssignment(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'class' => 'required|string',
            'academic_year' => 'required|string',
        ]);

        // Check if assignment already exists
        $exists = $subject->teachers()
            ->wherePivot('teacher_id', $validated['teacher_id'])
            ->wherePivot('class', $validated['class'])
            ->wherePivot('academic_year', $validated['academic_year'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'Assignment ini sudah ada!');
        }

        $subject->teachers()->attach($validated['teacher_id'], [
            'class' => $validated['class'],
            'academic_year' => $validated['academic_year'],
            'is_active' => true,
        ]);

        return redirect()->route('admin.subjects.show', $subject)
            ->with('success', 'Guru berhasil ditugaskan ke mata pelajaran!');
    }

    public function removeTeacherAssignment(Subject $subject, User $teacher)
    {
        $class = request('class');
        $academicYear = request('academic_year');

        $subject->teachers()->wherePivot('teacher_id', $teacher->id)
            ->wherePivot('class', $class)
            ->wherePivot('academic_year', $academicYear)
            ->detach();

        return back()->with('success', 'Assignment guru berhasil dihapus!');
    }

    public function teacherAssignments()
    {
        $assignments = \DB::table('teacher_subjects')
            ->join('users', 'teacher_subjects.teacher_id', '=', 'users.id')
            ->join('subjects', 'teacher_subjects.subject_id', '=', 'subjects.id')
            ->select(
                'users.name as teacher_name',
                'users.email as teacher_email',
                'subjects.name as subject_name',
                'subjects.code as subject_code',
                'teacher_subjects.class',
                'teacher_subjects.academic_year',
                'teacher_subjects.is_active',
                'teacher_subjects.id as assignment_id'
            )
            ->orderBy('users.name')
            ->orderBy('subjects.name')
            ->paginate(20);

        return view('admin.teacher-assignments.index', compact('assignments'));
    }

    public function payments()
    {
        // Sementara menampilkan placeholder view
        return view('admin.payments.index');
    }
}
