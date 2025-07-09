<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPhoto;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('photos')->oldest()->paginate(7);
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'link_drive' => 'nullable|url',
            'deskripsi' => 'required',
            'status' => 'required|in:Coming Soon,Buka Pendaftaran,Sedang Berlangsung,Telah Selesai',
            'fotos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lomba_nama.*' => 'nullable|string',
            'lomba_link.*' => 'nullable|url',
        ]);

        $event = Event::create($request->only([
            'nama_event',
            'tanggal_mulai',
            'tanggal_selesai',
            'link_drive',
            'deskripsi',
            'status'
        ]));

        // Simpan foto
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('event_photos', 'public');
                $event->photos()->create(['foto' => $path]);
            }
        }

        // Simpan daftar lomba
        if ($request->has('lomba_nama') && $request->has('lomba_link')) {
            foreach ($request->lomba_nama as $index => $namaLomba) {
                $link = $request->lomba_link[$index] ?? null;
                if ($namaLomba && $link) {
                    $event->lombas()->create([
                        'nama_lomba' => $namaLomba,
                        'link_pendaftaran' => $link,
                    ]);
                }
            }
        }

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function show(Request $request, string $id)
    {
        $event = Event::with(['photos', 'lombas'])->findOrFail($id);

        if ($request->query('source') === 'public') {
            return view('public.event_show', compact('event'));
        }

        return view('admin.event.show', compact('event'));
    }

    public function edit(string $id)
    {
        $event = Event::with(['photos', 'lombas'])->findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'nama_event' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'link_drive' => 'nullable|url',
            'deskripsi' => 'required',
            'status' => 'required|in:Coming Soon,Buka Pendaftaran,Sedang Berlangsung,Telah Selesai',
            'fotos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lomba_nama.*' => 'nullable|string',
            'lomba_link.*' => 'nullable|url',
        ]);

        $event->update($request->only([
            'nama_event',
            'tanggal_mulai',
            'tanggal_selesai',
            'link_drive',
            'deskripsi',
            'status'
        ]));

        // Simpan foto baru (tanpa hapus yang lama)
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('event_photos', 'public');
                $event->photos()->create(['foto' => $path]);
            }
        }

        // Hapus lomba lama lalu simpan yang baru
        $event->lombas()->delete();
        if ($request->has('lomba_nama') && $request->has('lomba_link')) {
            foreach ($request->lomba_nama as $index => $namaLomba) {
                $link = $request->lomba_link[$index] ?? null;
                if ($namaLomba && $link) {
                    $event->lombas()->create([
                        'nama_lomba' => $namaLomba,
                        'link_pendaftaran' => $link,
                    ]);
                }
            }
        }

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        foreach ($event->photos as $photo) {
            Storage::disk('public')->delete($photo->foto);
            $photo->delete();
        }

        $event->lombas()->delete(); // Hapus semua lomba terkait

        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus!');
    }
}
