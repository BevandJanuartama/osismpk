<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Absen Klinik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded px-8 py-6 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Presensi Pegawai Klinik</h2>

        @if(session('status'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Status WFO/WFH --}}
        @php
            $ipUser = request()->ip();
            $ipKlinik = env('KLINIK_IP');
            $status = $ipUser === $ipKlinik ? 'WFO' : 'WFH';
            $warna = $ipUser === $ipKlinik ? 'text-green-600' : 'text-red-600';
        @endphp

        <div class="mt-6 text-center {{ $warna }}">
            <p class="text-xs text-gray-600">Status Posisi berdasarkan IP Address Device</p>
            <p class="text-sm">
                Anda berada di 
                @if($status === 'WFO')
                    dalam lingkungan klinik
                @else
                    luar lingkungan klinik
                @endif
            </p>
            <p class="text-xl font-bold mt-2 uppercase">
                {{ $status }}
            </p>
        </div>
        <br>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                placeholder="Masukkan Nama atau NIP"
                required autofocus
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>            

            <div class="mb-4">
                <input type="password" id="password" name="password"
                    placeholder="Password"
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex items-center justify-end mb-4">
                <a href="{{ route('password.request') }}" class="text-xs text-indigo-600 hover:underline">Lupa password?</a>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded hover:bg-indigo-700 transition duration-200">
                Login
            </button>
        </form>
    </div>
</body>
</html>
