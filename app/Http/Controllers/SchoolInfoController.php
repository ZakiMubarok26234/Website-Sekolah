<?php

namespace App\Http\Controllers;

use App\Models\SchoolInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SchoolInfoController extends Controller
{
    public function index()
    {
        try {
            $schoolInfos = [
                'school_name' => SchoolInfo::getValue('school_name', 'SMA Negeri 1'),
                'school_address' => SchoolInfo::getValue('school_address', ''),
                'school_phone' => SchoolInfo::getValue('school_phone', ''),
                'school_email' => SchoolInfo::getValue('school_email', ''),
                'principal_name' => SchoolInfo::getValue('principal_name', ''),
                'school_vision' => SchoolInfo::getValue('school_vision', ''),
                'school_mission' => SchoolInfo::getValue('school_mission', ''),
                'school_history' => SchoolInfo::getValue('school_history', ''),
                'school_logo' => SchoolInfo::getValue('school_logo', ''),
                'student_count' => SchoolInfo::getValue('student_count', '340'),
                'teacher_count' => SchoolInfo::getValue('teacher_count', '24'),
                'staff_count' => SchoolInfo::getValue('staff_count', '8'),
            ];

            // Check if user is admin to show editable form or read-only view
            $isAdmin = Auth::user()->role === 'admin';
            
            if ($isAdmin) {
                return view('admin.school-info.index', compact('schoolInfos'));
            } else {
                return view('school-info.show', compact('schoolInfos'));
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Error loading school information: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            // Ensure only admin can update
            if (Auth::user()->role !== 'admin') {
                abort(403, 'Unauthorized action.');
            }

            $request->validate([
                'school_name' => 'required|string|max:255',
                'school_address' => 'required|string|max:500',
                'school_phone' => 'required|string|max:20',
                'school_email' => 'required|email|max:255',
                'principal_name' => 'required|string|max:255',
                'school_vision' => 'required|string',
                'school_mission' => 'required|string',
                'school_history' => 'required|string',
                'student_count' => 'required|integer|min:0',
                'teacher_count' => 'required|integer|min:0',
                'staff_count' => 'required|integer|min:0',
                'school_logo' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
            ]);

            // Update text fields
            SchoolInfo::setValue('school_name', $request->school_name);
            SchoolInfo::setValue('school_address', $request->school_address);
            SchoolInfo::setValue('school_phone', $request->school_phone);
            SchoolInfo::setValue('school_email', $request->school_email);
            SchoolInfo::setValue('principal_name', $request->principal_name);
            SchoolInfo::setValue('school_vision', $request->school_vision, 'textarea');
            SchoolInfo::setValue('school_mission', $request->school_mission, 'textarea');
            SchoolInfo::setValue('school_history', $request->school_history, 'textarea');
            SchoolInfo::setValue('student_count', $request->student_count, 'number');
            SchoolInfo::setValue('teacher_count', $request->teacher_count, 'number');
            SchoolInfo::setValue('staff_count', $request->staff_count, 'number');

            // Handle logo upload
            if ($request->hasFile('school_logo')) {
                // Delete old logo
                $oldLogo = SchoolInfo::getValue('school_logo');
                if ($oldLogo) {
                    Storage::disk('public')->delete($oldLogo);
                }

                $logoPath = $request->file('school_logo')->store('school', 'public');
                SchoolInfo::setValue('school_logo', $logoPath, 'image');
            }

            return redirect()->route('admin.school-info.index')
                ->with('success', 'Informasi sekolah berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.school-info.index')
                ->with('error', 'Error updating school information: ' . $e->getMessage());
        }
    }
}
