@extends('layouts.app') {{-- Menggunakan layout utama aplikasi --}}

@section('content') {{-- Awal dari section konten --}}

<h1 class="text-2xl font-bold mb-4 text-green-900">Edit Divisi</h1>

{{-- Form edit data divisi --}}
<form action="{{ route('admin.divisi.update', $divisi->id) }}" method="POST" enctype="multipart/form-data"
      class="bg-white p-6 border border-green-300 rounded-lg shadow-sm max-w-xl">
    @csrf {{-- Token keamanan --}}
    @method('PUT') {{-- Method PUT untuk update --}}

    {{-- Input Nama Divisi --}}
    <div class="mb-4">
        <label for="nama_divisi" class="block text-green-800 font-semibold mb-2">Nama Divisi:</label>
        <input type="text" name="nama_divisi" id="nama_divisi"
               value="{{ old('nama_divisi', $divisi->nama_divisi) }}"
               required
               class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('nama_divisi')
            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Foto (optional) --}}
    <div class="mb-6">
        <label for="foto" class="block text-green-900 font-semibold mb-1">Foto Baru (opsional):</label>
        <input type="file" name="foto" id="foto"
               accept="image/*"
               class="w-full p-2 border border-green-300 rounded bg-white" />
        <small class="text-sm text-gray-600">Abaikan jika tidak ingin mengganti.</small>
        @error('foto')
            <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Tombol Aksi --}}
    <div class="flex gap-4">
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded transition">
            Update
        </button>

        <a href="{{ route('admin.divisi.index') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded transition inline-block text-center">
            Batal
        </a>
    </div>
</form>

@endsection {{-- Akhir dari section konten --}}
