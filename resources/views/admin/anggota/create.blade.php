@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-green-900">Tambah Anggota</h1>

{{-- Tampilkan error validasi --}}
@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
        <ul class="list-disc pl-6">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.anggota.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-green-50 p-6 rounded border border-green-300 max-w-lg">
    @csrf

    {{-- Nama --}}
    <div class="mb-6">
        <label for="nama" class="block text-green-900 font-semibold mb-1">Nama</label>
        <input type="text" name="nama" id="nama" required
               value="{{ old('nama') }}"
               class="w-full p-2 border border-green-300 rounded" />
    </div>

    {{-- Divisi --}}
    <div class="mb-6">
        <label for="id_divisi" class="block text-green-900 font-semibold mb-1">Divisi</label>
        <div class="relative">
            <select name="id_divisi" id="id_divisi" required
                    class="w-full p-2 pr-10 border border-green-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="" disabled {{ old('id_divisi') ? '' : 'selected' }}>-- Pilih Divisi --</option>
                @foreach ($divisis as $divisi)
                    <option value="{{ $divisi->id }}" {{ old('id_divisi') == $divisi->id ? 'selected' : '' }}>
                        {{ $divisi->nama_divisi }}
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
    </div>

    {{-- Jabatan --}}
    <div class="mb-6">
        <label for="jabatan" class="block text-green-900 font-semibold mb-1">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" required
               value="{{ old('jabatan') }}"
               class="w-full p-2 border border-green-300 rounded" />
    </div>

    {{-- Foto --}}
    <div class="mb-6">
        <label for="foto" class="block text-green-900 font-semibold mb-1">Foto</label>
        <input type="file" name="foto" id="foto" accept="image/*"
               class="w-full p-2 border border-green-300 rounded bg-white" />
        <small class="text-sm text-gray-600">Format: JPG, PNG. Maks. 2MB</small>
    </div>

    <button type="submit"
            class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded transition">
        Simpan
    </button>
</form>

<a href="{{ route('admin.anggota.index') }}"
   class="inline-block mt-4 bg-gray-200 hover:bg-gray-300 text-green-900 px-5 py-2 rounded transition">
    ← Kembali ke Daftar Anggota
</a>
@endsection
