<!DOCTYPE html>
<html>
<head>
    <title>OSIS & MPK SMK Telkom BJB</title> {{-- Judul halaman di tab browser --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Link CDN Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-green-800 text-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">

            {{-- Logo / Judul Aplikasi --}}
            <div class="text-3xl font-bold tracking-wide">
                OSIS & MPK SMK Telkom BJB
            </div>

            {{-- Menu Navigasi --}}
            <div class="space-x-4">
                <a href="{{ route('admin.divisi.index') }}" class="text-xl hover:bg-green-700 px-3 py-2 rounded transition">
                    Divisi
                </a>

                <a href="{{ route('admin.anggota.index') }}" class="text-xl hover:bg-green-700 px-3 py-2 rounded transition">
                    Anggota
                </a>

                <a href="{{ route('admin.event.index') }}" class="text-xl hover:bg-green-700 px-3 py-2 rounded transition">
                    Event
                </a>
            </div>
        </div>
    </nav>

    {{-- Konten utama --}}
    <div class="container mx-auto p-4">
        @yield('content')

        {{-- SweetAlert --}}
        @include('sweetalert::alert')
    </div>
</body>
</html>
