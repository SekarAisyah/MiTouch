<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

class PascapelatihanRepository
{
    public function getById($id)
    {
        $data = DB::table('m_pascapelatihan')
            ->join('users', 'm_pascapelatihan.nrp', '=', 'users.nrp')
            ->where('m_pascapelatihan.id', $id)
            ->first(['m_pascapelatihan.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan']);

        return $data;
    }


    public function create($data)
    {
        return DB::table('m_pascapelatihan')->insert([
            'nrp' => $data['nrp'],
            'ringkasan' => $data['ringkasan_pelatihan'],
            'file_path' => $data['file_path'],
            'created_by' => auth()->user() ? auth()->user()->id : null,
            'created_name' => auth()->user() ? auth()->user()->username : null,
        ]);
    }

    public function edit($data, $id, $userRole)
    {

        return DB::table('m_pascapelatihan')
            ->where('id', $id)
            ->update([
                'nrp' => $data['nrp-dropdown-edit'],
                'ringkasan' => $data['ringkasan_pelatihan_edit'],
                'file_path' => $data['file_path'],
                'created_by' => auth()->user()->id,
                'created_name' => auth()->user()->username,

            ]);
    }

    public function getAll()
    {
        return DB::table('m_pascapelatihan')->get();
    }

    public function getAllWithUsername()
    {
        $data = DB::table('m_pascapelatihan')
            ->join('users', 'm_pascapelatihan.nrp', '=', 'users.nrp')
            ->select('m_pascapelatihan.*', 'users.name as username', 'users.departemen as departemen', 'users.perusahaan as perusahaan') // Sesuaikan alias dengan nama yang Anda inginkan
            ->get();

        return $data;
    }


    public function delete($selectedpascaPelatihanId)
    {
        try {
            DB::table('m_pascapelatihan')->where('id', $selectedpascaPelatihanId)->delete();
            return 'Data Pelatihan Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data pelatihan: ' . $e->getMessage();
        }
    }
}
