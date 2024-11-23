<?php

namespace App\Exports;

use App\Models\Position;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PositionsExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Position::query();
    }

    public function map($position): array
    {
        return [
            $position->id,
            $position->name,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Posisi',
        ];
    }
}
