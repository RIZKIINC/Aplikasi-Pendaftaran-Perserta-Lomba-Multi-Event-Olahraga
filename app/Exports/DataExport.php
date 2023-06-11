<?php

namespace App\Exports;

use App\Models\Peserta;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;



class DataExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    public function collection()
    {
        return Peserta::all();
    }

    public function headings(): array
    {
        return [
            'id', "nama_event_cabor", "kecamatan_id", "nama", "nik", "ttl", "nomor_kk", "akta", "foto", "alamat", "no_olahraga", "domisili", "no_ijazah", "jk"
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->nama_event_cabor,
            $row->kecamatan_id,
            $row->nama,
            "'" . $row->nik,
            $row->ttl,
            "'" . $row->nomor_kk,
            $row->akta,
            $row->foto,
            $row->alamat,
            $row->no_olahraga,
            $row->domisili,
            $row->no_ijazah,
            $row->jk,
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $data = Peserta::all();

                foreach ($data as $index => $row) {
                    $fotoPath = public_path('uploads/' . $row->foto);
                    $aktaPath = public_path('uploads/' . $row->akta);

                    $event->sheet->getRowDimension($index + 2)->setRowHeight(100);

                    if (file_exists($fotoPath)) {
                        $drawing = new Drawing();
                        $drawing->setName('Foto');
                        $drawing->setDescription('Foto');
                        $drawing->setPath($fotoPath);
                        $drawing->setCoordinates('H' . ($index + 2));

                        // Anchor the picture to the cells
                        $drawing->setOffsetX(0);
                        $drawing->setOffsetY(0);
                        $drawing->setWorksheet($event->sheet->getDelegate());

                        // Lock the picture to the cells
                        $drawing->setResizeProportional(false);
                        $drawing->setWidth(90);
                        $drawing->setHeight(90);
                        $drawing->getShadow()->setVisible(true);
                        $drawing->getShadow()->setDirection(45);
                        $drawing->getShadow()->setDistance(10);
                    }

                    if (file_exists($aktaPath)) {
                        $drawing = new Drawing();
                        $drawing->setName('Akta');
                        $drawing->setDescription('Akta');
                        $drawing->setPath($aktaPath);
                        $drawing->setCoordinates('I' . ($index + 2));

                        // Anchor the picture to the cells
                        $drawing->setOffsetX(0);
                        $drawing->setOffsetY(0);
                        $drawing->setWorksheet($event->sheet->getDelegate());

                        // Lock the picture to the cells
                        $drawing->setResizeProportional(false);
                        $drawing->setWidth(90);
                        $drawing->setHeight(90);
                        $drawing->getShadow()->setVisible(true);
                        $drawing->getShadow()->setDirection(45);
                        $drawing->getShadow()->setDistance(10);
                    }
                }
            },
        ];
    }
}
