@extends('layouts.app')

@section('content')
<div style="font-family: Arial, sans-serif;">
    <h1 style="font-size: 32px; font-weight: bold; margin-bottom: 20px; color: #000;">Daftar Buku</h1>

    {{-- Alert Notifikasi Sukses --}}
    @if(session('success'))
        <div style="background-color: #ffffff; color: #0f5132; padding: 12px 16px; border: 1px solid #badbcc; border-radius: 4px; margin-bottom: 20px; font-size: 14px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah Buku --}}
    <div style="margin-bottom: 15px;">
        <a href="{{ url('/books/create') }}" style="background-color: #0d6efd; color: white; padding: 8px 14px; border-radius: 4px; text-decoration: none; font-size: 14px; font-weight: bold; display: inline-block;">
            + Tambah Buku
        </a>
    </div>

    {{-- Tabel Data Bergaris (Bordered Table) --}}
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 12px; font-size: 14px;" border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr style="background-color: #ffffff;">
                <th style="border: 1px solid #dee2e6; text-align: left; font-weight: bold;">ID</th>
                <th style="border: 1px solid #dee2e6; text-align: left; font-weight: bold;">Judul</th>
                <th style="border: 1px solid #dee2e6; text-align: left; font-weight: bold;">Penulis</th>
                <th style="border: 1px solid #dee2e6; text-align: left; font-weight: bold;">Penerbit</th>
                <th style="border: 1px solid #dee2e6; text-align: left; font-weight: bold;">Tahun</th>
                <th style="border: 1px solid #dee2e6; text-align: left; font-weight: bold;">Stok</th>
                <th style="border: 1px solid #dee2e6; text-align: left; font-weight: bold;">Kategori</th>
                <th style="border: 1px solid #dee2e6; text-align: left; font-weight: bold;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td style="border: 1px solid #dee2e6;">{{ $book->id ?? $book['id'] }}</td>
                    <td style="border: 1px solid #dee2e6;">{{ $book->judul ?? $book['judul'] }}</td>
                    <td style="border: 1px solid #dee2e6;">{{ $book->penulis ?? $book['penulis'] }}</td>
                    <td style="border: 1px solid #dee2e6;">{{ $book->penerbit ?? $book['penerbit'] }}</td>
                    <td style="border: 1px solid #dee2e6;">{{ $book->tahun_terbit ?? $book['tahun_terbit'] ?? $book['tahun'] }}</td>
                    <td style="border: 1px solid #dee2e6;">{{ $book->stok ?? $book['stok'] }}</td>
                    <td style="border: 1px solid #dee2e6;">{{ $book->kategori ?? $book['kategori'] ?? 'Fiksi' }}</td>
                    <td style="border: 1px solid #dee2e6;">
                        <a href="{{ url('/books/' . ($book->id ?? $book['id'])) }}" style="color: #0d6efd; text-decoration: underline;">Detail</a> | 
                        <a href="{{ url('/books/' . ($book->id ?? $book['id']) . '/edit') }}" style="color: #0d6efd; text-decoration: underline;">Edit</a> | 
                        <form action="{{ url('/books/' . ($book->id ?? $book['id'])) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" style="background: white; border: 1px solid #6c757d; border-radius: 3px; padding: 2px 6px; cursor: pointer; font-size: 13px;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="border: 1px solid #dee2e6; text-align: center; color: #6c757d;">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Catatan Bawah --}}
    <p style="font-size: 13px; font-style: italic; color: #212529; margin-top: 10px;">
        Catatan: data di atas masih data dummy (array statis di Controller), belum dari database. Migration & Model Eloquent baru dibuat di Pertemuan 5.
    </p>
</div>
@endsection