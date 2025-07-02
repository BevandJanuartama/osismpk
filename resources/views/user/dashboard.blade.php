<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard OSIS
        </h2>
    </x-slot>

    @php
        $user = Auth::user();
        $today = today();

        $presensiMasuk = \App\Models\Absen::where('nama', $user->name)
            ->whereDate('tanggal', $today)
            ->where('status', 'masuk')
            ->first();

        $presensiPulang = \App\Models\Absen::where('nama', $user->name)
            ->whereDate('tanggal', $today)
            ->where('status', 'pulang')
            ->first();

        // Fungsi hanya dideklarasikan sekali saja
        function formatJam($jam, $type = 'masuk') {
            if (!$jam) return '-';
            $waktu = \Carbon\Carbon::parse($jam->jam);
            $jamStr = $waktu->format('H:i');

            if ($type === 'masuk' && $waktu->gt(\Carbon\Carbon::createFromTime(8, 0))) {
                return $jamStr . ' <span class="text-red-600 font-semibold">(Terlambat)</span>';
            }

            if ($type === 'pulang' && $waktu->lt(\Carbon\Carbon::createFromTime(17, 0))) {
                return $jamStr . ' <span class="text-red-600 font-semibold">(Pulang Cepat)</span>';
            }

            return $jamStr;
        }

        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();
        $period = \Carbon\CarbonPeriod::create($startOfMonth, $endOfMonth);

        $absens = \App\Models\Absen::where('nama', $user->name)
            ->whereBetween('tanggal', [$startOfMonth, $endOfMonth])
            ->get()
            ->groupBy(fn($item) => $item->tanggal);
    @endphp

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex gap-4 justify-center">
                        {{-- Tombol Presensi Masuk --}}
                        @if ($presensiMasuk)
                            <div class="border border-black text-black px-6 py-4 rounded text-center">
                                Anda telah presensi masuk pada pukul:
                                <strong>{{ \Carbon\Carbon::parse($presensiMasuk->jam)->format('H:i') }}</strong>
                            </div>
                        @else
                            <form action="{{ route('absen.hadir') }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="masuk">
                                <button type="submit" class="border border-black text-black px-6 py-4 rounded font-semibold">
                                    Presensi Masuk
                                </button>
                            </form>
                        @endif

                        {{-- Tombol Presensi Pulang --}}
                        @if ($presensiPulang)
                            <div class="border border-black text-black px-6 py-4 rounded text-center">
                                Anda telah presensi pulang pada pukul:
                                <strong>{{ \Carbon\Carbon::parse($presensiPulang->jam)->format('H:i') }}</strong>
                            </div>
                        @else
                            <form action="{{ route('absen.hadir') }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="pulang">
                                <button type="submit" class="border border-black text-black px-6 py-4 rounded font-semibold">
                                    Presensi Pulang
                                </button>
                            </form>
                        @endif
                    </div>

                    <hr class="my-8 border-gray-500">

                    <h3 class="text-lg font-bold mb-4 text-center">Rekap Presensi Bulan Ini</h3>

                    <div class="overflow-auto">
                        <table class="w-full text-left border-collapse mt-4">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white">
                                    <th class="border px-4 py-2">Tanggal</th>
                                    <th class="border px-4 py-2">Jam Masuk</th>
                                    <th class="border px-4 py-2">Jam Pulang</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 text-black dark:text-white">
                                @foreach ($period as $date)
                                    @php
                                        $tgl = $date->toDateString();
                                        $masuk = isset($absens[$tgl]) ? $absens[$tgl]->firstWhere('status', 'masuk') : null;
                                        $pulang = isset($absens[$tgl]) ? $absens[$tgl]->firstWhere('status', 'pulang') : null;
                                    @endphp
                                    <tr class="border-t">
                                        <td class="border px-4 py-2">{{ $date->format('d M Y') }}</td>
                                        <td class="border px-4 py-2">{!! formatJam($masuk, 'masuk') !!}</td>
                                        <td class="border px-4 py-2">{!! formatJam($pulang, 'pulang') !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@include('sweetalert::alert')