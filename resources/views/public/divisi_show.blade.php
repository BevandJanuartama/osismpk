<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Divisi {{ $divisi->nama_divisi }} - OSIS & MPK</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-500 text-gray-800">

  <section class="px-6 py-12 w-full">
    <div class="text-center mb-12">
      <h2 class="text-white text-5xl md:text-7xl font-bold tracking-widest">
        {{ $divisi->nama_divisi }}
      </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      @foreach ($anggota as $anggota)
        <div class="bg-white rounded-xl shadow-md text-center p-4 mb-20 group">
          {{-- Lingkaran foto dengan overflow tersembunyi --}}
          <div class="relative w-36 h-36 mx-auto mb-4 rounded-full border-4 border-red-500 overflow-hidden bg-white">
            <img src="{{ $anggota->foto ? asset('storage/' . $anggota->foto) : '/img/default.png' }}"
                 alt="Foto {{ $anggota->nama }}"
                 class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110">
          </div>
          <h3 class="text-xl font-bold text-red-600">{{ $anggota->nama }}</h3>
          <p class="text-gray-600 text-l">{{ $anggota->jabatan }}</p>
          <p class="text-gray-500 text-m mt-1">{{ $divisi->nama_divisi }}</p>
        </div>
      @endforeach
    </div>

    <div class="mt-12 text-center">
      <a href="{{ route('dashboard') }}" class="text-white text-lg underline hover:text-gray-200">
        ← Kembali ke Struktur Organisasi
      </a>
    </div>
  </section>

</body>
</html>
