<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

Class PrapelatihanRepository
{
    public function getById($id)
    {
        $data = DB::table('m_prapelatihan')
            ->join('users', 'm_prapelatihan.nrp', '=', 'users.nrp')
            ->where('m_prapelatihan.id', $id)
            ->first(['m_prapelatihan.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan']);
        
        return $data;
    }


    public function create($data)
    {
        return DB::table('m_prapelatihan')->insert([
            'nrp' => $data['nrp'],
            'ringkasan' => $data['ringkasan_pelatihan'],
            'file_path' => $data['file_path'],
            'created_by' => auth()->user() ? auth()->user()->id : null,
            'created_name' => auth()->user() ? auth()->user()->username : null,
        ]);
    }

    public function edit($data, $id, $userRole)
    {
         
        return DB::table('m_prapelatihan')
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
        return DB::table('m_prapelatihan')->get();
    }

    public function getAllWithUsername()
    {
        $data = DB::table('m_prapelatihan')
            ->join('users', 'm_prapelatihan.nrp', '=', 'users.nrp')
            ->select('m_prapelatihan.*', 'users.name as username','users.departemen as departemen', 'users.perusahaan as perusahaan') // Sesuaikan alias dengan nama yang Anda inginkan
            ->get();

        return $data;
    }


    public function delete($selectedpraPelatihanId)
    {
        try {
            DB::table('m_prapelatihan')->where('id', $selectedpraPelatihanId)->delete();
            return 'Data Pelatihan Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data pelatihan: ' . $e->getMessage();
        }
    }
   
}

?>