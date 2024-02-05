<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MonthlyChart $chart, Request $request)
    {
        $date = new Carbon(now());
        $year = $date->format('Y');
        $monthPresent = $date->format('m');
        $month = null;
        // $thisDay = new Carbon(now()); // filter tgl sekarang
        // $thisDay = $thisDay->format('Y-m-d');
        // dd($thisDay);

        $KaryawanTrain = DB::table('pocket_moving_tbl_t_pelatihan')->select([DB::raw("SUM(CAST(BIAYA as DECIMAL(9,0))) total"),])->where('STATUS', 6)->whereYear('MULAI_TRAINING', $year)->get();
        $JumlahKaryawan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereYear('MULAI_TRAINING', $year)->count();
        $totalPelatihan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereYear('MULAI_TRAINING', $year)->distinct()->count('NAMA');

        $presentageBiaya = $this->PresentageBiaya($monthPresent, $year);
        $presentagePelatihan = $this->PresentagePelatihan($monthPresent, $year);
        $PresentageTraining = $this->PresentageTraining($monthPresent, $year);

        $aprvAtasan = DB::table('pocket_moving_tbl_t_pelatihan')->where('APPRV_ATASAN', 1)->whereYear('MULAI_TRAINING',$year)->count();
        $aprvHRD = DB::table('pocket_moving_tbl_t_pelatihan')->where('APPRV_HR', 1)->whereYear('MULAI_TRAINING',$year)->count();
        $aprvManager = DB::table('pocket_moving_tbl_t_pelatihan')->where('APPRV_HR_MNG', 1)->whereYear('MULAI_TRAINING',$year)->count();
        $aprvDireksi = DB::table('pocket_moving_tbl_t_pelatihan')->where('APPRV_DRC', 1)->whereYear('MULAI_TRAINING',$year)->count();

        if ($request->input('month')) {
            // dd($request);
            $month = $request->input('month');
            $KaryawanTrain = DB::table('pocket_moving_tbl_t_pelatihan')->select([DB::raw("SUM(CAST(BIAYA as DECIMAL(9,0))) total"),])->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->get();
            $JumlahKaryawan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->count();
            $totalPelatihan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->distinct()->count('NAMA');

            $presentageBiaya = $this->PresentageBiaya($month, $year);
            $presentagePelatihan = $this->PresentagePelatihan($month, $year);
            $PresentageTraining = $this->PresentageTraining($month, $year);

            
            $aprvAtasan = DB::table('pocket_moving_tbl_t_pelatihan')->whereMonth('MULAI_TRAINING', $month)->where('APPRV_ATASAN', 1)->whereYear('MULAI_TRAINING',$year)->count();
            $aprvHRD = DB::table('pocket_moving_tbl_t_pelatihan')->whereMonth('MULAI_TRAINING', $month)->where('APPRV_HR', 1)->whereYear('MULAI_TRAINING',$year)->count();
            $aprvManager = DB::table('pocket_moving_tbl_t_pelatihan')->whereMonth('MULAI_TRAINING', $month)->where('APPRV_HR_MNG', 1)->whereYear('MULAI_TRAINING',$year)->count();
            $aprvDireksi = DB::table('pocket_moving_tbl_t_pelatihan')->whereMonth('MULAI_TRAINING', $month)->where('APPRV_DRC', 1)->whereYear('MULAI_TRAINING',$year)->count();
        }

        return view('/dashboard/dashboard', [
            'JumlahKaryawan' => $JumlahKaryawan,
            'TotalBiaya' => $KaryawanTrain,
            "TotalPelatihan" => $totalPelatihan,
            'chart' => $chart->build($month, $year),
            'chartLine' => $chart->buildLine($month, $year),
            'chartBar' => $chart->buildBar($month, $year),
            'admpChartDonat' => $chart->buildAdmp($month, $year),
            'coachingChartDonat' => $chart->buildCoaching($month, $year),
            'presenBiaya' => $presentageBiaya,
            'presenPelatihan' => $presentagePelatihan,
            'PresentageTraining' => $PresentageTraining,
            'aprvAtasan' => $aprvAtasan, 
            'aprvHRD' => $aprvHRD, 
            'aprvManager' => $aprvManager, 
            'aprvDireksi' => $aprvDireksi, 
        ]);
    }

    function PresentageBiaya($month, $year)
    {
        $previouseDate = now()->subDays(30);
        $biayaSekarang = DB::table('pocket_moving_tbl_t_pelatihan')->select([DB::raw("SUM(CAST(BIAYA as DECIMAL(9,0))) total"),])->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->pluck('total');
        $biayaSebelumnya = DB::table('pocket_moving_tbl_t_pelatihan')->select([DB::raw("SUM(CAST(BIAYA as DECIMAL(9,0))) total"),])->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $previouseDate->format('m'))->whereYear('MULAI_TRAINING', $previouseDate->format('Y'))->pluck('total');

        // $biayaSebelumnya =3000;
        if ($biayaSebelumnya[0] == null) {
            $difference =  $biayaSekarang[0] > 0 ? '100' : '0';
        } else {
            $difference = (($biayaSekarang[0] - $biayaSebelumnya[0]) / $biayaSebelumnya[0]) * 100;
        }

        return $difference;
    }


    function PresentagePelatihan($month, $year)
    {
        $previouseDate = now()->subDays(30);
        $totalPelatihan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->distinct()->count('NAMA');
        $pelaatihanSebelumnya = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $previouseDate->format('m'))->whereYear('MULAI_TRAINING', $previouseDate->format('Y'))->distinct()->count('NAMA');

        // $totalPelatihan = 15;
        // $pelaatihanSebelumnya = 10;
        if ($pelaatihanSebelumnya == null) {
            $difference =  $totalPelatihan > 0 ? '100' : '0';
        } else {
            $difference = (($totalPelatihan - $pelaatihanSebelumnya) / $pelaatihanSebelumnya) * 100;
        }

        return $difference;
    }


    function PresentageTraining($month, $year)
    {
        $previouseDate = now()->subDays(30);
        $totalPelatihan = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $month)->whereYear('MULAI_TRAINING', $year)->count();
        $pelaatihanSebelumnya = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereMonth('MULAI_TRAINING', $previouseDate->format('m'))->whereYear('MULAI_TRAINING', $previouseDate->format('Y'))->count();

        // $totalPelatihan = 5;
        // $pelaatihanSebelumnya = 10;
        if ($pelaatihanSebelumnya == null) {
            $difference =  $totalPelatihan > 0 ? '100' : '0';
        } else {
            $difference = (($totalPelatihan - $pelaatihanSebelumnya) / $pelaatihanSebelumnya) * 100;
        }

        return $difference;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
