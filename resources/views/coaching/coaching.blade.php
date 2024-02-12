@extends('include/mainlayout')
@section('title', 'Coaching')
@section('content')
    <div class="pagetitle">
        <h1>coaching</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Coaching</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i> Coaching </h5>
                        <button type="button" class="btn bi bi-plus btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#coachingModal"> Add Coaching</button>
                        <br><br>

                        <!-- Modal View -->
                        <div class="modal fade modal-view" id="viewCoachingModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="btn-view">View coaching</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="coaching-details">
                                            <div class="col-12">
                                            <div class="form-floating">
                                                <h6 class="labelku">IDENTITAS PESERTA</h6>
                                            </div>
                                            </div>
                                            <hr>
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
                                            <div class="col-12">
                                            <div class="form-floating">
                                                <h6 class="labelku">INFORMASI COACHING</h6>
                                            </div>
                                            </div>
                                            <hr>
                                             <div class="detail">
                                                <label for="name-coaching">Nama Coaching:</label>
                                                <span id="name-coaching"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="waktu_coaching">Waktu Coaching :</label>
                                                <span id="waktu_coaching"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="kom_code">Kode Kompetensi:</label>
                                                <span id="kom_code"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="kom_nama">Nama Kompetensi:</label>
                                                <span id="kom_nama"></span>
                                            </div>
                                             <div class="col-12">
                                            <div class="form-floating">
                                                <h6 class="labelku">KETERANGAN</h6>
                                            </div>
                                            </div>
                                            <hr>
                                            <div class="detail">
                                                <label for="upd_atasan">Update By Superintendent PD :</label>
                                                <span id="upd_atasan"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="aprv_atasan">Approve By Superintendent PD :</label>
                                                <span id="aprv_atasan"></span>
                                            </div>
                                             <div class="detail">
                                                <label for="ket_atasan">Keterangan By Superintendent PD :</label>
                                                <span id="ket_atasan"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_hr">Update By Manager :</label>
                                                <span id="upd_hr"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="aprv_hr">Approve By Manager :</label>
                                                <span id="aprv_hr"></span>
                                            </div>
                                             <div class="detail">
                                                <label for="ket_hr">Keterangan By Manager :</label>
                                                <span id="ket_hr"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_hr_mng">Update By HR Manager :</label>
                                                <span id="upd_hr_mng"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="aprv_hr_mng">Approve By HR Manager :</label>
                                                <span id="aprv_hr_mng"></span>
                                            </div>
                                             <div class="detail">
                                                <label for="ket_hr_mng">Keterangan By HR Manager :</label>
                                                <span id="ket_hr_mng"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="upd_drc">Update By Direksi :</label>
                                                <span id="upd_drc"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="aprv_drc">Approve By Direksi :</label>
                                                <span id="aprv_drc"></span>
                                            </div>
                                            <div class="detail">
                                                <label for="ket_drc">Keterangan By Direksi :</label>
                                                <span id="ket_drc"></span>
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
                        <div class="modal fade modal_add" id="coachingModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true" data-mode="add">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="btn-add">Add Coaching</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3 needs-validation" method="POST" action="/coaching/create">
                                            @csrf
                                             <div class="col-12">
                                            <div class="form-floating">
                                                <h6 class="labelku-add">IDENTITAS PESERTA</h6>
                                            </div>
                                            </div>
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
                                                    <input type="text" readonly class="form-control"
                                                        id="name-add" name="name-add" placeholder="Name-add">
                                                    <label for="message-text">Nama</label>
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
                                            <div class="col-12">
                                            <div class="form-floating">
                                                <h6 class="labelku-add">INFORMASI COACHING</h6>
                                            </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control"
                                                        id="name-coaching" name="name-coaching" placeholder="Name">
                                                    <label for="message-text">Nama Coaching</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="waktu_coaching"
                                                        name="waktu_coaching" placeholder="Nama coaching" required>
                                                    <label for="nama coaching">Waktu Coaching<span
                                                            style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-control" id="komp-dropdown" name="komp-dropdown">
                                                        <option value="" selected>Select Kompetensi</option>
                                                        @foreach ($kompOptions as $komp)
                                                            <option value="{{ $komp->KODE }}">{{ $komp->KODE }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="komp">Kode Kompetensi <span
                                                            style="color:red">*</span></label>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" readonly class="form-control" id="kom_name"
                                                        name="kom_name">
                                                    <label for="message-text">Nama Kompetensi<span
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

                        
                         <!--begin::Modal SEND-->
                        <div class="modal fade modal_send" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Approve Coaching</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <form class="kt-form kt-form--label-right form_send" action="{{ route('send.coaching') }}"  method="POST" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">KETERANGAN APPROVAL<span style="color:red">*</span></label>
                                                <textarea class="form-control" id="send-link" name="send-link" rows="8"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="btn-yes-send">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Modal SEND-->
              

                        <!--begin::Modal Revisi-->
                        <div class="modal fade modal_revisi" id="revisiModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Revisi coaching</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="kt-form kt-form--label-right form_revisi"
                                            action="{{ route('revisi.coaching') }}" method="POST"
                                            enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Pesan Revisi coaching
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
                                        <h5 class="modal-title" id="exampleModalLabel">Reject coaching</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="kt-form kt-form--label-right form_reject"
                                            action="{{ route('reject.coaching') }}" method="POST"
                                            enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Pesan Reject coaching
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
                            <table class="table dt_coaching" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NRP</th>
                                        <th scope="col">Nama Coaching</th>
                                        {{-- <th scope="col">Departemen</th> --}}
                                        <th scope="col">Perusahaan</th>
                                        <th scope="col">Kode Kompetensi</th>
                                        {{-- <th scope="col">Informasi coaching</th> --}}
                                        <th scope="col">Nama Kompetensi</th>
                                        <th scope="col">Waktu coaching</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- //sekar --}}
                                    @foreach ($coachingData as $no => $coaching)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $coaching->NRP }}</td>
                                            <td>{{ $coaching->NAMA }}</td>
                                            {{-- <td>{{ $coaching->departemen}}</td> --}}
                                            <td>{{ $coaching->NAMA }}</td>
                                            <td>{{ $coaching->KOMPETENSI_CODE }}</td>
                                            {{-- <td class="truncate-text">{{ $coaching->informasi}}</td> --}}
                                            <td>{{ $coaching->KOMPETENSI_NAME }}</td>
                                            <td>{{ $coaching->COACHING_DATE }}</td>
                                            <td>
                                                @if ($coaching->status == 1)
                                                    <span class="badge rounded-pill text-bg-primary">Create</span>
                                                @elseif($coaching->status == 2)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Superintendent PD</span>
                                                @elseif($coaching->status == 3)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Manager</span>
                                                @elseif($coaching->status == 4)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Manager</span>
                                                @elseif($coaching->status == 5)
                                                    <span class="badge rounded-pill text-bg-info text-start">Need
                                                        Approval<br>Direksi</span>
                                                @elseif($coaching->status == 6)
                                                    <span class="badge rounded-pill bg-success text-light">Done</span>
                                                @elseif($coaching->status == 7)
                                                    <span class="badge rounded-pill bg-danger text-start">Reject</span>
                                                @elseif($coaching->status == 8)
                                                    <span class="badge rounded-pill text-bg-warning text-start">Revisi
                                                        Superintendent PD</span>
                                                @elseif($coaching->status == 9)
                                                    <span class="badge rounded-pill text-bg-warning text-start">Revisi
                                                        Manager</span>
                                                @elseif($coaching->status == 10)
                                                    <span
                                                        class="badge rounded-pill text-bg-warning text-start">Revisi<br>Manager</span>
                                                @elseif($coaching->status == 11)
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
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#coachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                            <li><a class="dropdown-item send" href="#"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-paper-plane"></i> Send</a>
                                                            </li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#sendModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                            <li><a class="dropdown-item bi bi-file-pdf export"
                                                                    data-id="{{ $coaching->PID }}" href="#"> Export
                                                                    PDF</a></li>
                                                        </ul>
                                                    @elseif($coaching->status == 1 && auth()->user()->id_role == 1)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#coachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                            <li><a class="dropdown-item send" href="#"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-paper-plane"></i> Send</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($coaching->status == 8 && auth()->user()->id_role == 1)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#coachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($coaching->status == 9 && auth()->user()->id_role == 2)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#coachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($coaching->status == 10 && auth()->user()->id_role == 3)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#coachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($coaching->status == 11 && auth()->user()->id_role == 4)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item edit" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#coachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete" href="#"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-solid fa-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @elseif($coaching->status == 2 && auth()->user()->id_role == 2)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#sendModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($coaching->status == 3 && auth()->user()->id_role == 3)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#sendModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($coaching->status == 4 && auth()->user()->id_role == 4)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#sendModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($coaching->status == 5 && auth()->user()->id_role == 5)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item send-link" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#sendModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-square-check"></i> Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item revisi" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#revisiModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-message"></i>Revisi</a></li>
                                                            <li><a class="dropdown-item reject" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa-regular fa-circle-xmark"></i>Reject</a>
                                                            </li>
                                                        </ul>
                                                    @elseif($coaching->status == 7)
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
                                                                        class="fa fa-expand"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="/coaching_pdf"><i
                                                                        class="fa-solid fa-square-poll-vertical"></i>
                                                                    Export PDF</a></li>
                                                        </ul>
                                                    @else
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item view" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewcoachingModal"
                                                                    data-id="{{ $coaching->PID }}"><i
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

    {{-- <script src="app/javascript/coaching.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <script>
        $(document).ready(function() {

            $('#nrp-dropdown').on('change', function() {
                var selectedNrp = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'coaching/get_user_info',
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

        $(document).ready(function() {

            $('#komp-dropdown').on('change', function() {
                var kode = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: '/coaching/get_kompetensi_info',
                    data: {
                        kode: kode,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        $('#kom_name').val(response.NAMA);
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

        //VIEW 
        var coachingId;
        $('.view').click(function() {
            coachingId = $(this).data('id');
            $('#viewCoachingModal').attr('data-mode', 'edit');

            $.ajax({
                type: 'GET',
                url: '{{ url('/coaching/get') }}/' + coachingId,
                success: function(response) {
                    function hideIfNullOrEmpty(elementId, value) {
                        var element = $('#viewCoachingModal').find('#' + elementId);
                        var detailElement = element.closest('.detail');

                        if (value === null || value.trim() === '') {
                            detailElement.hide();
                        } else {
                            element.html(value);
                            detailElement.show();
                        }
                    }
                    $('#viewCoachingModal').find('#nrp').text(response.NRP);
                    $('#viewCoachingModal').find('#name').text(response.name);
                    $('#viewCoachingModal').find('#jabatan').text(response.jabatan);
                    $('#viewCoachingModal').find('#departemen').text(response.departemen);
                    $('#viewCoachingModal').find('#perusahaan').text(response.perusahaan);
                    $date = response.COACHING_DATE;
                    $('#viewCoachingModal').find('#name-coaching').text(response.NAMA);
                    $('#viewCoachingModal').find('#waktu_coaching').text($date.split(' ', 1));
                    $('#viewCoachingModal').find('#kom_code').text(response.KOMPETENSI_CODE);
                    $('#viewCoachingModal').find('#kom_nama').text(response.KOMPETENSI_NAME);
            
                    if (response.REJECT_BY == 2) {
                        $app1 = '<span style="color: red;">Reject Pengajuan</span>';
                    }  else if (response.REVISI_BY == 2) {
                        $app1 = '<span style="color: red;">Revisi Pengajuan</span>';
                    }  else if (response.APPRV_ATASAN == 1) {
                        $app1 = 'Pengajuan di Terima'
                    } else {
                        $app1 = null;
                    }
                    
                    hideIfNullOrEmpty('aprv_atasan', $app1);
                    if (response.REJECT_BY == 3) {
                        $app2 = '<span style="color: red;">Reject Pengajuan</span>';
                    }  else if (response.REVISI_BY == 3) {
                        $app2 = '<span style="color: red;">Revisi Pengajuan</span>';
                    } else if (response.APPRV_HR == 1) {
                        $app2 = 'Pengajuan di Terima'
                    } else {
                        $app2 = null;
                    }
                    hideIfNullOrEmpty('aprv_hr', $app2);
                    
                    if (response.REJECT_BY == 4) {
                        $app3 = '<span style="color: red;">Reject Pengajuan</span>';
                    }  else if (response.REVISI_BY == 4) {
                        $app3 = '<span style="color: red;">Revisi Pengajuan</span>';
                    } else if (response.APPRV_HR_MNG == 1) {
                        $app3 = 'Pengajuan di Terima'
                    } else {
                        $app3 = null;
                    }
                     
                    hideIfNullOrEmpty('aprv_hr_mng', $app3);
                    if (response.REJECT_BY == 5) {
                        $app4 = '<span style="color: red;">Reject Pengajuan</span>';
                    }  else if (response.REVISI_BY == 5) {
                        $app4 = '<span style="color: red;">Revisi Pengajuan</span>';
                    } else if (response.APPRV_DRC == 1) {
                        $app4 = 'Pengajuan di Terima'
                    } else {
                        $app4 = null;
                    }
                    hideIfNullOrEmpty('aprv_drc', $app4);
                    hideIfNullOrEmpty('ket_atasan', response.keterangan);
                    hideIfNullOrEmpty('ket_hr', response.KETERANGAN_HR);
                    hideIfNullOrEmpty('ket_hr_mng', response.KETERANGAN_HR_MNG);
                    hideIfNullOrEmpty('ket_drc', response.KETERANGAN_DRC);
                    hideIfNullOrEmpty('upd_atasan', response.UPDATE_AT_ATASAN);
                    hideIfNullOrEmpty('upd_hr', response.UPDATE_AT_HR);
                    hideIfNullOrEmpty('upd_hr_mng', response.UPDATE_AT_HR_MNG);
                    hideIfNullOrEmpty('upd_drc', response.UPDATE_AT_DRC);

                    $('#viewCoachingModal').modal('show');
                },
                error: function(error) {
                }
            });
        });

        //EDIT
        var coachingId;
        $('.edit').click(function() {
            coachingId = $(this).data('id');
            $('#coachingModal').attr('data-mode', 'edit');

            $.ajax({
                type: 'GET',
                url: '{{ url('/coaching/get') }}/' + coachingId,
                success: function(response) {

                    $('#coachingModal').find('#nrp-dropdown').val(response.NRP);
                    $('#coachingModal').find('#name-add').val(response.name);
                    $('#coachingModal').find('#jabatan-add').val(response.jabatan);
                    $('#coachingModal').find('#departemen-add').val(response.departemen);
                    $('#coachingModal').find('#perusahaan-add').val(response.perusahaan);
                    $date = response.COACHING_DATE;
                    $('#coachingModal').find('#name-coaching').val(response.NAMA);
                    $('#coachingModal').find('#waktu_coaching').val($date.split(' ', 1));
                    $('#coachingModal').find('#komp-dropdown').val(response.KOMPETENSI_CODE);
                    $('#coachingModal').find('#kom_name').val(response.KOMPETENSI_NAME);

                    $('#coachingModal').attr('data-mode', 'edit');
                    $('#coachingModal').modal('show');
                },
                error: function(error) {
                }
            });
        });

        $(document).ready(function() {
            $('#btn-yes-add').click(function() {
                var mode = $('#coachingModal').data('mode');

                if (mode === 'add') {
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('/coaching/create') }}',
                        data: $('form').serialize(),
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'coaching berhasil di tambahkan!',
                                }).then(() => {
                                    location.reload()
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'coaching gagal di tambahkan.',
                                });
                            }
                        },
                    });
                } else if (mode === 'edit') {
                    $.ajax({
                        type: 'PUT',
                        url: '{{ url('/coaching/myedit') }}/' + coachingId,
                        data: $('form').serialize() + '&coaching_id=' + coachingId,
                        success: function(response) {
                            if (response.status === 'success') {
                                // Display a SweetAlert success message
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'coaching berhasil di edit!',
                                }).then(() => {
                                    location.reload()
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'coaching gagal di edit.',
                                });
                            }
                        },
                    });
                }

                $('#coachingModal').modal('hide');

            });
        });

        //SEND FIRST
        document.querySelectorAll('.send').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            var coachingId = this.getAttribute('data-id');

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Yakin ingin mengirim data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('{{ route('send.coaching') }}', {
                        coaching_id: coachingId
                    })
                    .then(function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: response.data.message
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(function (error) {
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


        //SEND
        $('.send-link').click(function() {
            var coachingId = $(this).data('id'); 
            $('#btn-yes-send').click(function() {
            
                var data = $('.form_send').serialize();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('send.coaching') }}?coaching_id=' + coachingId, 
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
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat mengirim revisi.'
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
                                url: '{{ url('coaching/exporttoword') }}/' + id,
                                responseType: 'arraybuffer',
                            })
                            .then(function(response) {
                                const blob = new Blob([response.data], {
                                    type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                                });
                                const link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download =
                                    'Form Coaching PT Mitrabara Adiperdana Tbk.docx';
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
                var coachingId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin akan menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Kirim!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('{{ route('delete.coaching') }}', {
                                coaching_id: coachingId
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
            var coachingId = $(this).data('id');

            $('#btn-yes-reject').click(function() {
                var data = $('.form_reject').serialize();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('reject.coaching') }}?coaching_id=' + coachingId,
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
            var coachingId = $(this).data('id'); 
            $('#btn-yes-revisi').click(function() {
                var data = $('.form_revisi').serialize();
                $.ajax({
                    type: 'POST',
                    url: '/coaching/revisi?coaching_id=' + coachingId,
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
