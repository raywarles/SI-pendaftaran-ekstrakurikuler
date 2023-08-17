<?php

namespace App\Exports;
use App\Models\Anggota;
use App\Models\Riwayat;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnggotaExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function forYear($ekstrakurikuler_id,$semester_id)
    {
        $this->semester_id = $semester_id;
        $this->ekstrakurikuler_id = $ekstrakurikuler_id;
        return $this;
    }

    public function collection()
    {
        return Riwayat::where('ekstrakurikuler_id',$this->ekstrakurikuler_id)->where('semester_id',$this->semester_id)->join('anggotas','riwayats.anggota_id','=','anggotas.id')->select('anggotas.nama','anggotas.email','anggotas.kelas','anggotas.jurusan','anggotas.jk','riwayats.nilai')->get();
    }
    public function headings(): array
    {
        return ["Nama", "Email", "Kelas","Jurusan","Jenis Kelamin","Nilai"];
    }
   
}
