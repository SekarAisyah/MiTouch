<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\CoachingRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpParser\Node\Stmt\Return_;

class CoachingController extends Controller
{

    protected $CoachingRepository;

    public function __construct(CoachingRepository $CoachingRepository)
    {
        $this->CoachingRepository = $CoachingRepository;
    }

    public function index()
    {
        $coachingData = $this->CoachingRepository->getAllWithUsername();
        $nrpOptions = User::select('nrp')->distinct()->get();
        //baru
        $kompOptions = DB::table('pocket_moving_tbl_r_kompetensi')->select('KODE')->get();

        return view('/coaching/coaching', [
            'coachingData' => $coachingData,
            'nrpOptions' => $nrpOptions,
            'kompOptions' => $kompOptions, //baru
        ]);
    }

    public function report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');


        $query = $this->CoachingRepository->getAllWithDate();
        if ($startDate && $endDate) {
            $query->whereBetween('pocket_moving_tbl_t_coaching.COACHING_DATE', [$startDate, $endDate]);
        }

        $coachingData = $query->get();

        return view('/report/report_coaching', [
            'coachingData' => $coachingData,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }

    public function create(Request $request)
    {
        // $this->validate($request, [
        //         'nama_coaching_add' => 'required|string',   
        //     ]);

        $data = $request->all();

        $result = $this->CoachingRepository->create($data);

        if ($result) {
            return Response::json(['status' => 'success']);
        } else {
            return Response::json(['status' => 'error']);
        }
    }

    public function edit($id, Request $request)
    {
        $data = $request->all();
        $userRole = auth()->user()->id_role;
        $result = $this->CoachingRepository->edit($data, $id, $userRole);

        if ($result) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function send(Request $request)
    {
        $userId = auth()->user()->id;
        $userRole = auth()->user()->id_role;
        $sendName = auth()->user()->username;
        $keterangan = $request->input('send-link');
        $selectedcoachingId = $request->input('coaching_id');
        //dd($selectedcoachingId);
        $result = $this->CoachingRepository->send($userId, $userRole, $keterangan, $selectedcoachingId);

        return response()->json(['message' => $result]);
    }

    public function delete(Request $request)
    {

        $selectedcoachingId = $request->input('coaching_id');

        $result = $this->CoachingRepository->delete($selectedcoachingId);

        return response()->json(['message' => $result]);
    }

    public function reject(Request $request)
    {
        $userId = auth()->user()->id;
        $userRole = auth()->user()->id_role;
        $rejectName = auth()->user()->username;
        $selectedcoachingId = $request->input('coaching_id');
        $pesanReject = $request->input('reject');

        $result = $this->CoachingRepository->reject($rejectName, $selectedcoachingId, $pesanReject, $userId, $userRole);

        return response()->json(['message' => $result]);
    }


    public function revisi(Request $request)
    {

        $userId = auth()->user()->id;
        $userRole = auth()->user()->id_role;
        $revisiName = auth()->user()->username;
        $selectedCoachingId = $request->input('coaching_id');
        $pesanRevisi = $request->input('revisi');
        //dd($revisiName);
        $result = $this->CoachingRepository->revisi($revisiName, $selectedCoachingId, $userRole, $pesanRevisi, $userId);

        return response()->json(['message' => $result]);
    }

    public function getEdit($id)
    {
        $coaching = $this->CoachingRepository->getById($id);

        return response()->json($coaching);
    }

    public function getUser()
    {
        $nrpOptions = User::select('nrp')->distinct()->get();

        return response()->json(['nrpOptions' => $nrpOptions]);
    }

    public function getUserInfo(Request $request)
    {
        $nrp = $request->input('nrp');
        $user = User::where('nrp', $nrp)->first();

        return response()->json([
            'nama' => $user->name,
            'jabatan' => $user->jabatan,
            'departemen' => $user->departemen,
            'perusahaan' => $user->perusahaan,
        ]);
    }

    public function getKompetensiInfo(Request $request)
    {
        $kode = $request->input('kode');
        // $user = User::where('CODE', $kmp)->first();
        $data = DB::table('pocket_moving_tbl_r_kompetensi')->select('NAMA')
            ->where('pocket_moving_tbl_r_kompetensi.KODE', $kode)
            ->first();

        return response()->json([
            'NAMA' => $data->NAMA,
        ]);
    }

    public function exportPDF()
    {
        return view('coaching/coaching_pdf');
    }

    public function exportToWord($id)
    {
        $templatePath = base_path('resources/views/coaching/Form Coaching PT Mitrabara Adiperdana Tbk.docx');
        $phpWord = new TemplateProcessor($templatePath);

        $data = $this->CoachingRepository->getById($id);
        $phpWord->setValue('nrp', $data->NRP);
        $phpWord->setValue('nama', $data->name);
        $phpWord->setValue('jabatan', $data->jabatan);
        $phpWord->setValue('departemen', $data->departemen);
        // $phpWord->setValue('nohp', $data->phone_number);
        // $phpWord->setValue('alamat', $data->alamat);

        $phpWord->setValue('kompetensi', $data->KOMPETENSI_NAME);
        $phpWord->setValue('tgl_coaching', $data->COACHING_DATE);
        $phpWord->setValue('kode', $data->KOMPETENSI_CODE);


        $phpWord->setValue('tgl_1', date('d-m-Y', strtotime($data->UPDATE_AT_ATASAN))); // belum ada create_at
        $phpWord->setValue('tgl_2', date('d-m-Y', strtotime($data->UPDATE_AT_ATASAN)));
        $phpWord->setValue('tgl_3', date('d-m-Y', strtotime($data->UPDATE_AT_HR)));
        $phpWord->setValue('tgl_4', date('d-m-Y', strtotime($data->UPDATE_AT_HR_MNG)));
        $phpWord->setValue('tgl_5', date('d-m-Y', strtotime($data->UPDATE_AT_DRC)));

        $outputDirectory = storage_path('app/public/');
        $filename = "Form Coaching PT Mitrabara Adiperdana Tbk.docx";
        $outputPath = $outputDirectory . $filename;
        $phpWord->saveAs($outputPath);

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}
