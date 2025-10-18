<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada user admin
        $admin = User::first();
        
        if (!$admin) {
            return;
        }

        // Create dummy gallery entries with placeholder images
        $galleryData = [
            [
                'title' => 'Kegiatan Belajar Mengajar',
                'description' => 'Suasana pembelajaran aktif di kelas dengan metode diskusi kelompok',
                'category' => 'pembelajaran',
                'is_featured' => true,
                'image' => 'gallery/sample-1.jpg', // We'll create placeholder
            ],
            [
                'title' => 'Prestasi Olimpiade Sains',
                'description' => 'Para juara olimpiade sains nasional dengan trofi emas',
                'category' => 'prestasi',
                'is_featured' => true,
                'image' => 'gallery/sample-2.jpg',
            ],
            [
                'title' => 'Fasilitas Laboratorium Modern',
                'description' => 'Laboratorium sains dengan peralatan canggih untuk praktikum',
                'category' => 'fasilitas',
                'is_featured' => true,
                'image' => 'gallery/sample-3.jpg',
            ],
            [
                'title' => 'Event Pentas Seni Sekolah',
                'description' => 'Pertunjukan tari tradisional dalam acara pentas seni tahunan',
                'category' => 'event',
                'is_featured' => true,
                'image' => 'gallery/sample-4.jpg',
            ],
            [
                'title' => 'Kegiatan Ekstrakurikuler',
                'description' => 'Tim robotika sekolah sedang mempersiapkan kompetisi',
                'category' => 'kegiatan',
                'is_featured' => true,
                'image' => 'gallery/sample-5.jpg',
            ],
        ];

        foreach ($galleryData as $data) {
            Gallery::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'category' => $data['category'],
                'is_featured' => $data['is_featured'],
                'image' => $data['image'],
                'user_id' => $admin->id,
            ]);
        }
    }
}
