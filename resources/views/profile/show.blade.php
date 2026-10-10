{{-- File: resources/views/profile/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Profil Petugas')

@section('content')
    <div class="card">
        <h2>Profil Petugas</h2>
        <hr style="margin: 15px 0; border: 0; border-top: 1px solid #e5e7eb;">

        @if (session('success'))
            <div style="background: #d1fae5; color: #065f46; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Informasi Profil --}}
        <div style="margin-bottom: 20px;">
            <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
            <p style="margin-top: 8px;"><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p style="margin-top: 8px;"><strong>Role:</strong> {{ auth()->user()->role ?? 'Petugas' }}</p>
        </div>

        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #e5e7eb;">

        <h3>Ganti Password</h3>
        <form action="{{ route('profile.password.update') }}" method="POST" style="margin-top: 15px;">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="current_password">Password Lama</label>
                <input type="password" name="current_password" id="current_password" class="form-control">
                @error('current_password')
                    <div style="color: #ef4444; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <div style="color: #ef4444; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Password Baru</button>
        </form>
    </div>
@endsection