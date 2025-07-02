@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4 text-green-900">Daftar Anggota</h1>

<a href="{{ route('anggota.create') }}"
   class="inline-block mb-4 px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800 transition">
    Tambah Anggota
</a>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto max-w-full md:max-w-none px-2">
    <div class="min-w-[750px] border-2 border-green-500 rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-green-900 text-white text-[20px]">
                <tr>
                    <th class="px-4 py-3 text-center border border-green-500">No</th>
                    <th class="px-4 py-3 text-center border border-green-500">Foto</th>
                    <th class="px-4 py-3 text-center border border-green-500">Nama</th>
                    <th class="px-4 py-3 text-center border border-green-500">Divisi</th>
                    <th class="px-4 py-3 text-center border border-green-500">Jabatan</th>
                    <th class="px-4 py-3 text-center border border-green-500">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $anggota)
                    <tr class="{{ $loop->even ? 'bg-green-100' : 'bg-white' }} text-[18px]">
                        <td class="px-4 py-3 text-center border border-green-500">{{ $anggotas->firstItem() + $loop->index }}
                        </td>
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

                        <td class="px-4 py-3 text-center border border-green-500">{{ $anggota->nama }}</td>
                        <td class="px-4 py-3 text-center border border-green-500">{{ optional($anggota->divisi)->nama_divisi ?? '-' }}</td>
                        <td class="px-4 py-3 text-center border border-green-500">{{ $anggota->jabatan }}</td>

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
                @endforeach
            </tbody>
        </table>

        <!-- Wrapper flex untuk info & pagination -->
<div class="mt-4 px-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4 text-sm">

    <!-- Keterangan jumlah data -->
    <div class="text-green-800">
        Menampilkan {{ $anggotas->firstItem() }} sampai {{ $anggotas->lastItem() }} dari total {{ $anggotas->total() }} anggota
    </div>

    <!-- Tombol pagination -->
    <div class="flex flex-wrap gap-1 justify-end mb-2">
        {{-- Tombol Previous --}}
        @if ($anggotas->onFirstPage())
            <span class="px-3 py-2 bg-green-200 text-green-700 rounded cursor-not-allowed">&laquo;</span>
        @else
            <a href="{{ $anggotas->previousPageUrl() }}"
               class="px-3 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">&laquo;</a>
        @endif

        {{-- Tombol nomor halaman --}}
        @foreach ($anggotas->getUrlRange(1, $anggotas->lastPage()) as $page => $url)
            @if ($page == $anggotas->currentPage())
                <span class="px-3 py-2 bg-green-700 text-white font-bold rounded">{{ $page }}</span>
            @else
                <a href="{{ $url }}"
                   class="px-3 py-2 bg-green-100 text-green-800 rounded hover:bg-green-200 transition">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Tombol Next --}}
        @if ($anggotas->hasMorePages())
            <a href="{{ $anggotas->nextPageUrl() }}"
               class="px-3 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">&raquo;</a>
        @else
            <span class="px-3 py-2 bg-green-200 text-green-700 rounded cursor-not-allowed">&raquo;</span>
        @endif
    </div>
</div>

    </div>
</div>

<a href="{{ route('divisi.index') }}"
   class="inline-block mt-6 px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition">
    ← Kembali ke daftar Divisi
</a>

@endsection