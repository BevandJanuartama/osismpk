<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OSIS & MPK SKATEL</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

  <style>
    html, body {
      overflow-x: hidden;
      scrollbar-width: none;
      -ms-overflow-style: none;
    }
    body::-webkit-scrollbar {
      display: none;
    }

    .fade-scroll {
      opacity: 0;
      transform: translateY(40px);
      transition: all 0.6s ease-in-out;
    }
    .fade-scroll.in-view {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body class="text-gray-800">

<!-- HEADER + TENTANG KAMI -->
<section class="w-full min-h-screen bg-cover bg-center px-6 py-16 space-y-12 relative overflow-hidden"
         style="background-image: url('/img/background.png');">
  <div class="absolute bottom-0 left-0 w-full h-10 bg-gradient-to-t from-white to-transparent z-0"></div>
  <div class="relative z-10 text-center fade-scroll">
    <h1 class="text-red-500 text-5xl md:text-7xl lg:text-8xl font-bold tracking-widest drop-shadow-lg">
      O S I S &nbsp; M P K &nbsp; S K A T E L
    </h1>
  </div>
  <div class="relative z-10 flex flex-col md:flex-row items-center justify-center space-y-6 md:space-y-0 md:space-x-12 fade-scroll">
    <div class="w-48 h-48 md:w-1/4 md:h-1/4 rounded-full overflow-hidden">
      <img src="/img/pak ori.png" alt="Profile Picture" class="w-full h-full object-cover">
    </div>
    <div class="bg-white/90 backdrop-blur-sm p-6 md:p-10 rounded-2xl shadow-2xl max-w-3xl">
      <h2 class="text-red-600 text-3xl md:text-4xl font-mono text-center">Tentang Kami</h2>
      <h3 class="text-red-600 text-4xl md:text-5xl font-bold mb-3 text-center font-serif tracking-widest">OSIS & MPK</h3>
      <p class="text-red-700 text-lg md:text-2xl leading-relaxed text-justify">
        OSIS dan MPK adalah organisasi resmi sekolah yang menjadi wadah bagi siswa untuk menyalurkan aspirasi, kreativitas, dan potensi diri. OSIS fokus menjalankan program kegiatan siswa, sedangkan MPK menampung dan menyampaikan aspirasi antar kelas.
      </p>
    </div>
  </div>
</section>

<!-- Kalender Event dan Highlight -->
<section class="py-16 bg-white">
  <div class=" mx-auto px-6">
    <div class="flex flex-col lg:flex-row gap-8 items-start">

      <!-- Kalender (40% lebar) -->
      <div class="w-full lg:w-6/10 fade-scroll">
        <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
          <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Kalender Event</h2>
          <div id="calendar" class="w-full"></div>
        </div>
      </div>

     <!-- Event Terbaru (60% lebar) -->
<div class="w-full lg:w-4/10 fade-scroll">
  <h2 class="text-2xl font-bold text-gray-800 mb-6">Event Terbaru</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @php
      $latestEvents = $events->sortByDesc('tanggal_mulai')->take(2)->values();
    @endphp

    @forelse ($latestEvents as $event)
      <a href="{{ route('public.event.show', $event->id) }}"
         class="flex flex-col h-full bg-green-50 border-l-4 border-green-600 p-4 rounded-xl shadow-lg hover:scale-[1.02] transition-transform">

        <div class="w-full h-90 mb-3">
          @if ($event->photos->first())
            <img src="{{ asset('storage/' . $event->photos->first()->foto) }}"
                 alt="Foto Event"
                 class="w-full h-full object-cover rounded-lg">
          @else
            <div class="w-full h-full bg-green-100 rounded-lg flex items-center justify-center">
              <span class="text-green-600 text-sm">Tidak Ada Foto</span>
            </div>
          @endif
        </div>

        <div class="flex flex-col flex-grow justify-between">
          <div>
            <h3 class="text-xl font-semibold text-green-900 mb-1">{{ $event->nama_event }}</h3>
            <p class="text-sm text-gray-600 mb-2">
              {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}
              @if ($event->tanggal_selesai)
                - {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}
              @endif
            </p>
          </div>
        </div>
      </a>
    @empty
      <p class="text-gray-500 italic col-span-2">Belum ada event.</p>
    @endforelse
  </div>
</div>

    </div>
  </div>
</section>

<div class="w-full h-8 bg-gradient-to-b from-white to-red-500"></div>


<!-- struktur organisasi -->
@php
$divisis = $anggotas->groupBy(fn($a) => $a->divisi->nama_divisi ?? 'Tanpa Divisi');
@endphp

<section class="px-6 py-12 w-full bg-red-500">
  <div class="fade-scroll">
    <h2 class="text-white text-5xl md:text-7xl font-bold text-center mb-20 tracking-widest mt-[50px]">
      Struktur Organisasi OSIS & MPK
    </h2>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    @foreach ($divisis as $namaDivisi => $anggotaDivisi)
      @php
        $divisiModel = $anggotaDivisi->first()->divisi;
        $fotoDivisi = $divisiModel->foto ? asset('storage/' . $divisiModel->foto) : '/img/default.png';
        $delay = $loop->index * 100;
      @endphp
      <a href="{{ route('admin.divisi.show', $divisiModel->id) }}?source=public"
         class="fade-scroll bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col text-center hover:scale-105 transition transform duration-500 group min-h-[400px]"
         style="transition-delay: {{ $delay }}ms;">
        <div class="w-full h-[320px]">
          <img src="{{ $fotoDivisi }}" alt="Foto Divisi" class="w-full h-full object-cover">
        </div>
        <div class="h-[80px] flex items-center justify-center">
          <h3 class="text-2xl md:text-3xl font-bold text-red-600">{{ $namaDivisi }}</h3>
        </div>
      </a>
    @endforeach
  </div>
</section>

<div class="w-full h-8 bg-gradient-to-b from-red-500 to-white"></div>

<footer class="bg-white p-6 md:p-8 rounded-t-lg shadow-inner">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
    <div class="flex flex-col items-center space-y-2 fade-scroll">
      <a href="https://maps.app.goo.gl/FLU47eXBEnvNZgbEA" target="_blank" class="flex flex-col items-center">
        <img src="/img/place.png" alt="Location Icon" class="w-11 h-13">
        <p class="text-gray-700 text-sm font-semibold text-center">
          JL. Pangeran Suriansyah, NO. 3, 70711, Banjarbaru, Kalimantan Selatan.
        </p>
      </a>
    </div>
    <div class="flex flex-col items-center space-y-2 fade-scroll">
      <a href="https://wa.me/628115005857" target="_blank">
        <img src="/img/Call.png" alt="Phone Icon" class="w-10 h-12">
      </a>
      <p class="text-gray-700 text-sm font-semibold text-center">
        <a href="https://wa.me/628115005857" target="_blank">+62 811-500-5857</a><br>
        <a href="https://wa.me/6285101650160" target="_blank">+62 851-0165-0160</a>
      </p>
    </div>
    <div class="flex flex-col items-center space-y-2 fade-scroll">
      <a href="mailto:smktelbjb@ypt.or.id" class="flex flex-col items-center">
        <img src="/img/Post.png" alt="Email Icon" class="w-12 h-15">
        <p class="text-gray-700 text-lg font-semibold text-center">
          smktelbjb@ypt.or.id
        </p>
      </a>
    </div>
    <div class="flex flex-col items-center space-y-2 fade-scroll">
      <a href="https://www.instagram.com/smktelkombanjarbaru" target="_blank" class="flex flex-col items-center">
        <img src="/img/instagram.png" alt="Instagram Icon" class="w-10 h-14">
        <p class="text-gray-700 text-lg font-semibold text-center">
          @smktelkombanjarbaru
        </p>
      </a>
    </div>
  </div>
</footer>

<script>
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  document.querySelectorAll('.fade-scroll').forEach(el => {
    observer.observe(el);
  });

  document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      height: 500,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: ''
      },
      events: [
        @foreach ($events as $e)
          {
            title: '{{ $e->nama_event }}',
            start: '{{ $e->tanggal_mulai }}',
            url: '{{ route('public.event.show', $e->id) }}',
            @if ($e->tanggal_selesai)
              end: '{{ $e->tanggal_selesai }}',
            @endif
            color: '#16a34a'
          },
        @endforeach
      ]
    });
    calendar.render();
  });
</script>

</body>
</html>
