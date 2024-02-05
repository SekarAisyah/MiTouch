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

    // public function report(Request $request)
    // {

    //     $startDate = $request->input('start_date');
    //     $endDate = $request->input('end_date');
    //     $pelatihanData = $this->pelatihanRepository->getAllWithUsername();

    //     return view('/report/report_pelatihan', [
    //         'pelatihanData' => $pelatihanData,
    //     ]);
    // }

    public function report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Gunakan filter waktu jika ada
        $query = $this->pelatihanRepository->getAllWithDate();
        if ($startDate && $endDate) {
            $query->whereBetween('m_pelatihan.waktu', [$startDate, $endDate]);
        }

        $pelatihanData = $query->get();

        return view('/report/report_pelatihan', [
            'pelatihanData' => $pelatihanData,
            'startDate' => $startDate,  // Pass start_date to the view
            'endDate' => $endDate,      // Pass end_date to the view
        ]);
    }

    // public function report(Request $request)
    // {
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     $pelatihanData = $this->pelatihanRepository->getAllWithUsernameAndDateRange($start_date, $end_date);

    //     return view('/report/report_pelatihan', [
    //         'pelatihanData' => $pelatihanData,
    //     ]);
    // }

    //     public function report(Request $request)
    // {
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     // Validasi format tanggal jika diperlukan
    //     $validator = Validator::make($request->all(), [
    //         'start_date' => 'date_format:Y-m-d',
    //         'end_date' => 'date_format:Y-m-d',
    //     ]);

    //     // Periksa apakah validasi berhasil
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $pelatihanData = $this->pelatihanRepository->getAllWithUsernameAndDateRange($start_date, $end_date);

    //     return view('/report/report_pelatihan', [
    //         'pelatihanData' => $pelatihanData,
    //         'start_date' => $start_date, // Pass the start_date to the view
    //         'end_date' => $end_date,     // Pass the end_date to the view
    //     ]);
    // }

    // public function reportsearch(Request $request)
    //     {
    //         $startDate = $request->input('start_date');
    //         $endDate = $request->input('end_date');

    //         $query = DB::table('m_pelatihan');

    //         if ($startDate && $endDate) {
    //             $query->whereBetween('waktu', [$startDate, $endDate]);
    //         }

    //         $result = $query->get();

    //         return response()->json($result);
    //     }

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
        $sendName = auth()->user()->username;
        $selectedPelatihanId = $request->input('pelatihan_id');
        //dd($selectedPelatihanId);
        $result = $this->pelatihanRepository->send($userId, $userRole, $sendName, $selectedPelatihanId);

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

        $phpWord->setValue('tgl_1', date('d-m-Y', strtotime($data->UPDATE_AT_ATASAN))); // belum ada create_at
        $phpWord->setValue('tgl_2', date('d-m-Y', strtotime($data->UPDATE_AT_ATASAN)));
        $phpWord->setValue('tgl_3', date('d-m-Y', strtotime($data->UPDATE_AT_HR)));
        $phpWord->setValue('tgl_4', date('d-m-Y', strtotime($data->UPDATE_AT_HR_MNG)));
        $phpWord->setValue('tgl_5', date('d-m-Y', strtotime($data->UPDATE_AT_DRC)));

        $outputDirectory = storage_path('app/public/exports/');
        $filename = "Form Permohonan Training PT Mitrabara Adiperdana Tbk.docx";
        $outputPath = $outputDirectory . $filename;


        $phpWord->saveAs($outputPath);

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }

    // public function exportToWord($id)
    // {
    //     // Load the Word template
    //     $templatePath = base_path('resources/views/pelatihan/MTBU.docx');
    //    $phpWord = new TemplateProcessor($templatePath);


    //     // Get data from the repository
    //     $data = $this->pelatihanRepository->getById($id);

    //     // Replace placeholders in the Word template with actual data
    //     $phpWord->setValue('name', $data->nama);

    //     // Save the Word document to a temporary file
    //     $tempWordFile = tempnam(sys_get_temp_dir(), 'export');
    //     $phpWord->save($tempWordFile);

    //     // Convert Word to PDF using PhpSpreadsheet
    //     $spreadsheet = IOFactory::load($tempWordFile);
    //     $pdfWriter = IOFactory::createWriter($spreadsheet, 'Tcpdf');
    //     $pdfPath = storage_path('app/public/exports/Pelatihan.pdf');
    //     $pdfWriter->save($pdfPath);

    //     // Optionally, delete temporary files after conversion
    //     unlink($tempWordFile);

    //     // Return the PDF as response
    //     return response()->download($pdfPath)->deleteFileAfterSend(true);
    // }

    // public function exportToWord($id)
    // {
    //     // Load the Word template
    //     $templatePath = base_path('resources/views/pelatihan/pelatihan.docx');
    //     $phpWord = new TemplateProcessor($templatePath);

    //     // Get data from the repository
    //     $data = $this->pelatihanRepository->getById($id);

    //     // Replace placeholders in the Word template with actual data
    //     $phpWord->setValue('name', $data->nama);

    //     // Save the Word document to a temporary file
    //     $tempWordFile = tempnam(sys_get_temp_dir(), 'export');
    //     $phpWord->saveAs($tempWordFile);

    //     // Convert Word to PDF using mPDF
    //     $wordContent = file_get_contents($tempWordFile);
    //     $phpWord = IOFactory::load($tempWordFile);
    //     $mpdf = new 'Mpdf';
    //     $mpdf->WriteHTML($wordContent);
    //     $pdfPath = storage_path('app/public/exports/Pelatihan.pdf');
    //     $mpdf->Output($pdfPath, 'F');

    //     // Optionally, delete temporary files after conversion
    //     unlink($tempWordFile);

    //     // Return the PDF as response
    //     return response()->download($pdfPath)->deleteFileAfterSend(true);
    // }
}
