<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\AdmpRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpParser\Node\Stmt\Return_;

class AdmpController extends Controller
{

    protected $AdmpRepository;

    public function __construct(AdmpRepository $AdmpRepository)
    {
        $this->AdmpRepository = $AdmpRepository;
    }

    public function index()
    {
        $admpData = $this->AdmpRepository->getAllWithUsername();
        $nrpOptions = User::select('nrp')->distinct()->get();

        return view('/admp/admp', [
            'admpData' => $admpData,
            'nrpOptions' => $nrpOptions,
        ]);
    }

    public function report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Gunakan filter waktu jika ada
        $query = $this->AdmpRepository->getAllWithDate();
        if ($startDate && $endDate) {
            $query->whereBetween('pocket_moving_tbl_t_admp.ADMP_JA_START_DATE', [$startDate, $endDate]);
        }

        $admpData = $query->get();

        return view('/report/report_admp', [
            'admpData' => $admpData,
            'startDate' => $startDate,  
            'endDate' => $endDate,    
        ]);
    }

    public function create(Request $request)
    {
        // $this->validate($request, [
        //         'nama_admp_add' => 'required|string',   
        //     ]);

        $data = $request->all();

        $result = $this->AdmpRepository->create($data);

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
        $result = $this->AdmpRepository->edit($data, $id, $userRole);

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
        $keterangan = $request->input('send-link');
        $selectedadmpId = $request->input('admp_id');
        //dd($selectedadmpId);
        $result = $this->AdmpRepository->send($userId, $userRole, $keterangan, $selectedadmpId);
    
        return response()->json(['message' => $result]);
    }

    public function delete(Request $request)
    {

        $selectedadmpId = $request->input('admp_id');

        $result = $this->AdmpRepository->delete($selectedadmpId);

        return response()->json(['message' => $result]);
    }

    public function reject(Request $request)
    {
        $userId = auth()->user()->id;
        $userRole = auth()->user()->id_role;
        $rejectName = auth()->user()->username;
        $selectedadmpId = $request->input('admp_id');
        $pesanReject = $request->input('reject');

        $result = $this->AdmpRepository->reject($rejectName, $selectedadmpId, $pesanReject, $userId, $userRole);

        return response()->json(['message' => $result]);
    }


    public function revisi(Request $request)
    {

        $userId = auth()->user()->id;
        $userRole = auth()->user()->id_role;
        $revisiName = auth()->user()->username;
        $selectedadmpId = $request->input('admp_id');
        $pesanRevisi = $request->input('revisi');
        //dd($revisiName);
        $result = $this->AdmpRepository->revisi($revisiName, $selectedadmpId, $userRole, $pesanRevisi, $userId);

        return response()->json(['message' => $result]);
    }

    public function getEdit($id)
    {
        $admp = $this->AdmpRepository->getById($id);

        return response()->json($admp);
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

    public function exportPDF()
    {
        return view('admp/admp_pdf');
    }

    public function exportToWord($id)
    {
        $templatePath =  base_path('resources/views/admp/Form ADMP PT Mitrabara Adiperdana Tbk.docx');
        $phpWord = new TemplateProcessor($templatePath);
        $data = $this->AdmpRepository->getById($id);
        
        $phpWord->setValue('nrp', $data->NRP);
        $phpWord->setValue('nama', $data->name);
        $phpWord->setValue('jabatan', $data->jabatan);
        $phpWord->setValue('departemen', $data->departemen);
        // $phpWord->setValue('nohp', $data->phone_number);
        // $phpWord->setValue('alamat', $data->alamat);

        $phpWord->setValue('nama_admp', $data->NAMA);
        $phpWord->setValue('waktu_mulai', $data->ADMP_JA_START_DATE);
        $phpWord->setValue('waktu_selesai', $data->ADMP_JA_FINISH_DATE);

        $phpWord->setValue('deskripsi_target', $data->JA_TARGET_DESCRIPTION);
        $phpWord->setValue('deskripsi_hasil', $data->JA_RESULT_DESCRIPTION);
        $phpWord->setValue('deskripsi_short', $data->JA_SHORT_DESCRIPTION);

        $phpWord->setValue('tgl_1', date('d-m-Y', strtotime($data->CREATE_AT))); // belum ada create_at
        $phpWord->setValue('tgl_2', date('d-m-Y', strtotime($data->UPDATE_AT_ATASAN)));
        $phpWord->setValue('tgl_3', date('d-m-Y', strtotime($data->UPDATE_AT_HR)));
        $phpWord->setValue('tgl_4', date('d-m-Y', strtotime($data->UPDATE_AT_HR_MNG)));
        $phpWord->setValue('tgl_5', date('d-m-Y', strtotime($data->UPDATE_AT_DRC)));

        $outputDirectory = storage_path('app/public/');
        $filename = "Form ADMP PT Mitrabara Adiperdana Tbk.docx";
        $outputPath = $outputDirectory . $filename;

        $phpWord->saveAs($outputPath);
        return response()->download($outputPath)->deleteFileAfterSend(true);
    }



}
