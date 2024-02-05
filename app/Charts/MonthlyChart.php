<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;

class MonthlyChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    // Pelatihan Overal Chart
    public function build($month, $year): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $date = new Carbon(now());
        $yearData = $date->format('Y');
        $monthData = $date->format('m');
        if ($year != null) {
            $yearData = $year;
        }
        // $onProgres = [1, 2];
        $onProgres = [2, 3, 4, 5];
        $onRevisi = [8, 9, 10, 11];
        
        $pelatihanData = DB::table('pocket_moving_tbl_t_pelatihan')->whereYear('MULAI_TRAINING',$yearData)->get();
        if ($month != null) {
            $monthData = $month;
            $pelatihanData = DB::table('pocket_moving_tbl_t_pelatihan')->whereMonth('MULAI_TRAINING',$monthData)->whereYear('MULAI_TRAINING',$yearData)->get();
        }

        // $pelatihanData->whereIn('STATUS', 5)->count(),
        // $pelatihanData->whereIn('STATUS', 4)->count(),
        // $pelatihanData->whereIn('STATUS', 3)->count(),
        // $pelatihanData->whereIn('STATUS', $onProgres)->count(),

        $jml1 = $pelatihanData->where('STATUS', 6)->count();
        $jml2 = $pelatihanData->whereIn('STATUS', $onProgres)->count();
        $jml3 = $pelatihanData->whereIn('STATUS', $onRevisi)->count();
        $jml4 = $pelatihanData->where('STATUS', 7)->count();

        $data = [
            $jml1,
            $jml2,
            $jml3,
            $jml4,
        ];

        $label = [
            // 'Done : '.$jml1,
            // 'Waiting Approval : '.$jml2,
            // 'Need Revision : '.$jml3,
            // 'Reject : '.$jml4,
            'Done',
            'Waiting Approval',
            'Need Revision',
            'Reject'
        ];

        return $this->chart->donutChart()
            ->setWidth(350)
            ->setHeight(500)
            ->addData($data)
            ->setFontFamily("Poppins")
            ->setLabels($label);
    }

    // ADMP Overal Chart
    public function buildAdmp($month, $year): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $date = new Carbon(now());
        $yearData = $date->format('Y');
        $monthData = $date->format('m');
        if ($year != null) {
            $yearData = $year;
        }
        $onProgres = [2, 3, 4, 5];
        $onRevisi = [8, 9, 10, 11];
        
        $admpData = DB::table('pocket_moving_tbl_t_admp')->whereYear('ADMP_JA_START_DATE',$yearData)->get();
        if ($month != null) {
            $monthData = $month;
            $admpData = DB::table('pocket_moving_tbl_t_admp')->whereMonth('ADMP_JA_START_DATE',$monthData)->whereYear('ADMP_JA_START_DATE',$yearData)->get();
        }

        $data = [
            $admpData->where('status', 6)->count(),
            $admpData->whereIn('status', $onProgres)->count(),
            $admpData->whereIn('status', $onRevisi)->count(),
            $admpData->where('status', 7)->count(),
        ];

        $label = [
            'Done',
            'Waiting Approval',
            'Need Revision',
            'Reject'
        ];

        return $this->chart->donutChart()
            // ->setTitle('Tahun '. $year)
            // ->setSubtitle('Tahun '. $year)
            ->setWidth(350)
            ->setHeight(500)
            ->addData($data)
            ->setFontFamily("Poppins")
            ->setLabels($label);
    }

    // Coaching Overal Chart
    public function buildCoaching($month, $year): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $date = new Carbon(now());
        $yearData = $date->format('Y');
        $monthData = $date->format('m');
        if ($year != null) {
            $yearData = $year;
        }
        $onProgres = [2, 3, 4, 5];
        $onRevisi = [ 8, 9, 10, 11];
        
        $admpData = DB::table('pocket_moving_tbl_t_coaching')->whereYear('COACHING_DATE',$yearData)->get();
        if ($month != null) {
            $monthData = $month;
            $admpData = DB::table('pocket_moving_tbl_t_coaching')->whereMonth('COACHING_DATE',$monthData)->whereYear('COACHING_DATE',$yearData)->get();
        }

        $data = [
            $admpData->where('status', 6)->count(),
            $admpData->whereIn('status', $onProgres)->count(),
            $admpData->whereIn('status', $onRevisi)->count(),
            $admpData->where('status', 7)->count(),
        ];

        $label = [
            'Done',
            'Waiting Approval',
            'Need Revision',
            'Reject'
        ];

        return $this->chart->donutChart()
            // ->setTitle('Tahun '. $year)
            // ->setSubtitle('Tahun '. $year)
            ->setWidth(350)
            ->setHeight(500)
            ->addData($data)
            ->setFontFamily("Poppins")
            ->setLabels($label);
    }
    // Budget Training per month chart
    public function buildLine($month, $year): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $date = new Carbon(now());
        $yearData = $date->format('Y');
        $monthData = $date->format('m');
        if ($year != null) {
            $yearData = $year;
        }
        
        // $pelatihanData = DB::table('pocket_moving_tbl_t_pelatihan')->where('STATUS', 6)->whereYear('MULAI_TRAINING',$yearData);
        $data = [];
        $label = [];
        
        $pelatihanData = DB::table('pocket_moving_tbl_t_pelatihan')
        ->select(DB::raw('YEAR(MULAI_TRAINING) as year, MONTH(MULAI_TRAINING) as month, SUM(CAST(BIAYA AS decimal(10,2))) as total_biaya'))
        ->where('STATUS', 6)
        ->whereYear('MULAI_TRAINING', $yearData)
        ->groupBy(DB::raw('YEAR(MULAI_TRAINING), MONTH(MULAI_TRAINING)'))
        ->get();
        
        
        if ($month != null) {
            $monthData = $month;
            $pelatihanData = DB::table('pocket_moving_tbl_t_pelatihan')
            ->select(DB::raw('YEAR(MULAI_TRAINING) as year, MONTH(MULAI_TRAINING) as month, SUM(CAST(BIAYA AS decimal(10,2))) as total_biaya'))
            ->where('STATUS', 6)
            ->whereMonth('MULAI_TRAINING', $monthData)
            ->whereYear('MULAI_TRAINING', $yearData)
            ->groupBy(DB::raw('YEAR(MULAI_TRAINING), MONTH(MULAI_TRAINING)'))
            ->get();
        }

        foreach ($pelatihanData as $row) {
            $data[] = $row->total_biaya;
            $date = DateTime::createFromFormat('!m', $row->month);
            $label[] = $date->format('F');
        }

        return $this->chart->lineChart()
        ->setTitle('Pelatihan '. $year)
        // ->setSubtitle('Pelatihan'. $year)
        ->setWidth(570)
        ->setHeight(350)
        ->addData('Dolar', $data)
        ->setColors(['#1640D6'])
        ->setFontFamily("Poppins")
        ->setXAxis($label)
        ->setGrid('#3F51B5', 0.1);

    }

    // Jumlah Training per month chart
    public function buildBar($month, $year): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $date = new Carbon(now());
        $yearData = $date->format('Y');
        $monthData = $date->format('m');
        if ($year != null) {
            $yearData = $year;
        }
        $dataPelatihan = [];
        $dataAdmp = [];
        $dataCoaching = [];
        
        $label = [];
        
        
        $pelatihanData = DB::table('pocket_moving_tbl_t_pelatihan')
        ->where('STATUS', 6)
        ->whereYear('MULAI_TRAINING', $yearData)
        ->groupBy(DB::raw('MONTH(MULAI_TRAINING)'))
        ->select(DB::raw('COUNT(*) as total, MONTH(MULAI_TRAINING) as month'))
        ->get();
        
        $admpData = DB::table('pocket_moving_tbl_t_admp')
        ->where('STATUS', 6)
        ->whereYear('ADMP_JA_START_DATE', $yearData)
        ->groupBy(DB::raw('MONTH(ADMP_JA_START_DATE)'))
        ->select(DB::raw('COUNT(*) as total, MONTH(ADMP_JA_START_DATE) as month'))
        ->get();
        
        $coachingData = DB::table('pocket_moving_tbl_t_coaching')
        ->where('STATUS', 6)
        ->whereYear('COACHING_DATE', $yearData)
        ->groupBy(DB::raw('MONTH(COACHING_DATE)'))
        ->select(DB::raw('COUNT(*) as total, MONTH(COACHING_DATE) as month'))
        ->get();
        if ($month != null) {
            $monthData = $month;
            $pelatihanData = DB::table('pocket_moving_tbl_t_pelatihan')
            ->where('STATUS', 6)
            ->whereMonth('MULAI_TRAINING', $monthData)
            ->whereYear('MULAI_TRAINING', $yearData)
            ->groupBy(DB::raw('MONTH(MULAI_TRAINING)'))
            ->select(DB::raw('COUNT(*) as total, MONTH(MULAI_TRAINING) as month'))
            ->get();
            
            $admpData = DB::table('pocket_moving_tbl_t_admp')
            ->where('STATUS', 6)
            ->whereMonth('ADMP_JA_START_DATE', $monthData)
            ->whereYear('ADMP_JA_START_DATE', $yearData)
            ->groupBy(DB::raw('MONTH(ADMP_JA_START_DATE)'))
            ->select(DB::raw('COUNT(*) as total, MONTH(ADMP_JA_START_DATE) as month'))
            ->get();

            
            $coachingData = DB::table('pocket_moving_tbl_t_coaching')
            ->where('STATUS', 6)
            ->whereMonth('COACHING_DATE', $monthData)
            ->whereYear('COACHING_DATE', $yearData)
            ->groupBy(DB::raw('MONTH(COACHING_DATE)'))
            ->select(DB::raw('COUNT(*) as total, MONTH(COACHING_DATE) as month'))
            ->get();
        }

        foreach ($pelatihanData as $row) {
            // $label = [];
            $dataPelatihan[] = $row->total;
            $date = DateTime::createFromFormat('!m', $row->month);
            $label[] = $date->format('F');
        }
        
        foreach ($admpData as $row) {
            $dataAdmp[] = $row->total;
        }
        
        foreach ($coachingData as $row) {
            $dataCoaching[] = $row->total;
        }



        return $this->chart->barChart()
        ->setTitle('Karyawan '. $year)
        // ->setSubtitle('Wins during season 2021.')
        // ->setWidth(1200)
        // ->setHeight(350)
        ->setWidth(570)
        ->setHeight(350)
        ->addData('Karyawan Pelatihan', $dataPelatihan)
        ->addData('Karyawan ADMP', $dataAdmp)
        ->addData('Karyawan Coaching', $dataCoaching)
        // ->setColors(['#0079FF', '#00DFA2', '#FFB84C'])
        ->setFontFamily("Poppins") // custom font
        // ->addData('Boston', [7, 3, 8, 2, 6, 4])
        ->setXAxis($label)
        ->setGrid();

    }

}
