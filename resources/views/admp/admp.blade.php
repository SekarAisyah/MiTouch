@extends('include/mainlayout')
@section('title', 'ADMP')
@section('content')
    <div class="pagetitle">
        <h1> ADMP</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                P<li class="breadcrumb-item active">ADMP</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"> ADMP</i></h5>
                        <button type="button" class="btn bi bi-plus btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#admpModal"> Add ADMP</button>
                        <br><br>

                        <!-- Modal View -->
                        <div class="modal fade modal-view" id="viewadmpModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="btn-view">View admp</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="admp-details">
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
                                                <label for="nama_admp">Nama admp:</label>
                                                <span id="nama_admp"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="star_admp">Waktu Mulai admp:</label>
                                                <span id="star_admp"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="finish_admp">Waktu Selesai admp:</label>
                                                <span id="finish_admp"></span>
                                            </div>

                                            <div class="detail">
                                                <label for="ja_result">Deskripsi Ja Hasil :</label>
                                                <span id="ja_result"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="ja_target">Deskripsi Ja Target :</label>
                                                <span id="ja_target"></span>
                                            </div>

                                            <div class="detail">
                                                <label for="ja_short">Deskripsi Ja Short :</label>
                                                <span id="ja_short"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="ket_ats">Keterangan Superintendent PD :</label>
                                                <span id="ket_ats"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="ket_hr">Keterangan Manager :</label>
                                                <span id="ket_hr"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="ket_hr_mng">Keterangan HR Manager :</label>
                                                <span id="ket_hr_mng"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="ket_drc">Keterangan Direktur :</label>
                                                <span id="ket_drc"> </span>
                                            </div>

                                            <div class="detail">
                                                <label for="aprv_ats">Approve Superintendent PD :</label>
                                                <span id="aprv_ats"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="aprv_hr">Approve Manager :</label>
                                                <span id="aprv_hr"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="aprv_hr_mng">Approve HR Manager :</label>
                                                <span id="aprv_hr_mng"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="aprv_drc">Approve Direktur :</label>
                                                <span id="aprv_drc"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_ats">Update By Superintendent PD :</label>
                                                <span id="upd_ats"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_hr">Update By Manager :</label>
                                                <span id="upd_hr"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_hr_mng">Update By HR Manager :</label>
                                                <span id="upd_hr_mng"> </span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_drc">Update By Direktur :</label>
                                                <span id="upd_drc"> </span>
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
                        <div class="modal fade modal_add" id="admpModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true" data-mode="add">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="btn-add">Add admp</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> --}}
                                        <input type="hidden" name="id" id="id" />
                                        <input type="hidden" name="action_flag" id="action_flag" />
                                        <input type="hidden" name="tgl_mulai" id="tgl_mulai" />
                                        {{-- <input type="hidden" name="last_seq" id="last_seq" value="{{{$last_seq}}}" /> --}}

                                        <form class="row g-3 needs-validation" method="POST" action="/admp/create">
                                            @csrf
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-control" id="nrp-dropdown" name="nrp-dropdown">
                                                        <option value="" selected>Select NRP</option>
                                                        @foreach ($nrpOptions as $nrp)
                                                            <option value="{{ $nrp->nrp }}">{{ $nrp->nrp }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="nrp">NRP <span style="color:red">*</span></label>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" disabled id="name-add"
                                                        name="name-add" placeholder="Name">
                                                    <label for="message-text">Nama </label>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="nama_admp_add"
                                                        name="nama_admp_add" placeholder="Name">
                                                    <label for="message-text">Nama Pelatihan ADMP</label>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="star_admp"
                                                        name="star_admp" placeholder="Nama admp" required>
                                                    <label for="nama admp">Waktu Mulai ADMP<span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="finish_admp"
                                                        name="finish_admp" placeholder="Nama admp" required>
                                                    <label for="nama admp">Waktu Selesai ADMP<span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Address" id="ja_result" name="ja_result" style="height: 100px;"></textarea>
                                                    <label for="message-text">Deskripsi JA Hasil </span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Address" id="ja_target" name="ja_target" style="height: 100px;"></textarea>
                                                    <label for="message-text">Deskripsi JA Target </span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Address" id="ja_short" name="ja_short" style="height: 100px;"></textarea>
                                                    <label for="message-text">Deskripsi JA Short </span></label>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Revisi admp</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="kt-form kt-form--label-right form_revisi"
                                            action="{{ route('revisi.admp') }}" method="POST"
                                            enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Pesan Revisi admp
                                                    <span style="color:red">*</span></label>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Reject admp</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="kt-form kt-form--label-right form_reject"
                                            action="{{ route('reject.admp') }}" method="POST"
                                            enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Pesan Reject admp
                                                    <span style="color:red">*</span></label>
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
                            <table class="table dt_admp" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NRP</th>
                                        <th scope="col">Nama</th>
                                        {{-- <th scope="col">Departemen</th> --}}
                                        <th scope="col">Perusahaan</th>
                                        <th scope="col">Nama admp</th>
                                        <th scope="col">Waktu Mulai admp</th>
                                        {{-- <th scope="col">Informasi admp</th> --}}
                                        <th scope="col">Waktu Selesai admp</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- //sekar --}}
                                    @foreach ($admpData as $no => $admp)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $admp->NRP }}</td>
                                            <td>{{ $admp->username }}</td>
                                            {{-- <td>{{ $admp->departemen}}</td> --}}
                                            <td>{{ $admp->perusahaan }}</td>
                                            <td>{{ $admp->NAMA }}</td>
                                            <td>{{ $admp->ADMP_JA_START_DATE }}</td>
                                            {{-- <td class="truncate-text">{{ $admp->informasi}}</td> --}}
                                            <td>{{ $admp->ADMP_JA_FINISH_DATE }}</td>
                                            <td>
                                                @if ($admp->status == 1)
                                                    <span class="badge rounded-pill text-bg-primary">Create</span>
                                                @elseif($admp->status == 2)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Superintendent PD</span>
                                                @elseif($admp->status == 3)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Manager</span>
                                                @elseif($admp->status == 4)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Manager</span>
                                                @elseif($admp->status == 5)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Direksi</span>
                                                @elseif($admp->status == 6)
                                                    <span class="badge rounded-pill bg-success text-light">Done</span>
                                                @elseif($admp->status == 7)
                                                    <span class="badge rounded-pill bg-danger text-start">Reject</span>
                                                @elseif($admp->status == 8)
                                                    <span class="badge rounded-pill text-bg-warning text-start">Revisi
                                                        Superintendent PD</span>
                                                @elseif($admp->status == 9)
                                                    <span class="badge rounded-pill text-bg-warning text-start">Revisi
                                                        Manager</span>
                                                @elseif($admp->status == 10)
                                                    <span
                                                        class="badge rounded-pill text-bg-warning text-start">Revisi<br>Manager</span>
                                                @elseif($admp->status == 11)
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
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#admpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-paper-plane"></i> Send</a>
                                                            </li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                            <li><a class="dropdown-item bi bi-file-pdf export"
                                                                    data-id="{{ $admp->PID }}" href="#"> Export
                                                                    PDF</a></li>
                                                        </ul>
                                                    @elseif (auth()->user()->id_role == 5)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-paper-plane"></i> Send</a>
                                                            </li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($admp->status == 1 && auth()->user()->id_role == 1)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#admpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-paper-plane"></i> Send</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($admp->status == 9 && auth()->user()->id_role == 1)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#admpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($admp->status == 10 && auth()->user()->id_role == 2)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#admpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($admp->status == 11 && auth()->user()->id_role == 3)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#admpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($admp->status == 12 && auth()->user()->id_role == 4)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#admpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($admp->status == 13 && auth()->user()->id_role == 5)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#admpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($admp->status == 11 && auth()->user()->id_role == 3)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#admpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($admp->status == 2 && auth()->user()->id_role == 2)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($admp->status == 3 && auth()->user()->id_role == 3)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($admp->status == 4 && auth()->user()->id_role == 4)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($admp->status == 5 && auth()->user()->id_role == 5)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($admp->status == 6 && auth()->user()->id_role == 6)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($admp->status == 7)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#viewadmpModal"
                                                                    data-id="{{ $admp->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item" data-id="{{ $admp->PID }}"><i
                                                                        class="fa-solid fa-square-poll-vertical"></i>
                                                                    Export PDF</a></li>
                                                        </ul>
                                                    @else
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#"><i
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

    {{-- <script src="app/javascript/admp.js"></script> --}}
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
                    url: 'admp/get_user_info',
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
        var admpId;
        $('.view').click(function() {
            admpId = $(this).data('id');
            $('#viewadmpModal').attr('data-mode', 'edit');

            $.ajax({
                type: 'GET',
                url: '{{ url('/admp/get') }}/' + admpId,
                success: function(response) {
                    $('#viewadmpModal').find('#nrp').text(response.NRP);
                    $('#viewadmpModal').find('#name').text(response.name);
                    $('#viewadmpModal').find('#jabatan').text(response.jabatan);
                    $('#viewadmpModal').find('#departemen').text(response.departemen);
                    $('#viewadmpModal').find('#perusahaan').text(response.perusahaan);
                    $('#viewadmpModal').find('#nama_admp').text(response.NAMA);
                    $date = response.ADMP_JA_START_DATE;
                    $date2 = response.ADMP_JA_FINISH_DATE;
                    $('#viewadmpModal').find('#star_admp').text($date.split(' ', 1));
                    $('#viewadmpModal').find('#finish_admp').text($date2.split(' ', 1));
                    $('#viewadmpModal').find('#ja_result').text(response.JA_RESULT_DESCRIPTION);
                    $('#viewadmpModal').find('#ja_target').text(response.JA_TARGET_DESCRIPTION);
                    $('#viewadmpModal').find('#ja_short').text(response.JA_SHORT_DESCRIPTION);
                    $('#viewadmpModal').find('#ket_ats').text(response.keterangan);
                    $('#viewadmpModal').find('#ket_hr').text(response.KETERANGAN_HR);
                    $('#viewadmpModal').find('#ket_hr_mng').text(response.KETERANGAN_HR_MNG);
                    $('#viewadmpModal').find('#ket_drc').text(response.KETERANGAN_DRC);
                    if (response.APPRV_ATASAN == 0) {
                        $app1 = 'Revisi Pengajuan'
                    } else if (response.APPRV_ATASAN == 1) {
                        $app1 = 'Pengajuan di Terima'
                    } else {
                        $app1 = null;
                    }
                    $('#viewadmpModal').find('#aprv_ats').text($app1);
                    if (response.APPRV_HR == 0) {
                        $app2 = 'Revisi Pengajuan'
                    } else if (response.APPRV_HR == 1) {
                        $app2 = 'Pengajuan di Terima'
                    } else {
                        $app2 = null;
                    }
                    $('#viewadmpModal').find('#aprv_hr').text($app2);
                    if (response.APPRV_HR_MNG == 0) {
                        $app3 = 'Revisi Pengajuan'
                    } else if (response.APPRV_HR_MNG == 1) {
                        $app3 = 'Pengajuan di Terima'
                    } else {
                        $app3 = null;
                    }
                    $('#viewadmpModal').find('#aprv_hr_mng').text($app3);
                    if (response.APPRV_DRC == 0) {
                        $app4 = 'Revisi Pengajuan'
                    } else if (response.APPRV_DRC == 1) {
                        $app4 = 'Pengajuan di Terima'
                    } else {
                        $app4 = null;
                    }
                    $('#viewadmpModal').find('#aprv_drc').text($app4);
                    $('#viewadmpModal').find('#upd_ats').text(response.UPDATE_AT_ATASAN);
                    $('#viewadmpModal').find('#upd_hr').text(response.UPDATE_AT_HR);
                    $('#viewadmpModal').find('#upd_hr_mng').text(response.UPDATE_AT_HR_MNG);
                    $('#viewadmpModal').find('#upd_drc').text(response.UPDATE_AT_DRC);

                    $('#viewadmpModal').modal('show');
                },
                error: function(error) {
                    // Tampilkan pesan kesalahan jika diperlukan
                }
            });
        });

        //EDIT
        var admpId;
        $('.edit').click(function() {
            admpId = $(this).data('id');
            $('#admpModal').attr('data-mode', 'edit');

            $.ajax({
                type: 'GET',
                url: '{{ url('/admp/get') }}/' + admpId,
                success: function(response) {

                    $('#admpModal').find('#nrp-dropdown').val(response.NRP);
                    $('#admpModal').find('#name-add').val(response.name);
                    $('#admpModal').find('#nama_admp_add').val(response.NAMA);
                    $date = response.ADMP_JA_START_DATE;
                    $date2 = response.ADMP_JA_FINISH_DATE;
                    $('#admpModal').find('#star_admp').val($date.split(' ', 1));
                    $('#admpModal').find('#finish_admp').val($date2.split(' ', 1));
                    $('#admpModal').find('#ja_result').val(response.JA_RESULT_DESCRIPTION);
                    $('#admpModal').find('#ja_target').val(response.JA_TARGET_DESCRIPTION);
                    $('#admpModal').find('#ja_short').val(response.JA_SHORT_DESCRIPTION);

                    $('#admpModal').attr('data-mode', 'edit');
                    $('#admpModal').modal('show');
                },
                error: function(error) {
                    // Tampilkan pesan kesalahan jika diperlukan
                }
            });
        });

        $(document).ready(function() {
            $('#btn-yes-add').click(function() {
                var mode = $('#admpModal').data('mode');

                if (mode === 'add') {
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('/admp/create') }}',
                        data: $('form').serialize(),
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'admp berhasil di tambahkan!',
                                }).then(() => {
                                    location.reload()
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'admp gagal di tambahkan.',
                                });
                            }
                        },
                    });
                } else if (mode === 'edit') {
                    $.ajax({
                        type: 'PUT',
                        url: '{{ url('/admp/myedit') }}/' + admpId,
                        data: $('form').serialize() + '&admp_id=' + admpId,
                        success: function(response) {
                            if (response.status === 'success') {
                                // Display a SweetAlert success message
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'admp berhasil di edit!',
                                }).then(() => {
                                    location.reload()
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'admp gagal di edit.',
                                });
                            }
                        },
                    });
                }

                $('#admpModal').modal('hide');

            });
        });


        function getStatusText(kodeStatus) {
            if (kode_status === 1) {
                return '<span class="badge rounded-pill text-bg-primary">Create</span>';
            } else if (kode_status === 2) {
                return '<span class="badge rounded-pill bg-warning text-dark">Revisi</span>';
            } else if (kode_status === 3) {
                return '<span class="badge rounded-pill text-bg-info text-start">Need Approval HRGA Manager</span>';
            } else {
                return 'Unknown Status';
            }
        }

        // Function untuk mengganti status di tabel
        function replaceStatusInTable() {
            var rows = document.querySelectorAll('.dt_admp tbody tr');
            rows.forEach(function(row) {
                var kodeStatus = row.querySelector('td:nth-child(8)')
                    .textContent; // Ambil kode_status dari kolom ke-8
                var statusText = getStatusText(kodeStatus); // Dapatkan teks status
                row.querySelector('td:nth-child(8)').innerHTML =
                    statusText; // Ganti isi kolom dengan teks status yang sesuai
            });
        }

        // Panggil fungsi untuk mengganti status setelah tabel dimuat
        document.addEventListener('DOMContentLoaded', function() {
            replaceStatusInTable();
        });


        //SEND
        document.querySelectorAll('.send-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var admpId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Yakin ingin mengirim data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Kirim!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('{{ route('send.admp') }}', {
                                admp_id: admpId
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
                                url: '{{ url('admp/exporttoword') }}/' + id,
                                responseType: 'arraybuffer',
                            })
                            .then(function(response) {
                                const blob = new Blob([response.data], {
                                    type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                                });
                                const link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download =
                                    'Form ADMP PT Mitrabara Adiperdana Tbk.docx';
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
                var admpId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin akan menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Kirim!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('{{ route('delete.admp') }}', {
                                admp_id: admpId
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
            var admpId = $(this).data('id');

            $('#btn-yes-reject').click(function() {
                var data = $('.form_reject').serialize();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('reject.admp') }}?admp_id=' + admpId,
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
            var admpId = $(this).data('id'); // Ambil ID admp dari atribut data-id

            $('#btn-yes-revisi').click(function() {
                // Ambil data dari formulir, termasuk pesan revisi
                var data = $('.form_revisi').serialize();

                // Kirim data dengan permintaan AJAX
                $.ajax({
                    type: 'POST',
                    url: '{{ route('revisi.admp') }}?admp_id=' + admpId,
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
