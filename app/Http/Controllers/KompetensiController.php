<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\KompetensiRepository;
use Illuminate\Http\Response;

class KompetensiController extends Controller
{
    protected $kompetensiRepository;

    public function __construct(KompetensiRepository $kompetensiRepository)
    {
        $this->kompetensiRepository = $kompetensiRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kompetensiData = $this->kompetensiRepository->getAllData();
        return view('/administration/kompetensi', [
            'kompetensiData' => $kompetensiData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->except('_token');
        // dump("here");
        $result = $this->kompetensiRepository->create($data);
        if ($result) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    function getEdit($id) {
        $data = $this->kompetensiRepository->getById($id);

        return response()->json($data);
    }

    function delete(Request $request) {

        $selectedKompetensiId = $request->input('kompetensi_id');
        $result = $this->kompetensiRepository->delete($selectedKompetensiId);
        return response()->json(['message' => $result]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $data = $request->all();

        $result = $this->kompetensiRepository->edit($data, $id);
        if ($result) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
