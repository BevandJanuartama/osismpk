@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4 text-green-900">Daftar Event</h1>

<a href="{{ route('admin.event.create') }}"
   class="inline-block mb-4 px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800 transition">
    Tambah Event
</a>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto max-w-full md:max-w-none px-2">
    <div class="min-w-[750px] border-2 border-green-500 rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-green-900 text-white text-[20px]">
                <tr>
                    <th class="px-4 py-3 text-center border border-green-500">No</th>
                    <th class="px-4 py-3 text-center border border-green-500">Foto</th>
                    <th class="px-4 py-3 text-center border border-green-500">Nama Event</th>
                    <th class="px-4 py-3 text-center border border-green-500">Tanggal</th>
                    <th class="px-4 py-3 text-center border border-green-500">Status</th>
                    <th class="px-4 py-3 text-center border border-green-500">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr class="{{ $loop->even ? 'bg-green-100' : 'bg-white' }} text-[18px]">
                        <td class="px-4 py-3 text-center border border-green-500">
                            {{ $events->firstItem() + $loop->index }}
                        </td>                        
                        <td class="px-4 py-3 text-center border border-green-500">
                            @if ($event->photos->first())
                                <a href="{{ asset('storage/' . $event->photos->first()->foto) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $event->photos->first()->foto) }}"
                                         alt="Foto {{ $event->nama_event }}"
                                         class="w-16 h-16 object-cover rounded-md mx-auto hover:scale-105 transition" />
                                </a>
                            @else
                                <span class="text-gray-500 italic">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center border border-green-500">{{ $event->nama_event }}</td>
                        <td class="px-4 py-3 text-center border border-green-500">
                            {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}
                            @if ($event->tanggal_selesai)
                                - {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}
                            @endif
                        </td>

                        <td class="px-4 py-3 text-center border border-green-500">
                            <span class="
                                inline-block px-2 py-1 rounded text-white text-sm
                                {{
                                    $event->status === 'Coming Soon' ? 'bg-yellow-500' :
                                    ($event->status === 'Buka Pendaftaran' ? 'bg-blue-500' :
                                    ($event->status === 'Sedang Berlangsung' ? 'bg-green-500' :
                                    ($event->status === 'Telah Selesai' ? 'bg-gray-500' : 'bg-gray-300')))
                                }}
                            ">
                                {{ $event->status }}
                            </span>
                        </td>
                        
                        <td class="px-4 py-3 text-center border border-green-500">
                            <a href="{{ route('admin.event.edit', $event->id) }}"
                               class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin hapus event ini?')"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-600 italic">Belum ada event yang ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
@if ($events->hasPages())
<div class="mt-4 px-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4 text-sm">
    <div class="text-green-800">
        Menampilkan {{ $events->firstItem() }} sampai {{ $events->lastItem() }} dari total {{ $events->total() }} event
    </div>
    <div class="flex flex-wrap gap-1 justify-end mb-2">
        {{-- Previous --}}
        @if ($events->onFirstPage())
            <span class="px-3 py-2 bg-green-200 text-green-700 rounded cursor-not-allowed">&laquo;</span>
        @else
            <a href="{{ $events->previousPageUrl() }}"
               class="px-3 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">&laquo;</a>
        @endif

        {{-- Pages --}}
        @foreach ($events->getUrlRange(1, $events->lastPage()) as $page => $url)
            @if ($page == $events->currentPage())
                <span class="px-3 py-2 bg-green-700 text-white font-bold rounded">{{ $page }}</span>
            @else
                <a href="{{ $url }}"
                   class="px-3 py-2 bg-green-100 text-green-800 rounded hover:bg-green-200 transition">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Next --}}
        @if ($events->hasMorePages())
            <a href="{{ $events->nextPageUrl() }}"
               class="px-3 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">&raquo;</a>
        @else
            <span class="px-3 py-2 bg-green-200 text-green-700 rounded cursor-not-allowed">&raquo;</span>
        @endif
    </div>
</div>
@endif
@endsection
