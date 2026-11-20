
@extends('layouts.app')

@section('title', 'Edit Kegiatan')
@section('page-title', 'Edit Kegiatan')
@section('page-description', 'Perbarui informasi kegiatan yang sudah terdaftar.')

@section('content')

<div class="content-card">
    <div class="mb-4">
        <h5 class="fw-bold mb-1">Edit Informasi Kegiatan</h5>
        <p class="text-secondary small mb-0">
            Ubah informasi kegiatan sesuai data terbaru.
        </p>
    </div>

    <form action="{{ route('kegiatans.update', $kegiatan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label for="kode_kegiatan" class="form-label">
                    Kode Kegiatan
                </label>
                <input type="text"
                       name="kode_kegiatan"
                       id="kode_kegiatan"
                       class="form-control"
                       value="{{ old('kode_kegiatan', $kegiatan->kode_kegiatan) }}"
                       required>
            </div>

            <div class="col-md-6">
                <label for="nama_kegiatan" class="form-label">
                    Nama Kegiatan
                </label>
                <input type="text"
                       name="nama_kegiatan"
                       id="nama_kegiatan"
                       class="form-control"
                       value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}"
                       required>
            </div>

            <div class="col-md-6">
                <label for="tanggal" class="form-label">
                    Tanggal Kegiatan
                </label>
                <input type="date"
                       name="tanggal"
                       id="tanggal"
                       class="form-control"
                       value="{{ old('tanggal', $kegiatan->tanggal->format('Y-m-d')) }}"
                       required>
            </div>

            <div class="col-md-6">
                <label for="lokasi" class="form-label">
                    Lokasi
                </label>
                <input type="text"
                       name="lokasi"
                       id="lokasi"
                       class="form-control"
                       value="{{ old('lokasi', $kegiatan->lokasi) }}"
                       required>
            </div>

            <div class="col-md-6">
                <label for="penanggung_jawab" class="form-label">
                    Penanggung Jawab
                </label>
                <input type="text"
                       name="penanggung_jawab"
                       id="penanggung_jawab"
                       class="form-control"
                       value="{{ old('penanggung_jawab', $kegiatan->penanggung_jawab) }}"
                       required>
            </div>

            <div class="col-md-6">
                <label for="status" class="form-label">
                    Status Kegiatan
                </label>
                <select name="status" id="status" class="form-select" required>
                    <option value="Direncanakan"
                        {{ old('status', $kegiatan->status) == 'Direncanakan' ? 'selected' : '' }}>
                        Direncanakan
                    </option>

                    <option value="Berlangsung"
                        {{ old('status', $kegiatan->status) == 'Berlangsung' ? 'selected' : '' }}>
                        Berlangsung
                    </option>

                    <option value="Selesai"
                        {{ old('status', $kegiatan->status) == 'Selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
            <a href="{{ route('kegiatans.index') }}"
               class="btn btn-outline-slate">
                Batal
            </a>

            <button type="submit" class="btn btn-slate">
                <i class="bi bi-check-lg me-1"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

@endsection
