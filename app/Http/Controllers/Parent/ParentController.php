<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Attendance;
use App\Models\Payment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function dashboard()
    {
        $parent = Auth::user();
        
        // Get children (students) for this parent
        $children = $parent->children()->where('is_active', true)->get();
        
        // Calculate stats
        $stats = [
            'total_children' => $children->count(),
            'total_grades' => Grade::whereIn('student_id', $children->pluck('id'))->count(),
            'pending_payments' => 0, // TODO: implement when payment system is ready
            'overdue_payments' => 0, // TODO: implement when payment system is ready
        ];

        $recent_news = News::where('is_published', true)->latest()->take(5)->get();
        $recent_grades = Grade::whereIn('student_id', $children->pluck('id'))
            ->with(['student', 'subject'])
            ->latest()
            ->take(5)
            ->get();

        return view('parent.dashboard', compact('children', 'stats', 'recent_news', 'recent_grades'));
    }

    public function childGrades($studentId)
    {
        $parent = Auth::user();
        
        // Verify that this student belongs to the authenticated parent
        $student = $parent->children()->where('id', $studentId)->firstOrFail();
        
        $grades = $student->grades()
            ->with(['subject', 'teacher'])
            ->latest()
            ->paginate(20);

        return view('parent.grades', compact('student', 'grades'));
    }

    public function childAttendances($studentId)
    {
        $parent = Auth::user();
        
        // Verify that this student belongs to the authenticated parent
        $student = $parent->children()->where('id', $studentId)->firstOrFail();
        
        $attendances = $student->attendances()
            ->with(['subject', 'teacher'])
            ->latest('date')
            ->paginate(20);

        return view('parent.attendances', compact('student', 'attendances'));
    }

    public function childPayments($studentId)
    {
        $parent = Auth::user();
        
        // Verify that this student belongs to the authenticated parent
        $student = $parent->children()->where('id', $studentId)->firstOrFail();
        
        // TODO: implement when payment system is ready
        $payments = collect();

        return view('parent.payments', compact('student', 'payments'));
    }

    public function profile()
    {
        $parent = Auth::user();
        
        // Get children (students) for this parent
        $children = $parent->children()->where('is_active', true)->get();
        
        return view('parent.profile', compact('parent', 'children'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string'
        ]);

        $parent = Auth::user();
        $parent->update($request->only('name', 'email', 'phone', 'address'));

        return redirect()->route('parent.profile')->with('success', 'Profil berhasil diperbarui');
    }
}
