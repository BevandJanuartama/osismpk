@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-green-900">Edit Anggota</h1>

{{-- Form edit anggota --}}
<form action="{{ route('anggota.update', $anggota->id) }}" method="POST"
      enctype="multipart/form-data"
      class="bg-green-50 p-6 rounded border-2 border-green-500 max-w-lg">
    @csrf
    @method('PUT')

    {{-- Nama --}}
    <div class="mb-6">
        <label for="nama" class="block text-green-900 font-semibold mb-1">Nama:</label>
        <input type="text" name="nama" id="nama"
               value="{{ old('nama', $anggota->nama) }}"
               required class="w-full p-2 border border-green-500 rounded" />
        @error('nama')
            <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Dropdown Divisi --}}
    <div class="mb-6">
        <label for="id_divisi" class="block text-green-900 font-semibold mb-1">Divisi</label>
        <div class="relative">
            <select name="id_divisi" id="id_divisi" required
                    class="w-full p-2 pr-10 border border-green-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="" disabled>-- Pilih Divisi --</option>
                @foreach ($divisi as $d)
    <option value="{{ $d->id }}" {{ old('id_divisi', $anggota->id_divisi) == $d->id ? 'selected' : '' }}>
        {{ $d->nama_divisi }}
    </option>
@endforeach

            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg class="w-4 h-4 text-green-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>
        @error('id_divisi')
            <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Jabatan --}}
    <div class="mb-6">
        <label for="jabatan" class="block text-green-900 font-semibold mb-1">Jabatan:</label>
        <input type="text" name="jabatan" id="jabatan"
               value="{{ old('jabatan', $anggota->jabatan) }}"
               required class="w-full p-2 border border-green-500 rounded" />
        @error('jabatan')
            <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
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

    {{-- Tombol simpan --}}
    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded transition">
        Update
    </button>
</form>

{{-- Tombol navigasi kembali --}}
<div class="mt-6 flex flex-col gap-2">
    <a href="{{ route('anggota.index') }}"
       class="w-60 px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition text-center">
        ← Kembali ke Daftar Anggota
    </a>
    <a href="{{ route('divisi.index') }}"
       class="w-60 px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition text-center">
        ← Kembali ke Daftar Divisi
    </a>
    <a href="{{ route('divisi.show', $anggota->id_divisi) }}"
       class="w-60 px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition text-center">
        ← Kembali ke Detail Divisi
    </a>
</div>
@endsection
