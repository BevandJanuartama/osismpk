@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('content') {{-- Awal dari bagian konten --}}

<h1 class="text-3xl font-bold mb-4 text-green-900">Daftar Divisi</h1>

{{-- Tombol untuk menambahkan divisi baru --}}
<a href="{{ route('divisi.create') }}"
   class="text-xl inline-block mb-4 px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800 transition">
    Tambah Divisi
</a>

{{-- Menampilkan pesan sukses jika ada --}}
@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded">
        {{ session('success') }}
    </div>
@endif

{{-- Tabel data divisi --}}
<div class="overflow-x-auto max-w-full md:max-w-none px-2">
    <div class="border-2 border-green-500 rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-green-900 text-white text-[20px]">
                <tr>
                    <th class="px-4 py-3 text-center border border-green-500">No</th>
                    <th class="px-4 py-3 text-center border border-green-500">Nama Divisi</th>
                    <th class="px-4 py-3 text-center border border-green-500">Foto</th>
                    <th class="px-4 py-3 text-center border border-green-500">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($divisis as $divisi)
                <tr class="{{ $loop->even ? 'bg-green-100' : 'bg-white' }} text-[18px]">
                    <td class="px-4 py-3 text-center border border-green-500">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 text-center border border-green-500">
                        <a href="{{ route('divisi.show', $divisi) }}" class="text-green-800 font-semibold hover:underline">
                            {{ $divisi->nama_divisi }}
                        </a>
                    </td>                    

                    <td class="px-4 py-3 text-center border border-green-500">
                        @if ($divisi->foto)
                            <a href="{{ asset('storage/' . $divisi->foto) }}" target="_blank">
                                <img src="{{ asset('storage/' . $divisi->foto) }}"
                                     alt="Foto {{ $divisi->nama }}"
                                     class="max-w-[64px] max-h-[64px] object-contain mx-auto hover:scale-105 transition" />
                            </a>
                        @else
                            <span class="text-gray-500 italic">Tidak ada foto</span>
                        @endif
                    </td>
                    

                    <td class="px-4 py-3 text-center border border-green-500">
                        <a href="{{ route('divisi.edit', $divisi) }}"
                           class="inline-block px-3 py-1 mr-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm transition">
                            Edit
                        </a>

                        <form action="{{ route('divisi.destroy', $divisi) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus divisi ini?')"
                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection {{-- Akhir dari section konten --}}
