<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Gallery;
use App\Models\SchoolInfo;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Redirect to role-specific dashboard
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'guru':
                return redirect()->route('teacher.dashboard');
            case 'orang_tua':
                return redirect()->route('parent.dashboard');
            default:
                return redirect()->route('welcome');
        }
    }
}
