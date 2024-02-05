<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; //Baru
use App\Http\Helpers\BaseHelper;

use function Ramsey\Uuid\v1;

class pelatihanRepository
{
    public function getById($id)
    {
        $data = DB::table('pocket_moving_tbl_t_pelatihan')
            ->join('users', 'pocket_moving_tbl_t_pelatihan.NRP', '=', 'users.nrp')
            ->where('pocket_moving_tbl_t_pelatihan.PID', $id)
            ->first(['pocket_moving_tbl_t_pelatihan.*', 'users.name', 'users.jabatan', 'users.departemen', 'users.perusahaan', 'users.phone_number', 'users.alamat']);

        //$data->username = $data->nama;
        return $data;
    }

    public function create($data, $userRole)
    {

        return DB::table('pocket_moving_tbl_t_pelatihan')->insert([
            'PID' => Str::random(4),
            'NRP' => $data['nrp-dropdown'],
            'NAMA' => $data['nama_pelatihan_add'],
            'BERANGKAT_TRAINING' => $data['waktu_berangkat_pelatihan'],
            'MULAI_TRAINING' => $data['waktu_mulai_pelatihan'],
            'SELESAI_TRAINING' => $data['waktu_selesai_pelatihan'],
            'KEMBALI_TRAINING' => $data['waktu_kembali_pelatihan'],
            'STATUS' => 1,
            'KETERANGAN' => $data['keterangan'],
            'KOMPETENSI_DESC' => $data['kompetensi_desc'],
            'NARASUMBER' => $data['narasumber'],
            'NAMA_PENYELENGGARA' => $data['nama_penyelenggara_add'],
            'AREA' => $data['area'],
            'IS_JOBSITE' => $data['is_jobsite'],
            'CURRENCY' => $data['currency'],
            'BIAYA' => $data['biaya_pelatihan'],
            'MANFAAT_BAGI_KARYAWAN' => $data['manfaat_karyawan'],
            'MANFAAT_BAGI_PERUSAHAAN' => $data['manfaat_perusahaan'],
            'TRAINING_ATMP_CODE' => $data['atmp_code'],
            'TRAINING_ATMP_DESC' => $data['atmp_desc'],
            // 'CREATE_BY' => auth()->user()->id,
            // 'CREATE_NAME' => auth()->user()->username,

        ]);
    }

    public function edit($data, $id, $userRole)
    {
        $kodeStatus = 1; // Default value

        // Menentukan nilai kode_status berdasarkan nilai userRole
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
        return DB::table('pocket_moving_tbl_t_pelatihan')
            ->where('PID', $id)
            ->update([
                'NRP' => $data['nrp-dropdown'],
                'NAMA' => $data['nama_pelatihan_add'],
                'BERANGKAT_TRAINING' => $data['waktu_berangkat_pelatihan'],
                'MULAI_TRAINING' => $data['waktu_mulai_pelatihan'],
                'SELESAI_TRAINING' => $data['waktu_selesai_pelatihan'],
                'KEMBALI_TRAINING' => $data['waktu_kembali_pelatihan'],
                'STATUS' => $kodeStatus,
                'KETERANGAN' => $data['keterangan'],
                'KOMPETENSI_DESC' => $data['kompetensi_desc'],
                'NARASUMBER' => $data['narasumber'],
                'NAMA_PENYELENGGARA' => $data['nama_penyelenggara_add'],
                'AREA' => $data['area'],
                'IS_JOBSITE' => $data['is_jobsite'],
                'CURRENCY' => $data['currency'],
                'BIAYA' => $data['biaya_pelatihan'],
                'MANFAAT_BAGI_KARYAWAN' => $data['manfaat_karyawan'],
                'MANFAAT_BAGI_PERUSAHAAN' => $data['manfaat_perusahaan'],
                'TRAINING_ATMP_CODE' => $data['atmp_code'],
                'TRAINING_ATMP_DESC' => $data['atmp_desc'],
            ]);
    }

    public function getAll()
    {
        return DB::table('pocket_moving_tbl_t_pelatihan')->get();
    }

    public function getAllWithUsername()
    {
        $data = DB::table('pocket_moving_tbl_t_pelatihan')
            ->join('users', 'pocket_moving_tbl_t_pelatihan.NRP', '=', 'users.nrp')
            ->select('pocket_moving_tbl_t_pelatihan.*', 'users.name as username', 'users.departemen as departemen', 'users.perusahaan as perusahaan') // Sesuaikan alias dengan nama yang Anda inginkan
            ->get();

        return $data;
    }

    public function getAllWithDate()
    {
        return DB::table('pocket_moving_tbl_t_pelatihan')
            ->join('users', 'pocket_moving_tbl_t_pelatihan.NRP', '=', 'users.nrp')
            ->select(
                'pocket_moving_tbl_t_pelatihan.*',
                'users.name as username',
                'users.departemen as departemen',
                'users.perusahaan as perusahaan'
            )
            ->orderBy('pocket_moving_tbl_t_pelatihan.MULAI_TRAINING', 'desc');
    }

    public function getAllWithUsernameAndDateRange($start_date, $end_date)
    {
        $query = DB::table('pocket_moving_tbl_t_pelatihan')
            ->join('users', 'pocket_moving_tbl_t_pelatihan.NRP', '=', 'users.nrp')
            ->select('pocket_moving_tbl_t_pelatihan.*', 'users.name as username', 'users.departemen as departemen', 'users.perusahaan as perusahaan')
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                // Ubah format input tanggal ke format yang diharapkan oleh database
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));

                return $query->whereBetween('pocket_moving_tbl_t_pelatihan.MULAI_TRAINING', [$start_date, $end_date]);
            })
            ->get();

        return $query;
    }

    public function send($userId, $userRole, $sendName, $selectedPelatihanId)
    {

        $pelatihan = DB::table('pocket_moving_tbl_t_pelatihan')->where('PID', $selectedPelatihanId)->first();
        if (!$pelatihan) {
            return "Pelatihan not found";
        }

        // $kodeStatus = 1; // Default value
        $currentKodeStatus = $pelatihan->STATUS;
        $newKodeStatus = $currentKodeStatus + 1;

        if ($newKodeStatus == 2) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    'STATUS' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 3) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    'APPRV_ATASAN' => 1,
                    'UPDATE_AT_ATASAN' => now(),
                    'STATUS' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 4) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    'APPRV_HR' => 1,
                    'UPDATE_AT_HR' => now(),
                    'STATUS' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 5) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    'APPRV_HR_MNG' => 1,
                    'UPDATE_AT_HR_MNG' => now(),
                    'STATUS' => $newKodeStatus
                ]);
        } else if ($newKodeStatus == 6) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    'APPRV_DRC' => 1,
                    'UPDATE_AT_DRC' => now(),
                    'STATUS' => $newKodeStatus,
                    'IS_PLAN_ATMP' => 'Yes',
                    'TRAINING_DONE' => 'Yes',
                ]);
        }

        return "Status updated successfully";
    }

    // public function revisi($revisiName,$userRole, $selectedPelatihanId, $pesanRevisi, $userId)
    // {
    //     DB::table('pocket_moving_tbl_t_pelatihan')
    //         ->where('id', $selectedPelatihanId)
    //         ->update([
    //             'revisi_by' => $userId,
    //             'revisi_name' => $revisiName,
    //             'kode_status' => 9,
    //             'revisi_desc' => $pesanRevisi
    //         ]);

    //     return 'Data Pelatihan berhasil di "Revisi"';
    // }

    public function revisi($revisiName, $userRole, $selectedPelatihanId, $pesanRevisi, $userId)
    {
        $kodeStatus = 8; // Default value

        // $ket_atasan = null;
        $ket_hr = null;
        $ket_hr_mng = null;
        $ket_drc = null;

        //status approve
        // $approve_atasan = null;
        // $approve_hr = null;
        // $approve_hr_mng = null;
        // $approve_drc = null;

        // update at
        $upd_atasan = null;
        $upd_hr = null;
        $upd_hr_mng = null;
        $upd_drc = null;

        switch ($userRole) {
            case 2:
                $kodeStatus = 8;
                // $ket_atasan = $pesanRevisi;
                // $approve_atasan = 0;
                $upd_atasan = now();
                break;
            case 3:
                $kodeStatus = 9;
                $ket_hr =  $pesanRevisi;
                // $approve_hr = 0;
                $upd_hr = now();
                break;
            case 4:
                $kodeStatus = 10;
                $ket_hr_mng = $pesanRevisi;
                // $approve_hr_mng = 0;
                $upd_hr_mng = now();
                break;
            case 5:
                $kodeStatus = 11;
                $ket_drc = $pesanRevisi;
                // $approve_drc = 0;
                $upd_drc = now();
                break;
            default:
                $kodeStatus = 8;
                $newKodeStatus = $kodeStatus + 1;
                if ($kodeStatus == 8) {
                    // $ket_atasan = $pesanRevisi;
                    // $approve_atasan = 0;
                    $upd_atasan = now();
                } else if ($kodeStatus == 9) {
                    $ket_hr =  $pesanRevisi;
                    // $approve_hr = 0;
                    $upd_hr = now();
                } else if ($kodeStatus == 10) {
                    $ket_hr_mng = $pesanRevisi;
                    // $approve_hr_mng = 0;
                    $upd_hr_mng = now();
                } else if ($kodeStatus == 11) {
                    $ket_drc = $pesanRevisi;
                    // $approve_drc = 0;
                    $upd_drc = now();
                } else {
                    // $ket_atasan = $pesanRevisi;
                    // $approve_atasan = 0;
                    $upd_atasan = now();
                }
                break;
        }

        if ($kodeStatus == 8) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    // 'APPRV_ATASAN' => $approve_atasan,
                    'STATUS' => $kodeStatus,
                    'UPDATE_AT_ATASAN' => $upd_atasan,
                    // 'KETERANGAN_ATASAN' => $ket_atasan
                ]);
        } else if ($kodeStatus == 9) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    // 'APPRV_HR' => $approve_hr,
                    'KETERANGAN_HR' => $ket_hr,
                    'UPDATE_AT_HR' => $upd_hr,
                    'STATUS' => $kodeStatus
                ]);
        } else if ($newKodeStatus == 10) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    // 'APPRV_HR_MNG' => $approve_hr_mng,
                    'KETERANGAN_HR_MNG' => $ket_hr_mng,
                    'UPDATE_AT_HR_MNG' => $upd_hr_mng,
                    'STATUS' => $kodeStatus
                ]);
        } else if ($kodeStatus == 11) {
            DB::table('pocket_moving_tbl_t_pelatihan')
                ->where('PID', $selectedPelatihanId)
                ->update([
                    // 'APPRV_DRC' => $approve_drc,
                    'KETERANGAN_DRC' => $ket_drc,
                    'UPDATE_AT_DRC' => $upd_drc,
                    'STATUS' => 11,
                ]);
        }


        return 'Data Pelatihan berhasil di "Revisi"';
    }


    public function reject($rejectName, $selectedPelatihanId, $pesanReject, $userId, $userRole)
    {


        switch ($userRole) {
            case 2:
                DB::table('pocket_moving_tbl_t_pelatihan')
                    ->where('PID', $selectedPelatihanId)
                    ->update([
                        'APPRV_ATASAN' => 0,
                        'STATUS' => 7,
                        // 'KETERANGAN_ATASAN' => $pesanReject,
                    ]);
                break;
            case 3:
                DB::table('pocket_moving_tbl_t_pelatihan')
                    ->where('PID', $selectedPelatihanId)
                    ->update([
                        'APPRV_HR' => 0,
                        'STATUS' => 7,
                        'KETERANGAN_HR' => $pesanReject,
                    ]);
                break;
            case 4:
                DB::table('pocket_moving_tbl_t_pelatihan')
                    ->where('PID', $selectedPelatihanId)
                    ->update([
                        'APPRV_HR_MNG' => 0,
                        'STATUS' => 7,
                        'KETERANGAN_HR_MNG' => $pesanReject,
                    ]);
                break;
            case 5:
                DB::table('pocket_moving_tbl_t_pelatihan')
                    ->where('PID', $selectedPelatihanId)
                    ->update([
                        'APPRV_DRC' => 0,
                        'STATUS' => 7,
                        'KETERANGAN_DRC' => $pesanReject,
                    ]);
                break;
            default:
                DB::table('pocket_moving_tbl_t_pelatihan')
                    ->where('PID', $selectedPelatihanId)
                    ->update([
                        'APPRV_ATASAN' => 0,
                        'STATUS' => 7,
                        // 'KETERANGAN_ATASAN' => $pesanReject,
                    ]);
                break;
        }




        return 'Data Pelatihan Berhasil di "Reject"';
    }

    public function delete($selectedPelatihanId)
    {
        try {
            DB::table('pocket_moving_tbl_t_pelatihan')->where('PID', $selectedPelatihanId)->delete();
            return 'Data Pelatihan Berhasil dihapus.';
        } catch (\Exception $e) {
            return 'Gagal menghapus data pelatihan: ' . $e->getMessage();
        }
    }
}

