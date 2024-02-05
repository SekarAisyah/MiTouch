<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\PraadmpRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpParser\Node\Stmt\Return_;

class PraadmpController extends Controller
{

    protected $PraadmpRepository;

    public function __construct(PraadmpRepository $PraadmpRepository)
    {
        $this->PraadmpRepository = $PraadmpRepository;
    }

    public function index()
    {
        $praadmpData = $this->PraadmpRepository->getAllWithUsername();
        $nrpOptions = User::select('nrp')->distinct()->get();

        return view('/admp/praadmp', [
            'praadmpData' => $praadmpData,
            'nrpOptions' => $nrpOptions,
        ]);
    }

    // public function create(Request $request)
    // {
        
    //     // $this->validate($request, [
    //     //         'ringkasan' => 'required|string',   
    //     //     ]);
         
    //     $data = $request->all();

    //     $result = $this->PraadmpRepository->create($data);
        
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
//     $result = $this->PraadmpRepository->create($data);

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
            'ringkasan_admp' => 'required|string',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Proses upload file
        $file = $request->file('file');
        $path = $file->store('public');
        $data = $validatedData;

        $data['file_path'] = $path;
        $data['nrp'] = $request->input('nrp-dropdown');
        $result = $this->PraadmpRepository->create($data);
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
    $result = $this->PraadmpRepository->edit($data, $id, $userRole);

    if ($result) {
        return response()->json(['status' => 'success']);
    } else {
        return response()->json(['status' => 'error']);
    }
    }


    public function delete(Request $request)
    {

        $selectedpraadmpId = $request->input('praadmp_id');
    
        $result = $this->PraadmpRepository->delete($selectedpraadmpId);

        return response()->json(['message' => $result]);
    }



    public function getEdit($id)
    {
        $praadmp = $this->PraadmpRepository->getById($id);

        return response()->json($praadmp);
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

    public function exportPDF() {
        return view('admp/admp_pdf');
    }

    public function exportToWord(Request $request)
    {
        $id= $request->input('admp_id');

        $templatePath = 'resources/views/admp/admpMitraBara.docx';
        $phpWord = new TemplateProcessor($templatePath);
        //dd($templatePath);
        $data = $this->PraadmpRepository->getById($id);
        $phpWord->setValue('name', $data->name);

        $filename = "admp.docx";
        $phpWord->saveAs($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
