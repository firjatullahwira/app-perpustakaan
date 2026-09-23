<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

Route::resource('members', MemberController::class);

class MemberController extends Controller
{
    private array $members = [
    ['id' => 1, 'nama' => 'Siti Aminah', 'nim' => '2310501001', 'email' => 'siti.aminah@pens.ac.id', 'nomor_telepon' => '081234567890', 'status' => 'aktif'],
    ['id' => 2, 'nama' => 'Budi Santoso', 'nim' => '2310501002', 'email' => 'budi.santoso@pens.ac.id', 'nomor_telepon' => '081298765432', 'status' => 'aktif'],
    ['id' => 3, 'nama' => 'Dewi Lestari', 'nim' => '2310501003', 'email' => 'dewi.lestari@pens.ac.id', 'nomor_telepon' => '081211122233', 'status' => 'nonaktif'],
    ];
    public function index()
    {
       $members = [
            [
                'id' => 1,
                'nama' => 'Andi Pratama',
                'nim' => '312560001',
                'email' => 'andi@student.pens.ac.id',
                'nomor_telepon' => '081234567890',
                'alamat' => 'Surabaya',
                'status' => 'Aktif'
            ],
            [
                'id' => 2,
                'nama' => 'Siti Aminah',
                'nim' => '312560002',
                'email' => 'siti@student.pens.ac.id',
                'nomor_telepon' => '089876543210',
                'alamat' => 'Sidoarjo',
                'status' => 'Aktif'
            ]
        ];

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('Membercreate');
    }

    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }

    public function store(StoreMemberRequest $request)
    {
        return redirect()->route('members.index')->with('success', 'Data anggota berhasil ditambahkan!');
    }
}