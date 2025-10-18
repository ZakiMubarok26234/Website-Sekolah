<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;
use App\Models\Gallery;
use App\Models\SchoolInfo;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::where('is_published', true)
                         ->with('user')
                         ->latest('published_at')
                         ->take(3)
                         ->get();

        $featuredGallery = Gallery::where('is_featured', true)
                                 ->latest()
                                 ->take(6)
                                 ->get();

        $schoolInfo = [
            'name' => SchoolInfo::getValue('school_name', 'SMA Negeri 1'),
            'vision' => SchoolInfo::getValue('school_vision', ''),
            'mission' => SchoolInfo::getValue('school_mission', ''),
            'address' => SchoolInfo::getValue('school_address', ''),
            'phone' => SchoolInfo::getValue('school_phone', ''),
            'email' => SchoolInfo::getValue('school_email', ''),
            'student_count' => SchoolInfo::getValue('student_count', '340'),
            'teacher_count' => SchoolInfo::getValue('teacher_count', '24'),
        ];

        return view('welcome', compact('latestNews', 'featuredGallery', 'schoolInfo'));
    }

    public function showNews($slug)
    {
        $news = News::where('slug', $slug)
                   ->where('is_published', true)
                   ->with('user')
                   ->firstOrFail();

        $relatedNews = News::where('is_published', true)
                          ->where('id', '!=', $news->id)
                          ->latest('published_at')
                          ->take(3)
                          ->get();

        $schoolInfo = [
            'name' => SchoolInfo::getValue('school_name', 'SMA Negeri 1'),
        ];

        return view('news-detail', compact('news', 'relatedNews', 'schoolInfo'));
    }
}
