<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\PascapelatihanRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpParser\Node\Stmt\Return_;

class PascapelatihanController extends Controller
{

    protected $PascapelatihanRepository;

    public function __construct(PascapelatihanRepository $PascapelatihanRepository)
    {
        $this->PascapelatihanRepository = $PascapelatihanRepository;
    }

    public function index()
    {
        $pascapelatihanData = $this->PascapelatihanRepository->getAllWithUsername();
        $nrpOptions = User::select('nrp')->distinct()->get();

        return view('/pelatihan/pascapelatihan', [
            'pascapelatihanData' => $pascapelatihanData,
            'nrpOptions' => $nrpOptions,
        ]);
    }


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
        $result = $this->PascapelatihanRepository->create($data);
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
            // $path = $file->store('storage');
            $fileName = $file->getClientOriginalName();
            $path = $request->file('file')->storeAs('public', $fileName);
            $data['file_path'] = $path;
        };
        $userRole = auth()->user()->id_role;
        $result = $this->PascapelatihanRepository->edit($data, $id, $userRole);

        if ($result) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }


    public function delete(Request $request)
    {

        $selectedpascaPelatihanId = $request->input('pascapelatihan_id');

        $result = $this->PascapelatihanRepository->delete($selectedpascaPelatihanId);

        return response()->json(['message' => $result]);
    }



    public function getEdit($id)
    {
        $pascapelatihan = $this->PascapelatihanRepository->getById($id);

        return response()->json($pascapelatihan);
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
        $data = $this->PascapelatihanRepository->getById($id);
        $phpWord->setValue('name', $data->name);

        $filename = "Pelatihan.docx";
        $phpWord->saveAs($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
