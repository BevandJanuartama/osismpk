@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-green-900">Tambah Event</h1>

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

<form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-green-50 p-6 rounded border border-green-300 max-w-lg">
    @csrf

    {{-- Nama Event --}}
    <div class="mb-6">
        <label for="nama_event" class="block text-green-900 font-semibold mb-1">Nama Event</label>
        <input type="text" name="nama_event" id="nama_event" required
               value="{{ old('nama_event') }}"
               class="w-full p-2 border border-green-300 rounded" />
    </div>

    {{-- Status --}}
    <div class="mb-6">
        <label for="status" class="block text-green-900 font-semibold mb-1">Status</label>
        <select name="status" id="status" required
                class="w-full p-2 border border-green-300 rounded">
            <option value="Coming Soon" {{ old('status') == 'Coming Soon' ? 'selected' : '' }}>Coming Soon</option>
            <option value="Buka Pendaftaran" {{ old('status') == 'Buka Pendaftaran' ? 'selected' : '' }}>Buka Pendaftaran</option>
            <option value="Sedang Berlangsung" {{ old('status') == 'Sedang Berlangsung' ? 'selected' : '' }}>Sedang Berlangsung</option>
            <option value="Telah Selesai" {{ old('status') == 'Telah Selesai' ? 'selected' : '' }}>Telah Selesai</option>
        </select>
    </div>

    {{-- Tanggal Mulai --}}
    <div class="mb-6">
        <label for="tanggal_mulai" class="block text-green-900 font-semibold mb-1">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai" required
               value="{{ old('tanggal_mulai') }}"
               class="w-full p-2 border border-green-300 rounded" />
    </div>

    {{-- Tanggal Selesai --}}
    <div class="mb-6">
        <label for="tanggal_selesai" class="block text-green-900 font-semibold mb-1">Tanggal Selesai (opsional)</label>
        <input type="date" name="tanggal_selesai" id="tanggal_selesai"
               value="{{ old('tanggal_selesai') }}"
               class="w-full p-2 border border-green-300 rounded" />
    </div>

    {{-- Link Drive --}}
    <div class="mb-6">
        <label for="link_drive" class="block text-green-900 font-semibold mb-1">Link Drive (opsional)</label>
        <input type="url" name="link_drive" id="link_drive"
               value="{{ old('link_drive') }}"
               class="w-full p-2 border border-green-300 rounded" />
    </div>

    {{-- Deskripsi --}}
    <div class="mb-6">
        <label for="deskripsi" class="block text-green-900 font-semibold mb-1">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" required
                  class="w-full p-2 border border-green-300 rounded">{{ old('deskripsi') }}</textarea>
    </div>

    {{-- Foto --}}
    <div class="mb-6">
        <label for="fotos" class="block text-green-900 font-semibold mb-1">Foto-foto Event</label>
        <input type="file" name="fotos[]" id="fotos" accept="image/*" multiple
               class="w-full p-2 border border-green-300 rounded bg-white" />
        <small class="text-sm text-gray-600">Boleh unggah lebih dari 1 foto. Maks: 2MB/foto. Rasio 1:1 untuk foto pertama.</small>

        <div id="preview-container" class="mt-4 grid grid-cols-2 gap-4"></div>
    </div>

    {{-- Daftar Lomba --}}
    <div class="mb-6">
        <label class="block text-green-900 font-semibold mb-2">Daftar Lomba</label>
    
        <div id="lomba-container" class="space-y-4 hidden"></div>
    
        <button type="button" id="add-lomba"
            class="mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
            + Tambah Lomba
        </button>
    
        <small class="block text-gray-600 mt-2">Isi nama lomba dan link pendaftarannya. Bisa tambah lebih dari satu.</small>
    </div>
    

    <button type="submit"
            class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded transition">
        Simpan
    </button>
</form>

<a href="{{ route('admin.event.index') }}"
   class="inline-block mt-4 bg-gray-200 hover:bg-gray-300 text-green-900 px-5 py-2 rounded transition">
    ← Kembali ke Daftar Event
</a>

{{-- Script Preview Foto & Tambah Lomba --}}
<script>
    // PREVIEW FOTO
    document.getElementById('fotos').addEventListener('change', function (event) {
      const files = event.target.files;
      const previewContainer = document.getElementById('preview-container');
      previewContainer.innerHTML = '';
  
      Array.from(files).forEach(file => {
        if (!file.type.startsWith('image/')) return;
  
        const reader = new FileReader();
        reader.onload = function (e) {
          const img = document.createElement('img');
          img.src = e.target.result;
          img.className = 'w-full h-32 object-cover rounded shadow border border-green-300';
          previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
      });
    });
  
    // TAMBAH LOMBA
    const tombolLomba = document.getElementById('add-lomba');
    const containerLomba = document.getElementById('lomba-container');
  
    tombolLomba.addEventListener('click', function () {
      containerLomba.classList.remove('hidden');
  
      const wrapper = document.createElement('div');
      wrapper.className = 'grid grid-cols-1 md:grid-cols-2 gap-2 items-end relative';
  
      wrapper.innerHTML = `
        <div>
          <label class="text-sm font-medium text-green-900">Nama Lomba</label>
          <input type="text" name="lomba_nama[]" required
                 class="w-full p-2 border border-green-300 rounded" />
        </div>
        <div>
          <label class="text-sm font-medium text-green-900">Link Pendaftaran</label>
          <input type="url" name="lomba_link[]" required
                 class="w-full p-2 border border-green-300 rounded" />
        </div>
        <button type="button" class="absolute -top-3 -right-3 bg-red-600 text-white rounded-full w-6 h-6 text-sm flex items-center justify-center hover:bg-red-700" onclick="this.parentElement.remove()">
          &times;
        </button>
      `;
  
      containerLomba.appendChild(wrapper);
    });
  </script>
  @endsection
  
