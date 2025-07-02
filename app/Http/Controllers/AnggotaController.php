<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Divisi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    // Menampilkan seluruh anggota beserta relasi divisi
    public function index()
    {
        $anggota = Anggota::with('divisi')
            ->orderBy('created_at', 'asc')
            ->paginate(7); // batasi 7 per halaman

        return view('admin.anggota.index', ['anggotas' => $anggota]);
    }


    // Menampilkan form tambah anggota
    public function create()
    {
        $divisis = \App\Models\Divisi::all(); // Ambil semua data divisi
        return view('admin.anggota.create', compact('divisis')); // Kirim ke view
    }

    // Menyimpan anggota baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'id_divisi' => 'required|exists:divisi,id',
        ]);

        // Handle upload foto jika ada
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('anggota', 'public');
        }

        Anggota::create($data);

        Alert::success('Berhasil', 'Anggota berhasil ditambahkan');
        return redirect()->route('admin.anggota.index');
    }

    // Menampilkan detail anggota (opsional)
    public function show(Anggota $anggota)
    {
        return view('admin.anggota.show', compact('anggota'));
    }

    // Menampilkan form edit anggota
    public function edit(Anggota $anggota)
    {
        $divisi = Divisi::all();
        return view('admin.anggota.edit', compact('anggota', 'divisi'));
    }

    // Menyimpan perubahan data anggota
    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'id_divisi' => 'required|exists:divisi,id',
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('anggota', 'public');
        }

        $anggota->update($data);

        Alert::success('Berhasil', 'Data anggota berhasil diperbarui');
        return redirect()->route('admin.anggota.index');
    }

    // Menghapus data anggota
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        Alert::success('Dihapus', 'Anggota berhasil dihapus');
        return redirect()->route('admin.anggota.index');
    }
}
