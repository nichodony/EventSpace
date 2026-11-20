<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Http\Requests\KegiatanRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KegiatanController extends Controller
{
    public function index(): View
    {
        $kegiatans = Kegiatan::orderBy('tanggal', 'desc')
            ->paginate(5);

        $totalKegiatan = Kegiatan::count();

        $direncanakan = Kegiatan::where(
            'status',
            'Direncanakan'
        )->count();

        $berlangsung = Kegiatan::where(
            'status',
            'Berlangsung'
        )->count();

        $selesai = Kegiatan::where(
            'status',
            'Selesai'
        )->count();

        return view('kegiatans.index', compact(
            'kegiatans',
            'totalKegiatan',
            'direncanakan',
            'berlangsung',
            'selesai'
        ));
    }

    public function create(): View
    {
        return view('kegiatans.create');
    }

    public function store(KegiatanRequest $request): RedirectResponse
    {
        Kegiatan::create($request->validated());

        return redirect()->route('kegiatans.index')
            ->with('success', 'Data kegiatan berhasil ditambahkan!');
    }

    public function show(Kegiatan $kegiatan): View
    {
        return view('kegiatans.show', compact('kegiatan'));
    }

    public function edit(Kegiatan $kegiatan): View
    {
        return view('kegiatans.edit', compact('kegiatan'));
    }

    public function update(
        KegiatanRequest $request,
        Kegiatan $kegiatan
    ): RedirectResponse {
        $kegiatan->update($request->validated());

        return redirect()->route('kegiatans.index')
            ->with('success', 'Data kegiatan berhasil diperbarui!');
    }

    public function destroy(Kegiatan $kegiatan): RedirectResponse
    {
        $kegiatan->delete();

        return redirect()->route('kegiatans.index')
            ->with('success', 'Data kegiatan berhasil dihapus!');
    }
}
