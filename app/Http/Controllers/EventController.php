<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPhoto;
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
            'fotos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $event = Event::create($request->only([
            'nama_event', 'tanggal_mulai', 'tanggal_selesai', 'link_drive', 'deskripsi'
        ]));

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('event_photos', 'public');
                $event->photos()->create(['foto' => $path]);
            }
        }

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function show(Request $request, string $id)
    {
        $event = Event::with('photos')->findOrFail($id);

        // Jika berasal dari halaman publik
        if ($request->query('source') === 'public') {
            return view('public.event_show', compact('event'));
        }

        // Jika tidak, tampilan admin
        return view('admin.event.show', compact('event'));
    }


    public function edit(string $id)
    {
        $event = Event::with('photos')->findOrFail($id);
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
            'fotos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $event->update($request->only([
            'nama_event', 'tanggal_mulai', 'tanggal_selesai', 'link_drive', 'deskripsi'
        ]));

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('event_photos', 'public');
                $event->photos()->create(['foto' => $path]);
            }
        }

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        foreach ($event->photos as $photo) {
            Storage::disk('public')->delete($photo->foto);
        }

        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus!');
    }
}
