
@extends('layouts.app')

@section('title', 'Detail Kegiatan')
@section('page-title', 'Detail Kegiatan')
@section('page-description', 'Informasi lengkap mengenai kegiatan yang dipilih.')

@section('content')

<div class="content-card">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1">Informasi Kegiatan</h5>
            <p class="text-secondary small mb-0">
                Detail data kegiatan EventSpace.
            </p>
        </div>

        <a href="{{ route('kegiatans.edit', $kegiatan->id) }}"
           class="btn btn-slate">
            <i class="bi bi-pencil me-1"></i>
            Edit Kegiatan
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <th class="text-secondary fw-semibold" style="width: 220px;">
                        Kode Kegiatan
                    </th>
                    <td>{{ $kegiatan->kode_kegiatan }}</td>
                </tr>

                <tr>
                    <th class="text-secondary fw-semibold">
                        Nama Kegiatan
                    </th>
                    <td>{{ $kegiatan->nama_kegiatan }}</td>
                </tr>

                <tr>
                    <th class="text-secondary fw-semibold">
                        Tanggal
                    </th>
                    <td>{{ $kegiatan->tanggal->format('d/m/Y') }}</td>
                </tr>

                <tr>
                    <th class="text-secondary fw-semibold">
                        Lokasi
                    </th>
                    <td>{{ $kegiatan->lokasi }}</td>
                </tr>

                <tr>
                    <th class="text-secondary fw-semibold">
                        Penanggung Jawab
                    </th>
                    <td>{{ $kegiatan->penanggung_jawab }}</td>
                </tr>

                <tr>
                    <th class="text-secondary fw-semibold">
                        Status
                    </th>
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
                </tr>

                <tr>
                    <th class="text-secondary fw-semibold">
                        Dibuat Pada
                    </th>
                    <td>{{ $kegiatan->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4 pt-3 border-top">
        <a href="{{ route('kegiatans.index') }}"
           class="btn btn-outline-slate">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Dashboard
        </a>
    </div>
</div>

@endsection
