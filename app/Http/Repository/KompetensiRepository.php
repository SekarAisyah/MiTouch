<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Helpers\BaseHelper;

class KompetensiRepository
{

    public function create($data)
    {
        return DB::table('pocket_moving_tbl_r_kompetensi')->insert([
            'PID' =>  Str::random(4),
            'KODE' => $data['kode'],
            'NAMA' => $data['nama'],
            'KOMPETENSI' => $data['kompetensi'],
        ]);
    }

    function getAllData()
    {
        $data = DB::table('pocket_moving_tbl_r_kompetensi')->get();

        return $data;
    }


    public function delete($selectedKompetensiId)
    {
        try {
            DB::table('pocket_moving_tbl_r_kompetensi')->where('PID', $selectedKompetensiId)->delete();
            return 'Data User Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data user: ' . $e->getMessage();
        }
    }

    public function getById($id)
    {
        $data = DB::table('pocket_moving_tbl_r_kompetensi')
            ->where('pocket_moving_tbl_r_kompetensi.PID', $id)
            ->first();

        return $data;
    }

    public function edit($data, $id)
    {

        return DB::table('pocket_moving_tbl_r_kompetensi')
            ->where('PID', $id)
            ->update([
                'PID' =>  Str::random(4),
                'KODE' => $data['kode'],
                'NAMA' => $data['nama'],
                'KOMPETENSI' => $data['kompetensi'],
            ]);
    }
}
