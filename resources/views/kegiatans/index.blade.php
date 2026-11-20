
@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Ringkasan dan pengelolaan kegiatan EventSpace.')

@section('content')

<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-calendar-event"></i>
            </div>
            <div class="stat-label">Total Kegiatan</div>
            <div class="stat-number">{{ $totalKegiatan }}</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div class="stat-label">Direncanakan</div>
            <div class="stat-number">{{ $direncanakan }}</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <div class="stat-label">Berlangsung</div>
            <div class="stat-number">{{ $berlangsung }}</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-label">Selesai</div>
            <div class="stat-number">{{ $selesai }}</div>
        </div>
    </div>
</div>

<div class="content-card">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1">Daftar Kegiatan</h5>
            <p class="text-secondary small mb-0">
                Kelola seluruh data kegiatan yang terdaftar.
            </p>
        </div>

        <a href="{{ route('kegiatans.create') }}" class="btn btn-slate">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Kegiatan
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Penanggung Jawab</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($kegiatans as $index => $kegiatan)
                    <tr>
                        <td>{{ $kegiatans->firstItem() + $index }}</td>

                        <td>
                            <span class="fw-semibold text-secondary">
                                {{ $kegiatan->kode_kegiatan }}
                            </span>
                        </td>

                        <td>
                            <div class="fw-semibold">
                                {{ $kegiatan->nama_kegiatan }}
                            </div>
                        </td>

                        <td>
                            {{ $kegiatan->tanggal->format('d/m/Y') }}
                        </td>

                        <td>{{ $kegiatan->lokasi }}</td>

                        <td>{{ $kegiatan->penanggung_jawab }}</td>

                        <td>
                            @if ($kegiatan->status == 'Direncanakan')
                                <span class="badge-status status-direncanakan">
                                    Direncanakan
                                </span>
                            @elseif ($kegiatan->status == 'Berlangsung')
                                <span class="badge-status status-berlangsung">
                                    Berlangsung
                                </span>
                            @else
                                <span class="badge-status status-selesai">
                                    Selesai
                                </span>
                            @endif
                        </td>

                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('kegiatans.show', $kegiatan->id) }}"
                                   class="action-btn"
                                   title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('kegiatans.edit', $kegiatan->id) }}"
                                   class="action-btn"
                                   title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('kegiatans.destroy', $kegiatan->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="action-btn"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <i class="bi bi-calendar-x fs-1 text-secondary"></i>
                            <p class="fw-semibold mt-3 mb-1">
                                Belum ada kegiatan
                            </p>
                            <p class="text-secondary small mb-3">
                                Tambahkan kegiatan pertama untuk mulai mengelola EventSpace.
                            </p>
                            <a href="{{ route('kegiatans.create') }}"
                               class="btn btn-slate btn-sm">
                                Tambah Kegiatan
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($kegiatans->hasPages())
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mt-4">
            <small class="text-secondary">
                Menampilkan {{ $kegiatans->firstItem() }}–{{ $kegiatans->lastItem() }}
                dari {{ $kegiatans->total() }} kegiatan
            </small>

            <nav>
                <ul class="pagination">
                    <li class="page-item {{ $kegiatans->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link"
                           href="{{ $kegiatans->previousPageUrl() ?? '#' }}">
                            Sebelumnya
                        </a>
                    </li>

                    <li class="page-item active">
                        <span class="page-link">
                            {{ $kegiatans->currentPage() }}
                        </span>
                    </li>

                    <li class="page-item {{ $kegiatans->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link"
                           href="{{ $kegiatans->nextPageUrl() ?? '#' }}">
                            Selanjutnya
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
</div>

@endsection
