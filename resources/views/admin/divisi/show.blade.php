@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('content') {{-- Awal section konten --}}

<h1 class="text-2xl font-bold mb-4 text-green-900">Detail Divisi</h1>

{{-- Menampilkan informasi divisi --}}
<div class="mb-6 p-4 border-2 border-green-500 rounded-lg bg-green-50 text-green-900 space-y-2 text-[25px]">
    <p><strong>{{ $divisi->nama_divisi }}</strong></p>
</div>

{{-- Tombol untuk menambah anggota --}}
<a href="{{ route('anggota.create') }}"
   class="inline-block mb-4 px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800 transition">
    Tambah Anggota
</a>

{{-- Tabel daftar anggota --}}
<div class="overflow-x-auto max-w-full md:max-w-none px-2">
    <div class="min-w-[750px] border-2 border-green-500 rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-green-900 text-white text-[20px]">
                <tr>
                    <th class="w-[10%] px-4 py-3 text-center font-bold border border-green-500">No</th>
                    <th class="w-[25%] px-4 py-3 text-center font-bold border border-green-500">Nama</th>
                    <th class="w-[25%] px-4 py-3 text-center font-bold border border-green-500">Jabatan</th>
                    <th class="w-[20%] px-4 py-3 text-center font-bold border border-green-500">Foto</th>
                    <th class="w-[20%] px-4 py-3 text-center font-bold border border-green-500">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($divisi->anggotas as $anggota)
                <tr class="{{ $loop->even ? 'bg-green-100' : 'bg-white' }} text-[18px]">
                    <td class="px-4 py-3 text-center border border-green-500">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 border border-green-500">{{ $anggota->nama }}</td>
                    <td class="px-4 py-3 border border-green-500">{{ $anggota->jabatan }}</td>
                    <td class="px-4 py-3 text-center border border-green-500">
                        @if ($anggota->foto)
                        <a href="{{ asset('storage/' . $anggota->foto) }}" target="_blank">
                            <img src="{{ asset('storage/' . $anggota->foto) }}"
                                 alt="Foto {{ $anggota->nama }}"
                                 class="w-16 h-16 object-cover rounded-full mx-auto hover:scale-105 transition">
                        </a>                       
                        @else
                            <span class="text-gray-500 italic">Tidak ada foto</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center border border-green-500">
                        <a href="{{ route('anggota.edit', $anggota) }}"
                           class="inline-block px-3 py-1 mr-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm transition">
                            Edit
                        </a>
                        <form action="{{ route('anggota.destroy', $anggota) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin hapus anggota ini?')"
                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center px-4 py-4 border border-green-500 text-gray-600">
                        Belum ada anggota dalam divisi ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Tombol kembali ke daftar divisi --}}
<a href="{{ route('divisi.index') }}"
   class="inline-block mt-6 px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition">
    ← Kembali ke daftar divisi
</a>

@endsection {{-- Akhir dari konten --}}
