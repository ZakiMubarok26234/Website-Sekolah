<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SchoolInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Parent\ParentController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/berita/{slug}', [HomeController::class, 'showNews'])->name('news.show.public');

// Dashboard with role-based redirection
Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Admin Routes
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Users Management
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    
    // Students Management
    Route::get('/students', [AdminController::class, 'students'])->name('students');
    Route::get('/students/create', [AdminController::class, 'createStudent'])->name('students.create');
    Route::post('/students', [AdminController::class, 'storeStudent'])->name('students.store');
    Route::get('/students/{student}', [AdminController::class, 'showStudent'])->name('students.show');
    Route::get('/students/{student}/edit', [AdminController::class, 'editStudent'])->name('students.edit');
    Route::put('/students/{student}', [AdminController::class, 'updateStudent'])->name('students.update');
    Route::delete('/students/{student}', [AdminController::class, 'destroyStudent'])->name('students.destroy');
    Route::post('/students/import', [AdminController::class, 'importStudents'])->name('students.import');
    Route::get('/students/export', [AdminController::class, 'exportStudents'])->name('students.export');
    
    // Subjects Management
    Route::get('/subjects', [AdminController::class, 'subjects'])->name('subjects');
    Route::get('/subjects/create', [AdminController::class, 'createSubject'])->name('subjects.create');
    Route::post('/subjects', [AdminController::class, 'storeSubject'])->name('subjects.store');
    Route::get('/subjects/{subject}', [AdminController::class, 'showSubject'])->name('subjects.show');
    Route::get('/subjects/{subject}/edit', [AdminController::class, 'editSubject'])->name('subjects.edit');
    Route::put('/subjects/{subject}', [AdminController::class, 'updateSubject'])->name('subjects.update');
    Route::delete('/subjects/{subject}', [AdminController::class, 'destroySubject'])->name('subjects.destroy');
    
    // Teacher Assignment
    Route::get('/subjects/{subject}/assign-teacher', [AdminController::class, 'assignTeacher'])->name('subjects.assign-teacher');
    Route::post('/subjects/{subject}/assign-teacher', [AdminController::class, 'storeTeacherAssignment'])->name('subjects.store-teacher-assignment');
    Route::delete('/subjects/{subject}/teachers/{teacher}', [AdminController::class, 'removeTeacherAssignment'])->name('subjects.remove-teacher-assignment');
    Route::get('/teacher-assignments', [AdminController::class, 'teacherAssignments'])->name('teacher-assignments');
    
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
    
    // News Management (Admin only)
    Route::resource('news', NewsController::class)->names([
        'index' => 'news.index',
        'create' => 'news.create', 
        'store' => 'news.store',
        'show' => 'news.show',
        'edit' => 'news.edit',
        'update' => 'news.update',
        'destroy' => 'news.destroy',
    ]);
    
    // Gallery Management (Admin only)
    Route::resource('gallery', GalleryController::class)->names([
        'index' => 'gallery.index',
        'create' => 'gallery.create',
        'store' => 'gallery.store',
        'show' => 'gallery.show',
        'edit' => 'gallery.edit',
        'update' => 'gallery.update',
        'destroy' => 'gallery.destroy',
    ]);
    
    // School Info Management (Admin only)
    Route::get('school-info', [SchoolInfoController::class, 'index'])->name('school-info.index');
    Route::put('school-info', [SchoolInfoController::class, 'update'])->name('school-info.update');
});

// Teacher Routes
Route::middleware(['auth', 'verified', 'role:guru'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');
    Route::get('/students', [TeacherController::class, 'students'])->name('students');
    Route::get('/grades', [TeacherController::class, 'grades'])->name('grades');
    Route::get('/grades/create', [TeacherController::class, 'createGrade'])->name('grades.create');
    Route::post('/grades', [TeacherController::class, 'storeGrade'])->name('grades.store');
    Route::get('/attendances', [TeacherController::class, 'attendances'])->name('attendances');
    Route::get('/attendances/create', [TeacherController::class, 'createAttendance'])->name('attendances.create');
    Route::post('/attendances', [TeacherController::class, 'storeAttendance'])->name('attendances.store');
    Route::get('/profile', [TeacherController::class, 'profile'])->name('profile');
    Route::put('/profile', [TeacherController::class, 'updateProfile'])->name('profile.update');
});

// Parent Routes
Route::middleware(['auth', 'verified', 'role:orang_tua'])->prefix('parent')->name('parent.')->group(function () {
    Route::get('/dashboard', [ParentController::class, 'dashboard'])->name('dashboard');
    Route::get('/child/{student}/grades', [ParentController::class, 'childGrades'])->name('child.grades');
    Route::get('/child/{student}/attendances', [ParentController::class, 'childAttendances'])->name('child.attendances');
    Route::get('/child/{student}/payments', [ParentController::class, 'childPayments'])->name('child.payments');
    Route::get('/profile', [ParentController::class, 'profile'])->name('profile');
    Route::put('/profile', [ParentController::class, 'updateProfile'])->name('profile.update');
});

require __DIR__.'/auth.php';
