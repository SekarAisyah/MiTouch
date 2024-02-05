<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Helpers\BaseHelper;

class UserRepository
{
  
    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['id_role'] = (int) $data['id_role'];
        $userId = DB::table('users')->insertGetId($data);

        return $userId;
    }

    public function authenticate(array $credentials)
    {
    
        $user = DB::table('users')->where('username', $credentials['username'])->first();

        if ($user && $this->verifyPassword($credentials['password'], $user->password)) {
            return true;
        }

        return false;
    }

    protected function verifyPassword($password, $hashedPassword)
    {  
        $sqlServerHash = hash('sha256', $password); 
        return $sqlServerHash === $hashedPassword;
    }

    public function getData()
    {
        return DB::table('users')->get();
    }

    public function delete($selectedUserId)
    {
        try {
            DB::table('users')->where('id', $selectedUserId)->delete();
            return 'Data User Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data user: ' . $e->getMessage();
        }
    }

    public function getById($id)
    {
        $data = DB::table('users')
            ->where('users.id', $id)
            ->first();
    
        return $data;
    }

    public function edit($data, $id)
    {
       
        $data['password'] = Hash::make($data['password']);
        return DB::table('users')
            ->where('id', $id)
            ->update([
                'nrp' => $data['nrp'],
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
                'jabatan' => $data['jabatan'],
                'departemen' => $data['departemen'],
                'perusahaan' => $data['perusahaan'],
                'phone_number' => $data['phone_number'],
                'alamat' => $data['alamat'],
                'id_role' => $data['id_role'],
            ]);
    }

    public function editProfile($data, $id)
    {
        try {
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'nrp' => $data['nrp'],
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'jabatan' => $data['jabatan'],
                    'departemen' => $data['departemen'],
                    'perusahaan' => $data['perusahaan'],
                    'phone_number' => $data['phone_number'],
                    'alamat' => $data['alamat'],
                ]);
    
            return ['status' => 'success'];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function getCurrentUserPassword($userId)
    {
        return DB::table('users')->where('id', $userId)->value('password');
    }

    public function changePassword($userId, $newPassword)
    {
        try {
            DB::table('users')->where('id', $userId)->update(['password' => $newPassword]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function verifyNewPassword($userId, $newPassword)
    {
        // Mengambil password saat ini dari database
        $currentUserPassword = $this->getCurrentUserPassword($userId);

        // Verifikasi bahwa password baru sesuai dengan konfirmasi password
        return Hash::check($newPassword, $currentUserPassword);
    }
    
    
}
