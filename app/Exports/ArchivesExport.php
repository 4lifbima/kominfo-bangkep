<?php

namespace App\Exports;

use App\Models\Archive;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ArchivesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Archive::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Judul',
            'Kategori',
            'Tahun',
            'Deskripsi',
            'Tanggal Dibuat',
        ];
    }

    public function map($archive): array
    {
        return [
            $archive->id,
            $archive->title,
            $archive->category,
            $archive->year,
            $archive->description,
            $archive->created_at->format('d-m-Y'),
        ];
    }
}
