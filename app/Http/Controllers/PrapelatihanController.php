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


    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'ringkasan_pelatihan' => 'required|string',
            'efektivitas_pelatihan' => 'required|string',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        if ($file->isValid()) {
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $path = 'files/' . $fileName;
            $file->move(public_path('files'), $fileName);

            if (!file_exists(public_path('files/' . $fileName))) {
                return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan file.']);
            }

            $data = $validatedData;

            $data['file_path'] = $path;
            $data['nrp'] = $request->input('nrp-dropdown');
            $result = $this->PrapelatihanRepository->create($data);
            if ($result) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'error']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'File tidak valid.']);
        }
    }


    public function edit($id, Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('file_edit')) {
            $file = $request->file('file_edit');
    
            if ($file->isValid()) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $path = 'files/' . $fileName;
                $file->move(public_path('files'), $fileName);
                if (!file_exists(public_path('files/' . $fileName))) {
                    return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan file.']);
                }
    
                $data['file_path'] = $path;
            } else {
                return response()->json(['status' => 'error', 'message' => 'File tidak valid.']);
            }
        }
        
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
