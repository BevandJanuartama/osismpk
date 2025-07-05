@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-green-900">Edit Event</h1>

<form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data"
      class="bg-green-50 p-6 rounded border-2 border-green-500 max-w-lg">
    @csrf
    @method('PUT')

    {{-- Nama Event --}}
    <div class="mb-6">
        <label for="nama_event" class="block text-green-900 font-semibold mb-1">Nama Event</label>
        <input type="text" name="nama_event" id="nama_event"
               value="{{ old('nama_event', $event->nama_event) }}"
               required class="w-full p-2 border border-green-500 rounded" />
        @error('nama_event')
            <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Tanggal Mulai --}}
    <div class="mb-6">
        <label for="tanggal_mulai" class="block text-green-900 font-semibold mb-1">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
               value="{{ old('tanggal_mulai', $event->tanggal_mulai) }}"
               required class="w-full p-2 border border-green-500 rounded" />
        @error('tanggal_mulai')
            <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Tanggal Selesai --}}
    <div class="mb-6">
        <label for="tanggal_selesai" class="block text-green-900 font-semibold mb-1">Tanggal Selesai (opsional)</label>
        <input type="date" name="tanggal_selesai" id="tanggal_selesai"
               value="{{ old('tanggal_selesai', $event->tanggal_selesai) }}"
               class="w-full p-2 border border-green-500 rounded" />
        @error('tanggal_selesai')
            <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Link Drive --}}
    <div class="mb-6">
        <label for="link_drive" class="block text-green-900 font-semibold mb-1">Link Drive (opsional)</label>
        <input type="url" name="link_drive" id="link_drive"
               value="{{ old('link_drive', $event->link_drive) }}"
               class="w-full p-2 border border-green-500 rounded" />
        @error('link_drive')
            <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Deskripsi --}}
    <div class="mb-6">
        <label for="deskripsi" class="block text-green-900 font-semibold mb-1">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4"
                  class="w-full p-2 border border-green-500 rounded"
                  required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
        @error('deskripsi')
            <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Tambah Foto --}}
    <div class="mb-6">
        <label for="fotos" class="block text-green-900 font-semibold mb-1">Tambah Foto (opsional)</label>
        <input type="file" name="fotos[]" id="fotos" multiple accept="image/*"
               class="w-full p-2 border border-green-300 rounded bg-white" />
        <small class="text-sm text-gray-600">Kosongkan jika tidak ingin menambah foto. Max 2MB per foto.</small>
        @error('fotos.*')
            <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Foto Lama --}}
    @if ($event->photos && $event->photos->count())
    <div class="mb-6">
        <p class="text-green-900 font-semibold mb-2">Foto Lama:</p>
        <div class="grid grid-cols-2 gap-4">
            @foreach ($event->photos as $photo)
                <div class="relative group">
                    <img src="{{ asset('storage/' . $photo->foto) }}"
                         class="w-full h-32 object-cover rounded shadow border border-green-300 group-hover:opacity-60 transition" />
                    
                    {{-- Tombol hapus --}}
                    <button type="button"
                            onclick="removeOldPhoto({{ $photo->id }}, this)"
                            class="absolute top-1 right-1 bg-red-600 text-white rounded-full px-2 text-sm hover:bg-red-700 z-10">
                        &times;
                    </button>

                    {{-- Input hidden untuk kirim ID foto yang ingin dihapus --}}
                    <input type="hidden" name="delete_photos[]" value="{{ $photo->id }}" class="delete-photo-input" />
                </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Preview Foto Baru --}}
    <div class="mb-6">
        <p class="text-green-900 font-semibold mb-2">Preview Foto Baru:</p>
        <div id="preview-container" class="grid grid-cols-2 gap-4"></div>
    </div>

    {{-- Tombol simpan --}}
    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded transition">
        Update Event
    </button>
</form>

{{-- Navigasi kembali --}}
<div class="mt-6 flex flex-col gap-2">
    <a href="{{ route('admin.event.index') }}"
       class="w-60 px-4 py-2 bg-gray-300 text-green-900 rounded hover:bg-gray-400 transition text-center">
        ← Kembali ke Daftar Event
    </a>
</div>

{{-- Script --}}
<script>
  // Preview Foto Baru
  document.getElementById('fotos').addEventListener('change', function (event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('preview-container');
    previewContainer.innerHTML = ''; // hapus preview lama

    Array.from(files).forEach((file, index) => {
      if (!file.type.startsWith('image/')) return;

      const reader = new FileReader();
      reader.onload = function (e) {
        const wrapper = document.createElement('div');
        wrapper.className = 'relative group';

        const img = document.createElement('img');
        img.src = e.target.result;
        img.className = 'w-full h-32 object-cover rounded shadow border border-green-300';

        const btn = document.createElement('button');
        btn.type = 'button';
        btn.innerHTML = '&times;';
        btn.className = 'absolute top-1 right-1 bg-red-600 text-white rounded-full px-2 text-sm hover:bg-red-700 z-10';
        btn.onclick = () => wrapper.remove();

        wrapper.appendChild(img);
        wrapper.appendChild(btn);
        previewContainer.appendChild(wrapper);
      };
      reader.readAsDataURL(file);
    });
  });

  // Tandai Foto Lama yang akan dihapus
  function removeOldPhoto(photoId, button) {
    const container = button.parentElement;
    container.classList.add('opacity-50');
    button.disabled = true;
  }
</script>
@endsection
