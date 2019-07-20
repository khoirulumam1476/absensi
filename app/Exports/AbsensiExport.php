<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use App\Http\Controllers\AbsensiController as Absensi;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $details    	= [];
        $absensi    	= DB::table('absensi')
                   		->select('id_siswa')
                    	->leftJoin('detail_absensi', 'id_absensi', '=', 'detail_absensi.id_absensi' );

        if ( isset( $_GET['kelas'] ) && $_GET['kelas'] != 0 ) {
            $absensi->where('id_kelas', '=', $_GET['kelas']);
        }
        if ( isset($_GET['semester'] ) && $_GET['semester'] != 0) {
            $absensi->where('semester', '=', $_GET['semester']);
        }
        $result = $absensi->distinct()->get();

        foreach ( $result as $sis ) {
            $data[] = [
                'id'    => $sis->id_siswa,
                'nis'   => app('App\Http\Controllers\AbsensiController')->getNis($sis->id_siswa),
                'nama'  => app('App\Http\Controllers\AbsensiController')->getNama($sis->id_siswa),
                'hadir' => app('App\Http\Controllers\AbsensiController')->getStatus($sis->id_siswa, 'H')->count(),
                'sakit' => app('App\Http\Controllers\AbsensiController')->getStatus($sis->id_siswa, 'S')->count(),
                'ijin'  => app('App\Http\Controllers\AbsensiController')->getStatus($sis->id_siswa, 'I')->count(),
                'alpa'  => app('App\Http\Controllers\AbsensiController')->getStatus($sis->id_siswa, 'A')->count(),
            ];
            $details = collect($data);
        }   

        return $details;
    }

    public function headings(): array
    {
        return [
            'NO',
            'NIS',
            'NAMA',
            'HADIR',
            'SAKIT',
            'IJIN',
            'ALPA',
        ];
    }
}
