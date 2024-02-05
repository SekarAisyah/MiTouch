@extends('include/mainlayout')
@section('title', 'Pelatihan')
@section('content')
    <div class="pagetitle">
        <h1>Pelatihan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Pelatihan</li>
            </ol>
        </nav>
    </div>

    @php
        $existingRecordId = null;
    @endphp
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i> Pelatihan</h5>
                        <button type="button" class="btn bi bi-plus btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#pelatihanModal"> Add Pelatihan</button>
                        <br><br>

                        <!-- Modal View -->
                        <div class="modal fade modal-view" id="viewPelatihanModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="btn-view">View Pelatihan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="pelatihan-details">
                                            <div class="detail">
                                                <label for="nrp">NRP :</label>
                                                <span id="nrp"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="name">Nama:</label>
                                                <span id="name"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="jabatan">Jabatan:</label>
                                                <span id="jabatan"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="departemen">Departemen:</label>
                                                <span id="departemen"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="perusahaan">Perusahaan:</label>
                                                <span id="perusahaan"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="nama_pelatihan">Nama Pelatihan:</label>
                                                <span id="nama_pelatihan"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="waktu_berangkat">Waktu Berangkat Pelatihan:</label>
                                                <span id="waktu_berangkat">d</span>
                                            </div>
                                            <div class="detail">
                                                <label for="waktu_mulai">Waktu Mulai Pelatihan:</label>
                                                <span id="waktu_mulai">d</span>
                                            </div>
                                            <div class="detail">
                                                <label for="waktu_selesai">Waktu Selesai Pelatihan:</label>
                                                <span id="waktu_selesai">d</span>
                                            </div>
                                            <div class="detail">
                                                <label for="waktu_kembali">Waktu Kembali Pelatihan:</label>
                                                <span id="waktu_kembali">d</span>
                                            </div>
                                            <div class="detail">
                                                <label for="keterangan">Keterangan:</label>
                                                <span id="keterangan" class="info-text"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="deskripsi_kompetensi">Deskripsi Kompetensi:</label>
                                                <span id="deskripsi_kompetensi"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="nama_penyelenggara">Nama Penyelenggara: </label>
                                                <span id="nama_penyelenggara"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="narasumber">Narasumber:</label>
                                                <span id="narasumber"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="area">Area:</label>
                                                <span id="area"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="is_jobsite">Is Jobsite:</label>
                                                <span id="is_jobsite"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="biaya">Biaya:</label>
                                                <span id="biaya"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="manfaat_karyawan">Manfaat Bagi Karyawan:</label>
                                                <span id="manfaat_karyawan"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="manfaat_perusahaan">Manfaat Bagi Perusahaan:</label>
                                                <span id="manfaat_perusahaan"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="atmp_code">Training ATMP Code:</label>
                                                <span id="atmp_code"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="atmp_desc">Training ATMP Deskripsi:</label>
                                                <span id="atmp_desc"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="is_plan_atmp">Apakah Planing Tercapai:</label>
                                                <span id="is_plan_atmp"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="train_done">Apakah Training Selesai:</label>
                                                <span id="train_done"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="approval_Atasan">Approve Superintendent PD:</label>
                                                <span id="approval_Atasan"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="approval_HR">Approve Manager:</label>
                                                <span id="approval_HR"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="approval_HR_MNG">Approve HR Manager:</label>
                                                <span id="approval_HR_MNG"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="approval_DRC">Approve Direksi:</label>
                                                <span id="approval_DRC"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="ket_HR">Keterangan Manager:</label>
                                                <span id="ket_HR"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="ket_HR_MNG">Keterangan HR Manager:</label>
                                                <span id="ket_HR_MNG"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="ket_DRC">Keterangan Direksi:</label>
                                                <span id="ket_DRC"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_Atasan">Update Superintendent PD:</label>
                                                <span id="upd_Atasan"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_HR">Update Manager:</label>
                                                <span id="upd_HR"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_HR_MNG">Update HR Manager:</label>
                                                <span id="upd_HR_MNG"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_DRC">Update Direksi:</label>
                                                <span id="upd_DRC"> </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal View -->

                        <!-- Modal Add -->
                        <div class="modal fade modal_add" id="pelatihanModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true" data-mode="add">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="btn-add">Add Pelatihan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> --}}
                                        <input type="hidden" name="id" id="id" />
                                        <input type="hidden" name="action_flag" id="action_flag" />
                                        <input type="hidden" name="tgl_mulai" id="tgl_mulai" />
                                        {{-- <input type="hidden" name="last_seq" id="last_seq" value="{{{$last_seq}}}" /> --}}

                                        <form class="row g-3 needs-validation" method="POST" action="/pelatihan/create">
                                            @csrf
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-control" id="nrp-dropdown" name="nrp-dropdown">
                                                        <option value="" selected>Select NRP</option>
                                                        @foreach ($nrpOptions as $nrp)
                                                            <option value="{{ $nrp->nrp }}"
                                                                id="nrp_id"{{ $existingRecordId == $nrp->nrp ? 'selected' : '' }}>
                                                                {{ $nrp->nrp }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="nrp">NRP <span style="color:red">*</span></label>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" disabled class="form-control" id="name-add"
                                                        name="name-add" placeholder="Name">
                                                    <label for="message-text">Nama </label>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" disabled class="form-control" id="jabatan-add"
                                                        name="jabatan-add" placeholder="Jabatan">
                                                    <label for="message-text">Jabatan </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" disabled class="form-control"
                                                        id="departemen-add" name="departemen-add" placeholder="Password">
                                                    <label for="message-text">Departemen </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" disabled class="form-control"
                                                        id="perusahaan-add" name="perusahaan-add" placeholder="Password">
                                                    <label for="message-text">Perusahaan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="nama_pelatihan_add"
                                                        name="nama_pelatihan_add" placeholder="nama_pelatihan_add">
                                                    <label for="nama_pelatihan_add"> Nama Pelatihan <span
                                                            style="color:red">*</span></label>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control"
                                                        id="waktu_berangkat_pelatihan" name="waktu_berangkat_pelatihan"
                                                        required>
                                                    <label for="waktu_berangkat_pelatihan">Waktu Berangkat Pelatihan<span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="waktu_mulai_pelatihan"
                                                        name="waktu_mulai_pelatihan" required>
                                                    <label for="waktu_mulai_pelatihan">Waktu Mulai Pelatihan<span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control"
                                                        id="waktu_selesai_pelatihan" name="waktu_selesai_pelatihan"
                                                        required>
                                                    <label for="waktu_selesai_pelatihan">Waktu Selesai Pelatihan<span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control"
                                                        id="waktu_kembali_pelatihan" name="waktu_kembali_pelatihan"
                                                        required>
                                                    <label for="waktu_kembali_pelatihan">Waktu Kembali Pelatihan<span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Address" id="keterangan" name="keterangan" style="height: 50px;"
                                                        required></textarea>
                                                    <label for="message-text">Keterangan <span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Address" id="kompetensi_desc" name="kompetensi_desc"
                                                        style="height: 80px;" required></textarea>
                                                    <label for="message-text">Deskripsi Kompetensi <span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control"
                                                        id="nama_penyelenggara_add" name="nama_penyelenggara_add"
                                                        placeholder="nama_penyelenggara_add">
                                                    <label for="nama_penyelenggara_add"> Nama Penyelenggara <span
                                                            style="color:red">*</span></label>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="narasumber"
                                                        name="narasumber" placeholder="Narasumber">
                                                    <label for="message-text">Narasumber</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="area"
                                                        name="area" placeholder="area">
                                                    <label for="message-text">Area</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-control" id="is_jobsite" name="is_jobsite">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                    <label for="is_jobsite">Is Jobsite<span
                                                            style="color:red">*</span></label>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-control" id="currency" name="currency">
                                                        <option value="$.">Dollar ($.)</option>
                                                        <option value="Rp.">Rupiah (Rp.)</option>
                                                    </select>
                                                    <label for="currency">Mata Uang<span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="biaya_pelatihan"
                                                        name="biaya_pelatihan" placeholder="Nama Pelatihan" required>
                                                    <label for="nama pelatihan">Biaya Pelatihan<span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Address" id="manfaat_karyawan" name="manfaat_karyawan"
                                                        style="height: 100px;"></textarea>
                                                    <label for="message-text">Manfaat Bagi Keryawan </span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Address" id="manfaat_perusahaan" name="manfaat_perusahaan"
                                                        style="height: 100px;"></textarea>
                                                    <label for="message-text">Manfaat Bagi Perusahaan </span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="atmp_code"
                                                        name="atmp_code" placeholder="atmp_code">
                                                    <label for="atmp_code"> Training ATMP Code <span
                                                            style="color:red">*</span></label>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Address" id="atmp_desc" name="atmp_desc" style="height: 50px;"
                                                        required></textarea>
                                                    <label for="message-text">Training ATMP Deskripsi <span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="btn-yes-add">Save</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Add --}}

                        <!--begin::Modal Revisi-->
                        <div class="modal fade modal_revisi" id="revisiModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Revisi Pelatihan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="kt-form kt-form--label-right form_revisi" action="/pelatihan/revisi"
                                            method="POST" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Pesan Revisi
                                                    Pelatihan <span style="color:red">*</span></label>
                                                <textarea class="form-control" id="revisi" name="revisi" rows="8"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="btn-yes-revisi">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Modal Revisi-->

                        <!--begin::Modal Reject-->
                        <div class="modal fade modal_reject" id="rejectModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Reject Pelatihan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="kt-form kt-form--label-right form_reject" action="/pelatihan/reject"
                                            method="POST" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Pesan Reject
                                                    Pelatihan <span style="color:red">*</span></label>
                                                <textarea class="form-control" id="reject" name="reject" rows="8"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="btn-yes-reject">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Modal Revisi-->

                        <!-- Table with stripped rows -->
                        <div class="container">
                            <table class="table dt_pelatihan" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NRP</th>
                                        <th scope="col">Nama</th>
                                        {{-- <th scope="col">Departemen</th> --}}
                                        <th scope="col">Perusahaan</th>
                                        <th scope="col">Nama Penyelenggara</th>
                                        <th scope="col">Nama Pelatihan</th>
                                        {{-- <th scope="col">Informasi Pelatihan</th> --}}
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Biaya</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- //sekar --}}
                                    @foreach ($pelatihanData as $no => $pelatihan)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $pelatihan->NRP }}</td>
                                            <td>{{ $pelatihan->username }}</td>
                                            <td>{{ $pelatihan->perusahaan }}</td>
                                            <td>{{ $pelatihan->NAMA_PENYELENGGARA }}</td>
                                            <td>{{ $pelatihan->NAMA }}</td>
                                            <td>{{ $pelatihan->AREA }}</td>
                                            <td>{{ $pelatihan->BERANGKAT_TRAINING }}</td>
                                            <td>{{ $pelatihan->CURRENCY }}{{ $pelatihan->BIAYA }}</td>
                                            <td>
                                                @if ($pelatihan->STATUS == 1)
                                                    <span class="badge rounded-pill text-bg-primary">Create</span>
                                                @elseif($pelatihan->STATUS == 2)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Superintendent PD</span>
                                                @elseif($pelatihan->STATUS == 3)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Manager</span>
                                                @elseif($pelatihan->STATUS == 4)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>HR Manager</span>
                                                @elseif($pelatihan->STATUS == 5)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Direksi</span>
                                                @elseif($pelatihan->STATUS == 6)
                                                    <span class="badge rounded-pill bg-success text-light">Done</span>
                                                @elseif($pelatihan->STATUS == 7)
                                                    <span class="badge rounded-pill bg-danger text-start">Reject</span>
                                                @elseif($pelatihan->STATUS == 8)
                                                    <span class="badge rounded-pill text-bg-warning text-start">Revisi
                                                        Superintendent PD</span>
                                                @elseif($pelatihan->STATUS == 9)
                                                    <span class="badge rounded-pill text-bg-warning text-start">Revisi
                                                        Manager</span>
                                                @elseif($pelatihan->STATUS == 10)
                                                    <span
                                                        class="badge rounded-pill text-bg-warning text-start">Revisi<br>HR
                                                        Manager</span>
                                                @elseif($pelatihan->STATUS == 11)
                                                    <span
                                                        class="badge rounded-pill text-bg-warning text-start">Revisi<br>Direksi</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">Unknown Status</span>
                                                @endif
                                            </td>
                                            <td>

                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false"></a>
                                                    @if (auth()->user()->id_role == 0)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-paper-plane"></i> Send</a>
                                                            </li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                            <li><a class="dropdown-item bi bi-file-pdf export"
                                                                    data-id="{{ $pelatihan->PID }}" href="#">
                                                                    Export PDF</a></li>
                                                        </ul>
                                                    @elseif (auth()->user()->id_role == 5)
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item view" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewPelatihanModal"
                                                            data-id="{{ $pelatihan->PID }}"><i
                                                            class="fa fa-expand"></i>View</a></li>
                                                        <li><a class="dropdown-item send-link" href="#"
                                                                data-id="{{ $pelatihan->PID }}"><i
                                                                    class="fa-regular fa-paper-plane"></i> Send</a>
                                                        </li>
                                                        <li><a class="dropdown-item send-link" href="#"
                                                                data-id="{{ $pelatihan->PID }}"><i
                                                                    class="fa-regular fa-square-check"></i> Approve</a>
                                                        </li>
                                                        <li><a class="dropdown-item revisi" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                            data-id="{{ $pelatihan->PID }}"><i
                                                                class="fa-regular fa-message"></i>Revisi</a></li>
                                                        <li><a class="dropdown-item reject" href="#"
                                                                data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                data-id="{{ $pelatihan->PID }}"><i
                                                                    class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                        </li>
                                                    </ul>
                                                    @elseif($pelatihan->STATUS == 1 && auth()->user()->id_role == 1)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-paper-plane"></i> Send</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 9 && auth()->user()->id_role == 1)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 10 && auth()->user()->id_role == 2)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 11 && auth()->user()->id_role == 3)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 12 && auth()->user()->id_role == 4)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 13 && auth()->user()->id_role == 5)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 11 && auth()->user()->id_role == 3)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 2 && auth()->user()->id_role == 2)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 3 && auth()->user()->id_role == 3)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 4 && auth()->user()->id_role == 4)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 5 && auth()->user()->id_role == 5)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 6 && auth()->user()->id_role == 6)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($pelatihan->STATUS == 7)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item bi bi-file-pdf export"
                                                                    data-id="{{ $pelatihan->PID }}" href="#">
                                                                    Export PDF</a></li>
                                                            {{-- <li><a class="dropdown-item " href="/pelatihan_pdf" data-id="{{ $pelatihan->PID }}"><i class="fa-solid fa-square-poll-vertical"></i> Export PDF</a></li> --}}
                                                        </ul>
                                                    @else
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewPelatihanModal"
                                                                    data-id="{{ $pelatihan->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- <script src="app/javascript/pelatihan.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#nrp-dropdown').on('change', function() {
                var selectedNrp = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: '/pelatihan/get_user_info',
                    data: {
                        nrp: selectedNrp,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        $('#name-add').val(response.nama);
                        $('#jabatan-add').val(response.jabatan);
                        $('#departemen-add').val(response.departemen);
                        $('#perusahaan-add').val(response.perusahaan);
                    },
                    error: function(error) {
                        console.log('Ajax Error:', error);
                    }
                });
            });
        });


        // Jumlah karakter data tabel
        $(document).ready(function() {
            $('.truncate-text').each(function() {
                var maxLength = 100;
                var originalText = $(this).text();

                if (originalText.length > maxLength) {
                    var truncatedText = originalText.substring(0, maxLength) + '...';
                    $(this).text(truncatedText);
                }
            });
        });

        //VIEW sekar
        var pelatihanId;
        $('.view').click(function() {
            pelatihanId = $(this).data('id');
            $('#viewPelatihanModal').attr('data-mode', 'edit');

            $.ajax({
                type: 'GET',
                url: '{{ url('/pelatihan/get') }}/' + pelatihanId,
                success: function(response) {
                    $('#viewPelatihanModal').find('#nrp').text(response.NRP);
                    $('#viewPelatihanModal').find('#name').text(response.name);
                    $('#viewPelatihanModal').find('#jabatan').text(response.jabatan);
                    $('#viewPelatihanModal').find('#departemen').text(response.departemen);
                    $('#viewPelatihanModal').find('#perusahaan').text(response.perusahaan);
                    $('#viewPelatihanModal').find('#nama_pelatihan').text(response.NAMA);
                    $('#viewPelatihanModal').find('#waktu_berangkat').text(response.BERANGKAT_TRAINING);
                    $('#viewPelatihanModal').find('#waktu_mulai').text(response.MULAI_TRAINING);
                    $('#viewPelatihanModal').find('#waktu_selesai').text(response.SELESAI_TRAINING);
                    $('#viewPelatihanModal').find('#waktu_kembali').text(response.KEMBALI_TRAINING);
                    $('#viewPelatihanModal').find('#keterangan').text(response.KETERANGAN);
                    $('#viewPelatihanModal').find('#deskripsi_kompetensi').text(response.KOMPETENSI_DESC);
                    $('#viewPelatihanModal').find('#nama_penyelenggara').text(response.NAMA_PENYELENGGARA);
                    $('#viewPelatihanModal').find('#narasumber').text(response.NARASUMBER);
                    $('#viewPelatihanModal').find('#area').text(response.AREA);
                    $('#viewPelatihanModal').find('#is_jobsite').text(response.IS_JOBSITE);
                    $('#viewPelatihanModal').find('#biaya').text(response.CURRENCY + response.BIAYA);
                    $('#viewPelatihanModal').find('#manfaat_karyawan').text(response.MANFAAT_BAGI_KARYAWAN);
                    $('#viewPelatihanModal').find('#manfaat_perusahaan').text(response.MANFAAT_BAGI_PERUSAHAAN);
                    $('#viewPelatihanModal').find('#atmp_code').text(response.TRAINING_ATMP_CODE);
                    $('#viewPelatihanModal').find('#atmp_desc').text(response.TRAINING_ATMP_DESC);
                    $('#viewPelatihanModal').find('#is_plan_atmp').text(response.IS_PLAN_ATMP);
                    $('#viewPelatihanModal').find('#train_done').text(response.TRAINING_DONE);
                    if (response.APPRV_ATASAN == 0) {
                        $app1 = 'Revisi Pengajuan'
                    }  else if (response.APPRV_ATASAN == 1) {
                        $app1 = 'Pengajuan di Terima'
                    } else {
                        $app1 = null;
                    }
                    $('#viewPelatihanModal').find('#approval_Atasan').text($app1);
                    if (response.APPRV_HR == 0) {
                        $app2 = 'Revisi Pengajuan'
                    } else if (response.APPRV_HR == 1) {
                        $app2 = 'Pengajuan di Terima'
                    } else {
                        $app2 = null;
                    }
                    $('#viewPelatihanModal').find('#approval_HR').text($app2);
                    if (response.APPRV_HR_MNG == 0) {
                        $app3 = 'Revisi Pengajuan'
                    } else if (response.APPRV_HR_MNG == 1) {
                        $app3 = 'Pengajuan di Terima'
                    } else {
                        $app3 = null;
                    }
                    $('#viewPelatihanModal').find('#approval_HR_MNG').text($app3);
                    if (response.APPRV_DRC == 0) {
                        $app4 = 'Revisi Pengajuan'
                    } else if (response.APPRV_DRC == 1) {
                        $app4 = 'Pengajuan di Terima'
                    } else {
                        $app4 = null;
                    }
                    $('#viewPelatihanModal').find('#approval_DRC').text($app4);
                    $('#viewPelatihanModal').find('#ket_HR').text(response.KETERANGAN_HR);
                    $('#viewPelatihanModal').find('#ket_HR_MNG').text(response.KETERANGAN_HR_MNG);
                    $('#viewPelatihanModal').find('#ket_DRC').text(response.KETERANGAN_DRC);
                    $('#viewPelatihanModal').find('#upd_Atasan').text(response.UPDATE_AT_ATASAN);
                    $('#viewPelatihanModal').find('#upd_HR').text(response.UPDATE_AT_HR);
                    $('#viewPelatihanModal').find('#upd_HR_MNG').text(response.UPDATE_AT_HR_MNG);
                    $('#viewPelatihanModal').find('#upd_DRC').text(response.UPDATE_AT_DRC);

                    $('#viewPelatihanModal').modal('show');
                },
                error: function(error) {
                    // Tampilkan pesan kesalahan jika diperlukan
                }
            });
        });

        //EDIT
        var pelatihanId;
        $('.edit').click(function() {
            pelatihanId = $(this).data('id');
            $('#pelatihanModal').attr('data-mode', 'edit');

            $.ajax({
                type: 'GET',
                url: '{{ url('/pelatihan/get') }}/' + pelatihanId,
                success: function(response) {

                    // $('#pelatihanModal').find('#nama_pelatihan_add').val(response.jenis);
                    // $('#pelatihanModal').find('#informasi_pelatihan').val(response.informasi);
                    // $('#pelatihanModal').find('#nama_pelatihan').val(response.nama);
                    // $('#pelatihanModal').find('#narasumber').val(response.narasumber);
                    // $('#pelatihanModal').find('#alasan_pelatihan').val(response.alasan);
                    // $('#pelatihanModal').find('#sharing_pelatihan').val(response.sharing);
                    // $('#pelatihanModal').find('#waktu_pelatihan').val(response.waktu);
                    // $('#pelatihanModal').find('#tempat_pelatihan').val(response.tempat);
                    // $('#pelatihanModal').find('#biaya_pelatihan').val(response.biaya);

                    // $existingRecordId= response.NRP;
                    $('#pelatihanModal').find('select#nrp-dropdown').val(response.NRP);
                    $('#pelatihanModal').find('#name-add').val(response.name);
                    $('#pelatihanModal').find('#jabatan-add').val(response.jabatan);
                    $('#pelatihanModal').find('#departemen-add').val(response.departemen);
                    $('#pelatihanModal').find('#perusahaan-add').val(response.perusahaan);
                    $('#pelatihanModal').find('#nama_pelatihan_add').val(response.NAMA);
                    $('#pelatihanModal').find('#waktu_berangkat_pelatihan').val(response.BERANGKAT_TRAINING);
                    $('#pelatihanModal').find('#waktu_mulai_pelatihan').val(response.MULAI_TRAINING);
                    $('#pelatihanModal').find('#waktu_selesai_pelatihan').val(response.SELESAI_TRAINING);
                    $('#pelatihanModal').find('#waktu_kembali_pelatihan').val(response.KEMBALI_TRAINING);
                    $('#pelatihanModal').find('#keterangan').val(response.KETERANGAN);
                    $('#pelatihanModal').find('#kompetensi_desc').val(response.KOMPETENSI_DESC);
                    $('#pelatihanModal').find('#nama_penyelenggara_add').val(response.NAMA_PENYELENGGARA);
                    $('#pelatihanModal').find('#narasumber').val(response.NARASUMBER);
                    $('#pelatihanModal').find('#area').val(response.AREA);
                    $('#pelatihanModal').find('#is_jobsite').val(response.IS_JOBSITE);
                    $('#pelatihanModal').find('#currency').val(response.CURRENCY);
                    $('#pelatihanModal').find('#biaya_pelatihan').val(response.BIAYA);
                    $('#pelatihanModal').find('#manfaat_karyawan').val(response.MANFAAT_BAGI_KARYAWAN);
                    $('#pelatihanModal').find('#manfaat_perusahaan').val(response.MANFAAT_BAGI_PERUSAHAAN);
                    $('#pelatihanModal').find('#atmp_code').val(response.TRAINING_ATMP_CODE);
                    $('#pelatihanModal').find('#atmp_desc').val(response.TRAINING_ATMP_DESC);


                    $('#pelatihanModal').attr('data-mode', 'edit');
                    $('#pelatihanModal').modal('show');
                },
                error: function(error) {
                    // Tampilkan pesan kesalahan jika diperlukan
                }
            });
        });

        $(document).ready(function() {
            $('#btn-yes-add').click(function() {
                var mode = $('#pelatihanModal').data('mode');

                if (mode === 'add') {
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('/pelatihan/create') }}',
                        data: $('form').serialize(),
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Pelatihan berhasil di tambahkan!',
                                }).then(() => {
                                    location.reload()
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Pelatihan gagal di tambahkan.',
                                });
                            }
                        },
                    });
                } else if (mode === 'edit') {
                    $.ajax({
                        type: 'PUT',
                        url: '{{ url('/pelatihan/myedit') }}/' + pelatihanId,
                        data: $('form').serialize() + '&pelatihan_id=' + pelatihanId,
                        success: function(response) {
                            if (response.status === 'success') {
                                // Display a SweetAlert success message
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Pelatihan berhasil di edit!',
                                }).then(() => {
                                    location.reload()
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Pelatihan gagal di edit.',
                                });
                            }
                        },
                    });
                }

                $('#pelatihanModal').modal('hide');

            });
        });


        function getStatusText(STATUS) {
            if (STATUS === 1) {
                return '<span class="badge rounded-pill text-bg-primary">Create</span>';
            } else if (STATUS === 2) {
                return '<span class="badge rounded-pill bg-warning text-dark">Revisi</span>';
            } else if (STATUS === 3) {
                return '<span class="badge rounded-pill text-bg-info text-start">Pending HRGA Manager</span>';
            } else {
                return 'Unknown Status';
            }
        }

        // Function untuk mengganti status di tabel
        function replaceStatusInTable() {
            var rows = document.querySelectorAll('.dt_pelatihan tbody tr');
            rows.forEach(function(row) {
                var STATUS = row.querySelector('td:nth-child(10)').textContent; // Ambil kode_status dari kolom ke-8
                var statusText = getStatusText(STATUS); // Dapatkan teks status
                row.querySelector('td:nth-child(10)').innerHTML = statusText; // Ganti isi kolom dengan teks status yang sesuai
            });
        }

        // Panggil fungsi untuk mengganti status setelah tabel dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // replaceStatusInTable(); // di matiin 24-01-2024 (error, unknow)
        });


        //SEND
        document.querySelectorAll('.send-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var pelatihanId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Yakin ingin mengirim data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Kirim!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('{{ route('send.pelatihan') }}', {
                                pelatihan_id: pelatihanId
                            })
                            .then(function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses!',
                                    text: response.data.message
                                }).then(() => {
                                    location.reload();
                                });
                            })
                            .catch(function(error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan saat mengirim data.'
                                });
                            });
                    }
                });
            });
        });

        //EXPORT
        document.querySelectorAll('.export').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Export data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Kirim!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios({
                                method: 'post',
                                url: '{{ url('pelatihan/exportoword') }}/' + id,
                                responseType: 'arraybuffer',
                            })
                            .then(function(response) {
                                const blob = new Blob([response.data], {
                                    type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                                });
                                const link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download = 'Form Permohonan Training PT Mitrabara Adiperdana Tbk.docx';
                                document.body.appendChild(link);
                                link.click();
                                document.body.removeChild(link);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses!',
                                    text: 'File berhasil diunduh.'
                                });
                            })
                            .catch(function(error) {
                                // Handle error, e.g., show an error message
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan saat mengirim data.'
                                });
                            });
                    }
                });
            });
        });


        //DELETE
        document.querySelectorAll('.delete').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var pelatihanId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin akan menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Kirim!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('{{ route('delete.pelatihan') }}', {
                                pelatihan_id: pelatihanId
                            })
                            .then(function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses!',
                                    text: response.data.message
                                }).then(() => {
                                    location.reload();
                                });
                            })
                            .catch(function(error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan saat mengirim data.'
                                });
                            });
                    }
                });
            });
        });

        //CETAK
        document.querySelectorAll('.cetakpelatihan').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var pelatihanId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Export Data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Kirim!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get('{{ route('cetak.pelatihan') }}', {
                                pelatihan_id: pelatihanId
                            })
                            .then(function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses!',
                                    text: response.data.message
                                }).then(() => {
                                    location.reload();
                                });
                            })
                            .catch(function(error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan saat mengirim data.'
                                });
                            });
                    }
                });
            });
        });

        //REJECT
        $('.reject').click(function() {
            var pelatihanId = $(this).data('id');

            $('#btn-yes-reject').click(function() {
                var data = $('.form_reject').serialize();

                $.ajax({
                    type: 'POST',

                    url: '/pelatihan/reject?pelatihan_id=' + pelatihanId,

                    data: data,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: response.message
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat mengirim revisi.'
                        });
                    }
                });
            });
        });


        //REVISI
        $('.revisi').click(function() {
            var pelatihanId = $(this).data('id'); // Ambil ID pelatihan dari atribut data-id

            $('#btn-yes-revisi').click(function() {
                // Ambil data dari formulir, termasuk pesan revisi
                var data = $('.form_revisi').serialize();

                // Kirim data dengan permintaan AJAX
                $.ajax({
                    type: 'POST',
                    url: '/pelatihan/revisi?pelatihan_id=' + pelatihanId,
                    data: data,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: response.message
                        }).then(() => {
                            location.reload()
                        });
                    },
                    error: function(error) {
                        // Tampilkan SweetAlert kesalahan
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat mengirim revisi.'
                        });
                    }
                });
            });
        });
    </script>


@endsection
