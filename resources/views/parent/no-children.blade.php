@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>👨‍👩‍👧‍👦 Dashboard Orang Tua</h4>
                    <p>Selamat datang, {{ auth()->user()->name }}</p>
                </div>
                <div class="card-body text-center">
                    <div class="alert alert-info">
                        <h5>📚 Belum Ada Data Anak</h5>
                        <p>Saat ini belum ada data anak yang terdaftar dalam sistem dengan akun Anda.</p>
                        <p>Silakan hubungi admin sekolah untuk mendaftarkan anak Anda ke dalam sistem.</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Informasi Kontak</h5>
                                </div>
                                <div class="card-body">
                                    <p><strong>📞 Telepon:</strong> (021) 123-4567</p>
                                    <p><strong>📧 Email:</strong> admin@sekolah.com</p>
                                    <p><strong>📍 Alamat:</strong> Jl. Sekolah No. 1, Kota ABC</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('parent.profile') }}" class="btn btn-primary">
                            👤 Lihat Profil Saya
                        </a>
                        <a href="{{ route('parent.news') }}" class="btn btn-info">
                            📰 Baca Berita Sekolah
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
