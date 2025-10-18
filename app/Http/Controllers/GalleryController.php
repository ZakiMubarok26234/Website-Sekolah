<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    /**
     * Check if user can manage gallery (admin only for create/edit/delete)
     */
    private function checkAdminAccess()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $stats = [
            'total_photos' => $this->safeCount(Gallery::class),
            'featured_photos' => $this->safeCountWhere(Gallery::class, 'is_featured', true),
            'categories' => $this->safeDistinctCount(Gallery::class, 'category'),
        ];

        $user = Auth::user();
        $canManage = $user && $user->role === 'admin';

        return view('admin.gallery.simple-index', compact('galleries', 'stats', 'canManage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAdminAccess();
        
        $categories = ['kegiatan', 'prestasi', 'fasilitas', 'pembelajaran', 'event'];
        return view('admin.gallery.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkAdminAccess();
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'category' => 'required|string|in:kegiatan,prestasi,fasilitas,pembelajaran,event',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'is_featured' => 'boolean'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');
        }

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $imagePath,
            'is_featured' => $request->boolean('is_featured'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('gallery.index')
            ->with('success', 'Foto berhasil ditambahkan ke galeri!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $this->checkAdminAccess();
        
        $categories = ['kegiatan', 'prestasi', 'fasilitas', 'pembelajaran', 'event'];
        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->checkAdminAccess();
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'category' => 'required|string|in:kegiatan,prestasi,fasilitas,pembelajaran,event',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'is_featured' => 'boolean'
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'is_featured' => $request->boolean('is_featured'),
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')
            ->with('success', 'Foto berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $this->checkAdminAccess();
        
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')
            ->with('success', 'Foto berhasil dihapus!');
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

    /**
     * Safely count records with where clause, return 0 if table doesn't exist
     */
    private function safeCountWhere($modelClass, $column, $value)
    {
        try {
            return $modelClass::where($column, $value)->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Safely count distinct values, return 0 if table doesn't exist
     */
    private function safeDistinctCount($modelClass, $column)
    {
        try {
            return $modelClass::distinct($column)->count($column);
        } catch (\Exception $e) {
            return 0;
        }
    }
}
