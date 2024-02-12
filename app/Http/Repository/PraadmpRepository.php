<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

Class PraadmpRepository
{
    public function getById($id)
    {
        $data = DB::table('m_praadmp')
            ->join('users', 'm_praadmp.nrp', '=', 'users.nrp')
            ->where('m_praadmp.id', $id)
            ->first(['m_praadmp.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan']);
        
        return $data;
    }


    public function create($data)
    {
        return DB::table('m_praadmp')->insert([
            'nrp' => $data['nrp'],
            'ringkasan' => $data['ringkasan_admp'],
            'efektivitas' => $data['efektivitas_admp'],
            'file_path' => $data['file_path'],
            'created_at' => now(),
            'created_by' => auth()->user() ? auth()->user()->id : null,
            'created_name' => auth()->user() ? auth()->user()->username : null,
        ]);
    }

    public function edit($data, $id, $userRole)
    {
         
        return DB::table('m_praadmp')
            ->where('id', $id)
            ->update([
                'nrp' => $data['nrp-dropdown-edit'],
                'ringkasan' => $data['ringkasan_admp_edit'],
                'efektivitas' => $data['efektivitas_admp_edit'],
                'file_path' => $data['file_path'],
                'created_by' => auth()->user()->id,
                'created_name' => auth()->user()->username,
               
            ]);
    }

    public function getAll()
    {
        return DB::table('m_praadmp')->get();
    }

    public function getAllWithUsername()
    {
        $data = DB::table('m_praadmp')
            ->join('users', 'm_praadmp.nrp', '=', 'users.nrp')
            ->select('m_praadmp.*', 'users.name as username','users.departemen as departemen', 'users.perusahaan as perusahaan') // Sesuaikan alias dengan nama yang Anda inginkan
            ->orderBy('m_praadmp.created_at', 'desc')
            ->get();

        return $data;
    }


    public function delete($selectedpraadmpId)
    {
        try {
            DB::table('m_praadmp')->where('id', $selectedpraadmpId)->delete();
            return 'Data admp Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data admp: ' . $e->getMessage();
        }
    }
   
}

?>
