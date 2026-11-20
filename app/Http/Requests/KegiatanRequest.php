<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Kegiatan;

class KegiatanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $kegiatan = $this->route('kegiatan');

        $kegiatanId = $kegiatan instanceof Kegiatan
            ? $kegiatan->id
            : $kegiatan;

        return [
            'kode_kegiatan' => [
                'required',
                'string',
                'max:50',
                Rule::unique('kegiatans', 'kode_kegiatan')->ignore($kegiatanId),
            ],

            'nama_kegiatan' => 'required|string|min:3|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',

            'status' => [
                'required',
                Rule::in(['Direncanakan', 'Berlangsung', 'Selesai']),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'kode_kegiatan.required' => 'Kode kegiatan wajib diisi.',
            'kode_kegiatan.unique' => 'Kode kegiatan sudah digunakan.',
            'kode_kegiatan.max' => 'Kode kegiatan maksimal 50 karakter.',

            'nama_kegiatan.required' => 'Nama kegiatan wajib diisi.',
            'nama_kegiatan.min' => 'Nama kegiatan minimal 3 karakter.',

            'tanggal.required' => 'Tanggal kegiatan wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',

            'lokasi.required' => 'Lokasi kegiatan wajib diisi.',
            'penanggung_jawab.required' => 'Penanggung jawab wajib diisi.',

            'status.required' => 'Status kegiatan wajib dipilih.',
            'status.in' => 'Status kegiatan tidak valid.',
        ];
    }
}
