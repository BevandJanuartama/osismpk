<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class DivisiController extends Controller
{
    // Menampilkan semua data divisi
    public function index()
    {
        $divisi = Divisi::all();
        return view('admin.divisi.index', ['divisis' => $divisi]);
    }

    // Menampilkan form tambah divisi
    public function create()
    {
        return view('admin.divisi.create');
    }

    // Menyimpan data divisi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('nama_divisi');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('divisi', 'public'); // simpan ke storage/app/public/divisi
        }

        Divisi::create($data);

        Alert::success('Berhasil', 'Divisi berhasil ditambahkan');
        return redirect()->route('admin.divisi.index');
    }


    public function show(Request $request, Divisi $divisi)
    {
        $anggota = $divisi->anggotas;

        // Jika ada parameter `source=public`, tampilkan halaman publik
        if ($request->query('source') === 'public') {
            return view('public.divisi_show', compact('divisi', 'anggota'));
        }

        // Jika tidak, anggap sebagai admin
        return view('admin.divisi.show', compact('divisi', 'anggota'));
    }



    // Menampilkan form edit divisi
    public function edit(Divisi $divisi)
    {
        return view('admin.divisi.edit', compact('divisi'));
    }

    // Menyimpan perubahan data divisi
    public function update(Request $request, Divisi $divisi)
    {
        $request->validate([
            'nama_divisi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('nama_divisi');

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($divisi->foto && Storage::disk('public')->exists($divisi->foto)) {
                Storage::disk('public')->delete($divisi->foto);
            }

            $data['foto'] = $request->file('foto')->store('divisi', 'public');
        }

        $divisi->update($data);

        Alert::success('Berhasil', 'Data divisi berhasil diperbarui');
        return redirect()->route('admin.divisi.index');
    }


    // Menghapus data divisi
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        Alert::success('Dihapus', 'Data divisi berhasil dihapus');
        return redirect()->route('admin.divisi.index');
    }
}
