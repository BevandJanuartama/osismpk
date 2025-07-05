<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OSIS & MPK SKATEL</title>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
  
  <!-- FullCalendar -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

  <style>
    html, body {
      overflow-x: hidden;
      scrollbar-width: none;
      -ms-overflow-style: none;
      scroll-behavior: smooth;
    }
    body::-webkit-scrollbar {
      display: none;
    }

    .fade-scroll {
      opacity: 0;
      transform: translateY(40px);
      transition: all 2s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .fade-scroll.in-view {
      opacity: 1;
      transform: translateY(0);
    }

    .zoom-fade {
      opacity: 0;
      transform: scale(0.92);
      transition: all 2s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .zoom-fade.in-view {
      opacity: 1;
      transform: scale(1);
    }

    .slide-from-left {
      opacity: 0;
      transform: translateX(-60px);
      transition: all 2s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .slide-from-left.in-view {
      opacity: 1;
      transform: translateX(0);
    }

    .slide-from-right {
      opacity: 0;
      transform: translateX(60px);
      transition: all 2s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .slide-from-right.in-view {
      opacity: 1;
      transform: translateX(0);
    }
  </style>
</head>

<body class="text-gray-800 scroll-smooth">

  <!-- HEADER -->
  <header id="mainHeader" class="fixed top-0 left-0 w-full z-50 bg-white shadow transition-transform duration-500">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
      <h1 class="text-xl font-bold text-red-600">OSIS & MPK SKATEL</h1>
      <button id="burgerBtn" class="text-3xl md:hidden">&#9776;</button>
      <nav class="hidden md:flex gap-6 font-semibold text-gray-800">
        <a href="#tentang">Tentang Kami</a>
        <a href="#kalender">Kalender</a>
        <a href="#struktur">Struktur</a>
        <a href="#footer">Kontak</a>
      </nav>
    </div>
  </header>

  <!-- OVERLAY & SIDEBAR -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden"></div>
  <div id="sidebar" class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg z-50 transform translate-x-full transition-transform duration-300">
    <div class="p-6 space-y-4 text-lg font-semibold text-gray-800 mt-16">
      <a href="#tentang" class="block">Tentang Kami</a>
      <a href="#kalender" class="block">Kalender</a>
      <a href="#struktur" class="block">Struktur</a>
      <a href="#footer" class="block">Kontak</a>
    </div>
  </div>

  <!-- SECTION: TENTANG KAMI -->
  <section id="tentang" class="w-full min-h-screen bg-cover bg-center px-6 py-16 relative overflow-hidden pt-32 bg-no-repeat" style="background-image: url('/img/background.png');">
    <div class="absolute bottom-0 left-0 w-full h-10 bg-gradient-to-t from-white to-transparent z-0"></div>

    <div class="relative z-10 text-center fade-scroll mb-12">
      <h1 class="text-red-500 text-5xl md:text-7xl lg:text-8xl font-bold tracking-widest drop-shadow-lg">
        O S I S &nbsp; M P K &nbsp; S K A T E L
      </h1>
    </div>

    <div class="relative z-10 w-full mt-1 fade-scroll zoom-fade px-6">
      <!-- Tentang Kami -->
      <div class="flex flex-col md:flex-row items-center justify-between gap-12 mb-8">
        <div class="w-full md:basis-[33.5%] flex justify-center md:mt-12">
          <div class="w-72 h-72 md:w-[420px] md:h-[420px] rounded-full overflow-hidden shadow-xl">
            <img src="/img/pak ori.png" alt="Foto Profil" class="w-full h-full object-cover">
          </div>
        </div>
        <div class="w-full md:basis-[66.5%] bg-white/90 backdrop-blur-sm p-6 md:p-10 rounded-2xl shadow-2xl">
          <h2 class="text-red-600 text-3xl md:text-4xl font-mono text-center">Tentang Kami</h2>
          <h3 class="text-red-600 text-4xl md:text-5xl font-bold mb-3 text-center font-serif tracking-widest">OSIS & MPK</h3>
          <p class="text-red-700 text-lg md:text-xl leading-relaxed text-justify mb-8">
            OSIS dan MPK adalah organisasi resmi sekolah yang menjadi wadah bagi siswa untuk menyalurkan aspirasi, kreativitas, dan potensi diri. OSIS berfokus pada penyelenggaraan kegiatan yang mendukung minat dan bakat siswa, sementara MPK berperan sebagai penyalur aspirasi siswa secara demokratis. Keduanya bekerja sama menciptakan lingkungan sekolah yang aktif, inspiratif, dan berprestasi.
          </p>
        </div>
      </div>

      <!-- Visi & Misi -->
      <div class="flex flex-col md:flex-row gap-6 md:ml-[35%] mt-8">
        <!-- Visi -->
        <div class="w-full md:w-1/2 bg-white/90 backdrop-blur-sm p-6 md:p-10 rounded-2xl shadow-2xl">
          <h4 class="text-2xl font-bold text-red-700 mb-3 text-center">Visi</h4>
          <p class="text-gray-800 text-base md:text-lg leading-relaxed">
            Menjadikan OSIS & MPK sebagai organisasi yang inspiratif, berintegritas, serta mampu mewujudkan lingkungan sekolah yang aktif, kreatif, dan berprestasi.
          </p>
        </div>
        <!-- Misi -->
        <div class="w-full md:w-1/2 bg-white/90 backdrop-blur-sm p-6 md:p-10 rounded-2xl shadow-2xl">
          <h4 class="text-2xl font-bold text-red-700 mb-3 text-center">Misi</h4>
          <ul class="list-disc pl-5 text-gray-800 text-base md:text-lg leading-relaxed space-y-2">
            <li>Mengembangkan kegiatan yang mendukung potensi siswa.</li>
            <li>Menjembatani aspirasi siswa kepada pihak sekolah.</li>
            <li>Meningkatkan semangat kepemimpinan dan kerja sama tim.</li>
            <li>Menciptakan program kerja yang bermanfaat bagi seluruh warga sekolah.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION: KALENDER -->
  <section id="kalender" class="py-16 bg-white">
    <div class="mx-auto px-6">
      <div class="flex flex-col lg:flex-row gap-8 items-start">
        <!-- Kalender -->
        <div class="w-full lg:w-6/10 fade-scroll slide-from-left">
          <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Kalender Event</h2>
            <div id="calendar" class="w-full"></div>
          </div>
        </div>
        <!-- Event Terbaru -->
        <div class="w-full lg:w-4/10 fade-scroll slide-from-right">
          <h2 class="text-2xl font-bold text-gray-800 mb-6">Event Terbaru</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Blade: Latest Event Loop --}}
            @php $latestEvents = $events->sortByDesc('tanggal_mulai')->take(2)->values(); @endphp
            @forelse ($latestEvents as $event)
              <a href="{{ route('public.event.show', $event->id) }}" class="flex flex-col h-full bg-green-50 border-l-4 border-green-600 p-4 rounded-xl shadow-lg hover:scale-[1.02] transition-transform">
                <div class="w-full h-90 mb-3">
                  @if ($event->photos->first())
                    <img src="{{ asset('storage/' . $event->photos->first()->foto) }}" alt="Foto Event" class="w-full h-full object-cover rounded-lg">
                  @else
                    <div class="w-full h-full bg-green-100 rounded-lg flex items-center justify-center">
                      <span class="text-green-600 text-sm">Tidak Ada Foto</span>
                    </div>
                  @endif
                </div>
                <div class="flex flex-col flex-grow justify-between">
                  <h3 class="text-xl font-semibold text-green-900 mb-1">{{ $event->nama_event }}</h3>
                  <p class="text-sm text-gray-600 mb-2">
                    {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}
                    @if ($event->tanggal_selesai)
                      - {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}
                    @endif
                  </p>
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

<!-- SECTION: STRUKTUR -->
@php
  $divisis = $anggotas->groupBy(fn($a) => $a->divisi->nama_divisi ?? 'Tanpa Divisi');
@endphp

<section id="struktur" class="px-6 py-12 w-full bg-red-500">
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

<!-- FOOTER -->
<footer id="footer" class="bg-white p-6 md:p-8 rounded-t-lg shadow-inner">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12 max-w-7xl mx-auto">
    
    <!-- Alamat -->
    <a href="https://maps.app.goo.gl/FLU47eXBEnvNZgbEA" target="_blank"
       class="fade-scroll text-center flex flex-col items-center space-y-3">
      <img src="/img/place.png" alt="Location" class="w-11 h-13">
      <p class="text-gray-700 text-sm font-semibold">
        JL. Pangeran Suriansyah, NO. 3, 70711,<br>Banjarbaru, Kalimantan Selatan.
      </p>
    </a>

    <!-- Telepon -->
    <a href="https://wa.me/628115005857" target="_blank"
       class="fade-scroll text-center flex flex-col items-center space-y-3">
      <img src="/img/Call.png" alt="Phone" class="w-10 h-12">
      <p class="text-gray-700 text-sm font-semibold">
        +62 811-500-5857<br>+62 851-0165-0160
      </p>
    </a>

    <!-- Email -->
    <a href="mailto:smktelbjb@ypt.or.id"
       class="fade-scroll text-center flex flex-col items-center space-y-3">
      <img src="/img/Post.png" alt="Email" class="w-12 h-15">
      <p class="text-gray-700 text-lg font-semibold">
        smktelbjb@ypt.or.id
      </p>
    </a>

    <!-- Instagram -->
    <a href="https://www.instagram.com/smktelkombanjarbaru" target="_blank"
       class="fade-scroll text-center flex flex-col items-center space-y-3">
      <img src="/img/instagram.png" alt="Instagram" class="w-10 h-14">
      <p class="text-gray-700 text-lg font-semibold">
        @smktelkombanjarbaru
      </p>
    </a>

  </div>
</footer>

<!-- TOMBOL KE ATAS -->
<button id="scrollTopBtn"
        class="hidden fixed bottom-6 right-6 bg-red-500 text-white p-3 rounded-full shadow-lg hover:bg-red-600 transition duration-300 z-50">
  ↑
</button>


<!-- SCRIPT -->
<script>
  // Animasi scroll
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  document.querySelectorAll('.fade-scroll').forEach(el => observer.observe(el));

  // FullCalendar
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

  // Sticky Header on Scroll
  let lastScrollTop = 0;
  const header = document.getElementById('mainHeader');
  window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    header.style.transform = scrollTop > lastScrollTop && scrollTop > 80 ? "translateY(-100%)" : "translateY(0)";
    lastScrollTop = Math.max(scrollTop, 0);
  });

  // Sidebar Burger
  const burgerBtn = document.getElementById("burgerBtn");
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("overlay");

  burgerBtn.addEventListener("click", () => {
    sidebar.style.transform = "translateX(0)";
    overlay.classList.remove("hidden");
  });

  overlay.addEventListener("click", () => {
    sidebar.style.transform = "translateX(100%)";
    overlay.classList.add("hidden");
  });

  // Scroll to Top
  const scrollTopBtn = document.getElementById("scrollTopBtn");
  window.addEventListener("scroll", () => {
    scrollTopBtn.classList.toggle("hidden", window.scrollY < 300);
  });

  scrollTopBtn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
</script>

