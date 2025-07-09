<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ $event->nama_event }} - Event</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-red-500 text-gray-800">

  <section class="px-6 py-12 w-full">
    {{-- JUDUL & TANGGAL --}}
    <div class="text-center mb-12">
      <h2 class="text-white text-5xl md:text-7xl font-bold tracking-widest">
        {{ $event->nama_event }}
      </h2>
      <p class="text-white mt-4 text-lg">
        {{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d F Y') }}
        @if ($event->tanggal_selesai)
          - {{ \Carbon\Carbon::parse($event->tanggal_selesai)->translatedFormat('d F Y') }}
        @endif
      </p>
    </div>

    {{-- STATUS & KONTEN --}}
    <div class="text-center mb-8">
      @if ($event->status === 'Coming Soon')
        <div class="inline-block bg-white text-red-600 font-bold text-xl px-6 py-3 rounded shadow">
          Coming Soon!<br>
          <span class="text-base font-normal">Tunggu informasi lebih lanjut ya!</span>
        </div>

      @elseif ($event->status === 'Buka Pendaftaran')
        @if ($event->lombas && $event->lombas->count() > 0)
          <div class="grid gap-4 justify-center">
            @foreach ($event->lombas as $lomba)
              <a href="{{ $lomba->link_pendaftaran }}" target="_blank"
                 class="inline-block bg-white text-green-700 font-semibold text-lg px-8 py-3 rounded shadow hover:bg-gray-100 transition">
                {{ $lomba->nama_lomba }}
              </a>
            @endforeach
          </div>
        @elseif ($event->link_drive)
          <a href="{{ $event->link_drive }}" target="_blank"
             class="inline-block bg-white text-green-700 font-bold text-xl px-10 py-4 rounded shadow hover:bg-gray-100 transition">
             Daftar Sekarang (Google Form)
          </a>
        @endif

      @elseif ($event->status === 'Sedang Berlangsung')
        <div class="inline-block bg-white text-yellow-600 font-bold text-xl px-6 py-3 rounded shadow">
          Acara sedang berlangsung
        </div>
      @endif
    </div>

    {{-- KHUSUS UNTUK EVENT SELESAI --}}
    @if ($event->status === 'Telah Selesai')

      {{-- SLIDER FOTO --}}
      @if ($event->photos && $event->photos->count() > 0)
        <div x-data="slider({{ $event->photos->count() }})" class="relative mb-12 max-w-3xl mx-auto">
          <div class="overflow-hidden rounded-xl shadow-lg border-4 border-red-300 aspect-[16/9]">
            <template x-for="(photo, index) in photos" :key="index">
              <img x-show="currentIndex === index"
                   x-transition
                   :src="photo"
                   class="w-full h-full object-cover" 
                   alt="Foto Event" />
            </template>
          </div>

          <button @click="prev"
                  class="absolute top-1/2 left-0 -translate-y-1/2 bg-white bg-opacity-75 text-red-500 p-2 rounded-r hover:bg-opacity-100">
            &#10094;
          </button>

          <button @click="next"
                  class="absolute top-1/2 right-0 -translate-y-1/2 bg-white bg-opacity-75 text-red-500 p-2 rounded-l hover:bg-opacity-100">
            &#10095;
          </button>

          <div class="flex justify-center gap-2 mt-4">
            <template x-for="(photo, index) in photos" :key="index">
              <button @click="goTo(index)"
                      :class="currentIndex === index ? 'w-6 h-3 rounded-full bg-white' : 'w-3 h-3 rounded-full bg-white/50'"
                      class="transition-all duration-300">
              </button>
            </template>
          </div>
        </div>

        <script>
          function slider(total) {
            return {
              currentIndex: 0,
              photos: [
                @foreach ($event->photos->skip(1) as $photo)
                  "{{ asset('storage/' . $photo->foto) }}",
                @endforeach
              ],
              next() {
                this.currentIndex = (this.currentIndex + 1) % this.photos.length;
              },
              prev() {
                this.currentIndex = (this.currentIndex - 1 + this.photos.length) % this.photos.length;
              },
              goTo(i) {
                this.currentIndex = i;
              }
            }
          }
        </script>
      @endif

      {{-- LINK DOKUMENTASI --}}
      @if ($event->link_drive)
        <div class="text-center mb-8">
          <a href="{{ $event->link_drive }}" target="_blank"
             class="inline-block bg-white text-black text-lg font-normal px-10 py-4 rounded shadow hover:bg-gray-100 transition w-full max-w-3xl mx-auto">
            Lihat Dokumentasi di Google Drive
          </a>
        </div>
      @endif

      {{-- DESKRIPSI --}}
      <div class="px-6">
        <div class="bg-white rounded-xl p-6 shadow-lg w-full text-lg leading-relaxed text-gray-800 whitespace-pre-line">
          {{ $event->deskripsi }}
        </div>
      </div>

    @endif

    {{-- TOMBOL KEMBALI --}}
    <div class="mt-12 text-center">
      <a href="{{ route('dashboard') }}"
         class="text-white text-lg underline hover:text-gray-200">
        ← Kembali ke Halaman Utama
      </a>
    </div>
  </section>

</body>
</html>
