@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4 text-green-900">Tambah Divisi</h1>

{{-- Tampilkan error validasi --}}
@if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 border border-red-300 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Form tambah divisi --}}
<form action="{{ route('admin.divisi.store') }}" method="POST" enctype="multipart/form-data"
      class="space-y-4 max-w-xl bg-white p-6 border border-green-300 rounded shadow-sm">
    @csrf

    {{-- Input nama divisi --}}
    <div>
        <label for="nama_divisi" class="block mb-1 font-semibold text-green-800">Nama Divisi</label>
        <input type="text" name="nama_divisi" id="nama_divisi" value="{{ old('nama_divisi') }}"
               class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600"
               required>
    </div>

    {{-- Upload foto divisi --}}
    <div>
        <label for="foto" class="block mb-1 font-semibold text-green-800">Foto Divisi</label>
        <input type="file" name="foto" id="foto"
               class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600">
    </div>

    {{-- Tombol --}}
    <div class="flex items-center gap-4 mt-6">
        <button type="submit"
                class="px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800 transition">
            Simpan
        </button>

        <a href="{{ route('admin.divisi.index') }}"
           class="px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition">
            ← Kembali
        </a>
    </div>
</form>

@endsection
