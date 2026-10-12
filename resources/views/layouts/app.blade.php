<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan Digital Kampus</title>
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navigasi / Header */
        nav {
            background-color: #1d4ed8;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        nav .logo {
            font-size: 18px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        nav .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        nav .nav-links a:hover {
            text-decoration: underline;
        }

        nav .navbar-user { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            color: #cbd5e1; 
            font-size: 14px; }
        nav .btn-logout { 
            background: none; 
            border: 1px solid #cbd5e1; 
            color: #cbd5e1; 
            padding: 4px 10px; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 14px; }
        nav .btn-logout:hover { 
            background: #1e40af; color: #fff; }

        /* Kontainer Utama */
        main {
            max-width: 900px;
            width: 100%;
            margin: 30px auto;
            padding: 0 20px;
            flex: 1;
        }

        /* Card Container */
        .card {
            background: #ffffff;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border: 1px solid #e5e7eb;
        }

        .header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Tombol / Button */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-primary { background-color: #1d4ed8; 
            color: white; }
        .btn-primary:hover { background-color: #1e40af; }

        .btn-secondary { background-color: #6b7280; 
            color: white; }
        .btn-secondary:hover { background-color: #4b5563; }

        .btn-warning { background-color: #f59e0b; 
            color: white; }
        .btn-danger { background-color: #ef4444; 
            color: white; }

        .btn-sm {
            padding: 4px 8px;
            font-size: 12px;
        }

        /* Tabel */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 10px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        th {
            background-color: #f8fafc;
            color: #374151;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f9fafb;
        }

        /* Form Input */
        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            font-size: 14px;
            color: #374151;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: #1d4ed8;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background: white;
            border-top: 1px solid #e5e7eb;
            font-size: 13px;
            color: #6b7280;
        }

        /* Badge Status Colors */
        .badge-dikembalikan {
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 700;
            border-radius: 0.375rem;
        }

        .badge-dipinjam {
            background-color: #fff3cd;
            color: #664d03;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 700;
            border-radius: 0.375rem;
        }

        .badge-terlambat {
            background-color: #f8d7da;
            color: #842029;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 700;
            border-radius: 0.375rem;
        }
    </style>
</head>
<body>

    <nav>
        <a href="{{ url('/') }}" class="logo">📚 PERPUSTAKAAN DIGITAL KAMPUS</a>
        <div class="nav-links">
            <a href="{{ url('/books') }}">Buku</a>
            @if(auth()->check() && auth()->user()->role !== 'petugas')
                <a href="{{ url('/categories') }}">Kategori</a>
            @endif
            <a href="{{ url('/members') }}">Anggota</a>
            <a href="{{ url('/loans') }}">Peminjaman</a>
            <a href="{{ route('profile.show') }}">Profil</a>
        </div>

        @auth
            <div class="navbar-user">
                <span>{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        @endauth
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; 2026 Sistem Perpustakaan Digital Kampus
    </footer>

</body>
</html>