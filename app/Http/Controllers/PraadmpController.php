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

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'ringkasan_admp' => 'required|string',
            'efektivitas_admp' => 'required|string',
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
            $result = $this->PraadmpRepository->create($data);
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
