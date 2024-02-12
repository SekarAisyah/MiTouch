<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\pelatihanRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpParser\Node\Stmt\Return_;
use Barryvdh\DomPDF\Facade as PDFFacade;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PhpOffice\PhpWord\Writer\PDF as WriterPDF;
use PhpOffice\PhpWord\Writer\PDF\DomPDF;
use PhpOffice\PhpWord\IOFactory;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpWord\Writer\PDF\MPDF as PDFMPDF;

class PelatihanController extends Controller
{

    protected $pelatihanRepository;

    public function __construct(PelatihanRepository $pelatihanRepository)
    {
        $this->pelatihanRepository = $pelatihanRepository;
    }

    public function index()
    {

        $pelatihanData = $this->pelatihanRepository->getAllWithUsername();
        $nrpOptions = User::select('nrp')->distinct()->get();

        return view('/pelatihan/pelatihan', [
            'pelatihanData' => $pelatihanData,
            'nrpOptions' => $nrpOptions,
        ]);
    }

    public function report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $query = $this->pelatihanRepository->getAllWithDate();
        if ($startDate && $endDate) {
            $query->whereBetween('pocket_moving_tbl_t_pelatihan.BERANGKAT_TRAINING', [$startDate, $endDate]);
        }

        $pelatihanData = $query->get();

        return view('/report/report_pelatihan', [
            'pelatihanData' => $pelatihanData,
            'startDate' => $startDate,  
            'endDate' => $endDate,   
        ]);
    }

    public function create(Request $request)

    {
        // $this->validate($request, [
        //         'nama_pelatihan_add' => 'required|string',   
        //     ]);
        $userRole = auth()->user()->id_role;
        $data = $request->except('_token');
        //$data = $request->all();
        // dd($data);
        // dump($data);
        // Log::info($data);

        $result = $this->pelatihanRepository->create($data, $userRole);

        if ($result) {
            return Response::json(['status' => 'success']);
        } else {
            return Response::json(['status' => 'error']);
        }
    }

    public function edit($id, Request $request)
    {
        $data = $request->all();
        $data = $request->except('STATUS'); // baru
        $userRole = auth()->user()->id_role;
        $result = $this->pelatihanRepository->edit($data, $id, $userRole);

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
        $selectedpelatihanId = $request->input('pelatihan_id');
        //dd($selectedpelatihanId);
        $result = $this->pelatihanRepository->send($userId, $userRole, $keterangan, $selectedpelatihanId);
    
        return response()->json(['message' => $result]);
    }

    public function delete(Request $request)
    {

        $selectedPelatihanId = $request->input('pelatihan_id');

        $result = $this->pelatihanRepository->delete($selectedPelatihanId);

        return response()->json(['message' => $result]);
    }

    public function reject(Request $request)
    {
        $userId = auth()->user()->id;
        $userRole = auth()->user()->id_role;
        $rejectName = auth()->user()->username;
        $selectedPelatihanId = $request->input('pelatihan_id');
        $pesanReject = $request->input('reject');

        $result = $this->pelatihanRepository->reject($rejectName, $selectedPelatihanId, $pesanReject, $userId, $userRole);

        return response()->json(['message' => $result]);
    }


    public function revisi(Request $request)
    {

        $userId = auth()->user()->id;
        $userRole = auth()->user()->id_role;
        $revisiName = auth()->user()->username;
        $selectedPelatihanId = $request->input('pelatihan_id');
        $pesanRevisi = $request->input('revisi');

        $result = $this->pelatihanRepository->revisi($revisiName, $userRole, $selectedPelatihanId, $pesanRevisi, $userId);

        return response()->json(['message' => $result]);
    }

    public function getEdit($id)
    {
        $pelatihan = $this->pelatihanRepository->getById($id);

        return response()->json($pelatihan);
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
        return view('pelatihan/pelatihan_pdf');
    }

    public function exportToWord($id)
    {
        $templatePath = base_path('resources/views/pelatihan/Form Permohonan Training PT Mitrabara Adiperdana Tbk.docx');
        
        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Template file not found.']);
        }

        $phpWord = new TemplateProcessor($templatePath);

        $data = $this->pelatihanRepository->getById($id);

        $phpWord->setValue('nrp', $data->NRP);
        $phpWord->setValue('nama', $data->name);
        $phpWord->setValue('jabatan', $data->jabatan);
        $phpWord->setValue('departemen', $data->departemen);
        // $phpWord->setValue('nohp', $data->phone_number);
        // $phpWord->setValue('alamat', $data->alamat);

        // Baru
        $phpWord->setValue('nama_pelatihan', $data->NAMA);
        $phpWord->setValue('waktu_mulai', $data->MULAI_TRAINING);
        $phpWord->setValue('tempat', $data->AREA);
        $phpWord->setValue('biaya', $data->BIAYA);
        $phpWord->setValue('alasan', $data->MANFAAT_BAGI_KARYAWAN); // alasan- masih pakai mantaaf bagi karyawan (tdak ada alasan column)
        // end

        $phpWord->setValue('tgl_1', date('d-m-Y', strtotime($data->CREATE_AT))); 
        $phpWord->setValue('tgl_2', date('d-m-Y', strtotime($data->UPDATE_AT_ATASAN)));
        $phpWord->setValue('tgl_3', date('d-m-Y', strtotime($data->UPDATE_AT_HR)));
        $phpWord->setValue('tgl_4', date('d-m-Y', strtotime($data->UPDATE_AT_HR_MNG)));
        $phpWord->setValue('tgl_5', date('d-m-Y', strtotime($data->UPDATE_AT_DRC)));

        $outputDirectory = storage_path('app/public/');
        $filename = "Form Permohonan Training PT Mitrabara Adiperdana Tbk.docx";
        $outputPath = $outputDirectory . $filename;
        $phpWord->saveAs($outputPath);

        if (file_exists($outputPath)) {
            return response()->download($outputPath)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'Failed to generate the document.']);
        }
    }

}
