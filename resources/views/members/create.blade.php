<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>
</head>
<body>
    <h1>Form Tambah Anggota</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama:</label><br>
            <input type="text" name="nama" value="{{ old('nama') }}">
        </div>
        <div>
            <label>NIM:</label><br>
            <input type="text" name="nim" value="{{ old('nim') }}">
        </div>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label>Nomor Telepon:</label><br>
            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}">
        </div>
        <div>
            <label>Alamat:</label><br>
            <textarea name="alamat">{{ old('alamat') }}</textarea>
        </div>
        <div>
            <label>Status:</label><br>
            <input type="text" name="status" value="{{ old('status') }}">
        </div>
        <br>
        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ route('members.index') }}">Kembali</a>
</body>
</html>