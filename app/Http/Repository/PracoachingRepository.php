<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

Class PracoachingRepository
{
    public function getById($id)
    {
        $data = DB::table('m_pracoaching')
            ->join('users', 'm_pracoaching.nrp', '=', 'users.nrp')
            ->where('m_pracoaching.id', $id)
            ->first(['m_pracoaching.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan']);
        
        return $data;
    }


    public function create($data)
    {
        return DB::table('m_pracoaching')->insert([
            'nrp' => $data['nrp'],
            'ringkasan' => $data['ringkasan_coaching'],
            'efektivitas' => $data['efektivitas_coaching'],
            'file_path' => $data['file_path'],
            'created_at' => now(),
            'created_by' => auth()->user() ? auth()->user()->id : null,
            'created_name' => auth()->user() ? auth()->user()->username : null,
        ]);
    }

    public function edit($data, $id, $userRole)
    {
         
        return DB::table('m_pracoaching')
            ->where('id', $id)
            ->update([
                'nrp' => $data['nrp-dropdown-edit'],
                'ringkasan' => $data['ringkasan_coaching_edit'],
                'efektivitas' => $data['efektivitas_coaching_edit'],
                'file_path' => $data['file_path'],
                'created_by' => auth()->user()->id,
                'created_name' => auth()->user()->username,
               
            ]);
    }

    public function getAll()
    {
        return DB::table('m_pracoaching')->get();
    }

    public function getAllWithUsername()
    {
        $data = DB::table('m_pracoaching')
            ->join('users', 'm_pracoaching.nrp', '=', 'users.nrp')
            ->select('m_pracoaching.*', 'users.name as username','users.departemen as departemen', 'users.perusahaan as perusahaan') // Sesuaikan alias dengan nama yang Anda inginkan
            ->orderBy('m_pracoaching.created_at', 'desc')
            ->get();

        return $data;
    }


    public function delete($selectedpracoachingId)
    {
        try {
            DB::table('m_pracoaching')->where('id', $selectedpracoachingId)->delete();
            return 'Data coaching Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data coaching: ' . $e->getMessage();
        }
    }
   
}

?>
