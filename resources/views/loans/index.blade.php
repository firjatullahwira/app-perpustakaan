{{-- File: resources/views/loans/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
    <h1>Daftar Peminjaman</h1>

    <p><a href="{{ route('loans.create') }}" class="btn">+ Tambah Peminjaman</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ $loan['id'] }}</td>
                    <td>{{ $loan['member']['nama'] ?? '-' }}</td>
                    <td>{{ $loan['user']['name'] ?? '-' }}</td>
                    
                    {{-- Kolom Buku (Menampilkan daftar buku yang dipinjam) --}}
                    <td>
                        @foreach ($loan['loanItems'] as $item)
                            {{ $item['book']['judul'] }}@if (!$loop->last), @endif
                        @endforeach
                    </td>

                    <td>{{ $loan['tanggal_pinjam'] }}</td>
                    <td>{{ $loan['tanggal_kembali'] }}</td>
                    
                    {{-- Kolom Status dengan Badge Berwarna --}}
                    <td>
                        @if ($loan['status'] == 'dikembalikan')
                            <span class="badge-dikembalikan">Dikembalikan</span>
                        @elseif ($loan['status'] == 'dipinjam')
                            <span class="badge-dipinjam">Dipinjam</span>
                        @elseif ($loan['status'] == 'terlambat')
                            <span class="badge-terlambat">Terlambat</span>
                        @endif
                    </td>

                    {{-- Kolom Aksi (Tombol Kembalikan, Detail, Edit, Hapus) --}}
                    <td>
                        {{-- Tombol Kembalikan hanya muncul jika status masih 'dipinjam' --}}
                        @if ($loan['status'] === 'dipinjam')
                            <form action="{{ route('loans.kembalikan', $loan['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-primary">Kembalikan</button>
                            </form>
                        @endif

                        <a href="{{ route('loans.show', $loan['id']) }}">Detail</a>
                        |
                        <a href="{{ route('loans.edit', $loan['id']) }}">Edit</a>
                        |
                        <form class="inline" action="{{ route('loans.destroy', $loan['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $loans->links() }}
@endsection