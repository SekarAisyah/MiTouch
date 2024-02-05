<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\PrapelatihanRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpParser\Node\Stmt\Return_;

class PrapelatihanController extends Controller
{

    protected $PrapelatihanRepository;

    public function __construct(PrapelatihanRepository $PrapelatihanRepository)
    {
        $this->PrapelatihanRepository = $PrapelatihanRepository;
    }

    public function index()
    {
        $prapelatihanData = $this->PrapelatihanRepository->getAllWithUsername();
        $nrpOptions = User::select('nrp')->distinct()->get();

        return view('/pelatihan/prapelatihan', [
            'prapelatihanData' => $prapelatihanData,
            'nrpOptions' => $nrpOptions,
        ]);
    }

    // public function create(Request $request)
    // {

    //     // $this->validate($request, [
    //     //         'ringkasan' => 'required|string',   
    //     //     ]);

    //     $data = $request->all();

    //     $result = $this->PrapelatihanRepository->create($data);

    //     if ($result) {
    //         return Response::json(['status' => 'success']);
    //     } else {
    //         return Response::json(['status' => 'error']);
    //     }
    // }

    //     public function create(Request $request)
    // {
    //     // Validasi input, termasuk file
    //     $request->validate([
    //         'ringkasan' => 'required|string',
    //         'file' => 'required|mimes:pdf,doc,docx|max:2048', // Sesuaikan dengan jenis dan batasan file yang diinginkan
    //     ]);

    //     // Proses upload file
    //     $file = $request->file('file');
    //     $path = $file->store('uploads');

    //     // Seluruh data dari permintaan
    //     $data = $request->all();

    //     // Tambahkan atau ganti nilai kolom file_path dengan path yang sudah diunggah
    //     $data['file_path'] = $path;

    //     // Memanggil repository untuk menyimpan data
    //     $result = $this->PrapelatihanRepository->create($data);

    //     // Memberikan respons berdasarkan hasil penyimpanan
    //     if ($result) {
    //         return response()->json(['status' => 'success']);
    //     } else {
    //         return response()->json(['status' => 'error']);
    //     }
    // }

    public function create(Request $request)
    {
        // Validasi input, termasuk file
        $validatedData = $request->validate([
            'ringkasan_pelatihan' => 'required|string',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Proses upload file
        $file = $request->file('file');
        $path = $file->store('public');
        $data = $validatedData;

        $data['file_path'] = $path;
        $data['nrp'] = $request->input('nrp-dropdown');
        $result = $this->PrapelatihanRepository->create($data);
        if ($result) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }



    public function edit($id, Request $request)
    {
        $data = $request->all();
        //dd($data);

        if ($request->hasFile('file_edit')) {
            $file = $request->file('file_edit');
            $path = $file->store('public');
            $data['file_path'] = $path;
        };
        $userRole = auth()->user()->id_role;
        $result = $this->PrapelatihanRepository->edit($data, $id, $userRole);

        if ($result) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }


    public function delete(Request $request)
    {

        $selectedpraPelatihanId = $request->input('prapelatihan_id');

        $result = $this->PrapelatihanRepository->delete($selectedpraPelatihanId);

        return response()->json(['message' => $result]);
    }



    public function getEdit($id)
    {
        $prapelatihan = $this->PrapelatihanRepository->getById($id);

        return response()->json($prapelatihan);
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

    public function exportToWord(Request $request)
    {
        $id = $request->input('pelatihan_id');

        $templatePath = 'resources/views/pelatihan/PelatihanMitraBara.docx';
        $phpWord = new TemplateProcessor($templatePath);
        //dd($templatePath);
        $data = $this->PrapelatihanRepository->getById($id);
        $phpWord->setValue('name', $data->name);

        $filename = "Pelatihan.docx";
        $phpWord->saveAs($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
