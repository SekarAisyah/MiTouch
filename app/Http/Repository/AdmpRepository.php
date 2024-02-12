<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

class admpRepository
{
    public function getById($id)
    {
        $data = DB::table('pocket_moving_tbl_t_admp')
            ->join('users', 'pocket_moving_tbl_t_admp.NRP', '=', 'users.nrp')
            ->where('pocket_moving_tbl_t_admp.PID', $id)
            ->first(['pocket_moving_tbl_t_admp.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan', 'users.phone_number', 'users.alamat']);

        // $data->username = $data->nama;
        return $data;
    }

    public function create($data)
    {
        return DB::table('pocket_moving_tbl_t_admp')->insert([
            'PID' =>  Str::random(4),
            'NRP' => $data['nrp-dropdown'],
            'NAMA' => $data['nama_admp_add'],
            'ADMP_JA_START_DATE' => $data['star_admp'],
            'ADMP_JA_FINISH_DATE' => $data['finish_admp'],
            'JA_RESULT_DESCRIPTION' => $data['ja_result'],
            'JA_TARGET_DESCRIPTION' => $data['ja_target'],
            'JA_SHORT_DESCRIPTION' => $data['ja_short'],
            'status' => 1,
            'CREATE_AT' => now(),
            // 'CREATE_BY' => auth()->user()->id,
            // 'CREATE_NAME' => auth()->user()->username,

        ]);
    }

    public function getAllWithDate()
    {
        return DB::table('pocket_moving_tbl_t_admp')
            ->join('users', 'pocket_moving_tbl_t_admp.NRP', '=', 'users.nrp')
            ->select(
                'pocket_moving_tbl_t_admp.*',
                'users.name as username',
                'users.departemen as departemen',
                'users.perusahaan as perusahaan'
            )
            ->orderBy('pocket_moving_tbl_t_admp.ADMP_JA_START_DATE', 'desc');
    }

    public function edit($data, $id, $userRole)
    {
        $kodeStatus = 1;
        switch ($userRole) {
            case 1:
                $kodeStatus = 1;
                break;
            case 2:
                $kodeStatus = 3;
                break;
            case 3:
                $kodeStatus = 4;
                break;
            case 4:
                $kodeStatus = 5;
                break;
            case 5:
                $kodeStatus = 6;
                break;
            default:
                $kodeStatus = 1;
                break;
        }
        return DB::table('pocket_moving_tbl_t_admp')
            ->where('PID', $id)
            ->update([
                'NRP' => $data['nrp-dropdown'],
                'NAMA' => $data['nama_admp_add'],
                'ADMP_JA_START_DATE' => $data['star_admp'],
                'ADMP_JA_FINISH_DATE' => $data['finish_admp'],
                'JA_RESULT_DESCRIPTION' => $data['ja_result'],
                'JA_TARGET_DESCRIPTION' => $data['ja_target'],
                'JA_SHORT_DESCRIPTION' => $data['ja_short'],
                'status' => $kodeStatus,
                'REVISI_BY' =>null
            ]);
    }

    public function getAll()
    {
        return DB::table('pocket_moving_tbl_t_admp')->get();
    }

    public function getAllWithUsername()
    {
        $data = DB::table('pocket_moving_tbl_t_admp')
            ->join('users', 'pocket_moving_tbl_t_admp.NRP', '=', 'users.nrp')
            ->select('pocket_moving_tbl_t_admp.*', 'users.name as username', 'users.departemen as departemen', 'users.perusahaan as perusahaan') // Sesuaikan alias dengan nama yang Anda inginkan
            ->orderBy('pocket_moving_tbl_t_admp.CREATE_AT', 'desc')
            ->get();

        return $data;
    }

    public function send($userId, $userRole, $keterangan, $selectedadmpId)
    {

        $admp = DB::table('pocket_moving_tbl_t_admp')->where('PID', $selectedadmpId)->first();
        if (!$admp) {
            return "admp not found";
        }

        $currentKodeStatus = $admp->status;
        $newKodeStatus = $currentKodeStatus + 1;

        if ($newKodeStatus == 2) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'status' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 3) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'APPRV_ATASAN' => 1,
                    'UPDATE_AT_ATASAN' => now(),
                    'status' => $newKodeStatus,
                    'keterangan' => $keterangan,
                    'REVISI_BY' => null
                ]);
        } else if ($newKodeStatus == 4) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'APPRV_HR' => 1,
                    'UPDATE_AT_HR' => now(),
                    'status' => $newKodeStatus,
                    'KETERANGAN_HR' => $keterangan,
                    'REVISI_BY' => null
                ]);
        } else if ($newKodeStatus == 5) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'APPRV_HR_MNG' => 1,
                    'UPDATE_AT_HR_MNG' => now(),
                    'status' => $newKodeStatus,
                    'KETERANGAN_HR_MNG' => $keterangan,
                    'REVISI_BY' => null
                ]);
        } else if ($newKodeStatus == 6) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'APPRV_DRC' => 1,
                    'UPDATE_AT_DRC' => now(),
                    'status' => $newKodeStatus,
                    'KETERANGAN_DRC' => $keterangan,
                    'REVISI_BY' => null
                ]);
        } else if ($newKodeStatus == 7) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'status' => 7,
                ]);
        }

        return "Status updated successfully";
    }

    public function revisi($revisiName, $selectedadmpId, $userRole, $pesanRevisi, $userId)
    {
        $kodeStatus = 8; // Default value

        switch ($userRole) {
            case 2:
                $kodeStatus = 8;
                $ket_atasan = $pesanRevisi;
                $status_revisi = $userRole;
                break;
            case 3:
                $kodeStatus = 9;
                $ket_hr =  $pesanRevisi;
                $status_revisi = $userRole;
                break;
            case 4:
                $kodeStatus = 10;
                $ket_hr_mng = $pesanRevisi;
                $status_revisi = $userRole;
                break;
            case 5:
                $kodeStatus = 11;
                $ket_drc = $pesanRevisi;
                $status_revisi = $userRole;
                break;
            default:
                // $kodeStatus = 8;
                if ($kodeStatus == 8) {
                    $ket_atasan = $pesanRevisi;
                    $status_revisi = $userRole;
                } else if ($kodeStatus == 9) {
                    $ket_hr =  $pesanRevisi;
                    $status_revisi = $userRole;
                } else if ($kodeStatus == 10) {
                    $ket_hr_mng = $pesanRevisi;
                    $status_revisi = $userRole;
                } else if ($kodeStatus == 11) {
                    $ket_drc = $pesanRevisi;
                    $status_revisi = $userRole;
                } else {
                    $ket_atasan = $pesanRevisi;
                    $status_revisi = $userRole;
                }
                break;
        }

        if ($kodeStatus == 8) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'status' => $kodeStatus,
                    'UPDATE_AT_ATASAN' => now(),
                    'keterangan' => $ket_atasan,
                    'REVISI_BY' => $status_revisi
                ]);
        } else if ($kodeStatus == 9) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'KETERANGAN_HR' => $ket_hr,
                    'UPDATE_AT_HR' => now(),
                    'status' => $kodeStatus,
                    'REVISI_BY' => $status_revisi
                ]);
        } else if ($kodeStatus == 10) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'KETERANGAN_HR_MNG' => $ket_hr_mng,
                    'UPDATE_AT_HR_MNG' => now(),
                    'status' => $kodeStatus,
                    'REVISI_BY' => $status_revisi
                ]);
        } else if ($kodeStatus == 11) {
            DB::table('pocket_moving_tbl_t_admp')
                ->where('PID', $selectedadmpId)
                ->update([
                    'KETERANGAN_DRC' => $ket_drc,
                    'UPDATE_AT_DRC' => now(),
                    'status' => $kodeStatus,
                    'REVISI_BY' => $status_revisi
                ]);
        }

        return 'Data admp berhasil di "Revisi"';
    }

    public function reject($rejectName, $selectedadmpId, $pesanReject, $userId, $userRole)
    {

        switch ($userRole) {
            case 2:
                DB::table('pocket_moving_tbl_t_admp')
                    ->where('PID', $selectedadmpId)
                    ->update([
                        'APPRV_ATASAN' => 0,
                        'status' => 7,
                        'keterangan' => $pesanReject,
                        'REVISI_BY' => 0,
                        'REJECT_BY' => 2,
                        
                    ]);
                break;
            case 3:
                DB::table('pocket_moving_tbl_t_admp')
                    ->where('PID', $selectedadmpId)
                    ->update([
                        'APPRV_HR' => 0,
                        'status' => 7,
                        'KETERANGAN_HR' => $pesanReject,
                        'REVISI_BY' => 0,
                        'REJECT_BY' => 3,
                    ]);
                break;
            case 4:
                DB::table('pocket_moving_tbl_t_admp')
                    ->where('PID', $selectedadmpId)
                    ->update([
                        'APPRV_HR_MNG' => 0,
                        'status' => 7,
                        'KETERANGAN_HR_MNG' => $pesanReject,
                        'REVISI_BY' => 0,
                        'REJECT_BY' => 4,
                    ]);
                break;
            case 5:
                DB::table('pocket_moving_tbl_t_admp')
                    ->where('PID', $selectedadmpId)
                    ->update([
                        'APPRV_DRC' => 0,
                        'status' => 7,
                        'KETERANGAN_DRC' => $pesanReject,
                        'REVISI_BY' => 0,
                        'REJECT_BY' => 5,
                    ]);
                break;
            default:
                DB::table('pocket_moving_tbl_t_admp')
                    ->where('PID', $selectedadmpId)
                    ->update([
                        'APPRV_ATASAN' => 0,
                        'status' => 7,
                        'keterangan' => $pesanReject,
                        'REVISI_BY' => 0,
                        'REJECT_BY' => 2,
                    ]);
                break;
        }

        return 'Data admp Berhasil di "Reject"';
    }

    public function delete($selectedadmpId)
    {
        try {
            DB::table('pocket_moving_tbl_t_admp')->where('PID', $selectedadmpId)->delete();
            return 'Data admp Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data admp: ' . $e->getMessage();
        }
    }
}
