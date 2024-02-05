@extends('include/mainlayout')
@section('title', 'Coaching')
@section('content')
    <div class="pagetitle">
      <h1>Laporan Coaching</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Laporan Coaching</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"> </i>  Laporan Coaching </h5>
            
              <!-- Modal View -->
                <div class="modal fade modal-view" id="viewCoachingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-6" id="btn-view">View coaching</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="coaching-details">
                                    <div class="detail">
                                        <label for="nrp">NRP :</label>
                                        <span id="nrp"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="name">Nama Coaching:</label>
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
                                    <div class="detail">
                                        <label for="aprv_atasan">Approve By Superintendent PD :</label>
                                        <span id="aprv_atasan"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="aprv_hr">Approve By Manager :</label>
                                        <span id="aprv_hr"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="aprv_hr_mng">Approve By HR Manager :</label>
                                        <span id="aprv_hr_mng"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="aprv_drc">Approve By Direksi :</label>
                                        <span id="aprv_drc"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="ket_atasan">Keterangan By Superintendent PD :</label>
                                        <span id="ket_atasan"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="ket_hr">Keterangan By Manager :</label>
                                        <span id="ket_hr"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="ket_hr_mng">Keterangan By HR Manager :</label>
                                        <span id="ket_hr_mng"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="ket_drc">Keterangan By Direksi :</label>
                                        <span id="ket_drc"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="upd_atasan">Update By Superintendent PD :</label>
                                        <span id="upd_atasan"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="upd_hr">Update By Manager :</label>
                                        <span id="upd_hr"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="upd_hr_mng">Update By HR Manager :</label>
                                        <span id="upd_hr_mng"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="upd_drc">Update By Direksi :</label>
                                        <span id="upd_drc"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal View -->

            
              
              <!-- Table with stripped rows -->
              <div class="container">
              <form id="filterForm">
                <div class="row" method="GET" action="report-coaching/search">
                    <div class="col-md-3 mb-2">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $startDate ?? '' }}">
                    </div>

                    <div class="col-md-3 mb-2">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $endDate ?? '' }}">
                    </div>

                    <div class="col-md-4 mb-2">
                    <label for="end_date"></label><br>
                        <button type="submit" id="searchBtn" class="btn btn-primary btn-sm">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </div>
                </form>
                  <div class = "">
                  <div class= "col-md-3 mb-4">
                  <label for="statusFilter">Status:</label>
                  <select id="statusFilter" class="form-select">
                      <option value="">All</option>
                      <option value="Create">Create</option>
                      <option value="Pending Atasan">Pending Superintendent PD</option>
                      <option value="Pending HR:PD">Pending Manager</option>
                      <option value="Pending Manager">Pending Manager</option>
                      <option value="Pending Direksi">Pending Direksi</option>
                      <option value="6">Pending HRGA</option>
                       <option value=6>Pending HRGA</option>
                      <option value="Pending HRGA">Pending HRGA</option>
                      <option value="Revisi Atasan">Revisi Superintendent PD</option>
                      <option value="Revisi HR:PD">Revisi Manager</option>
                      <option value="Revisi Manager">Revisi Manager</option>
                      <option value="Revisi Direksi">Revisi Direksi</option>
                      <option value="Revisi HRGA">Revisi HRGA</option>
                      <option value="Aprroved">Approved</option>
                  </select>
                  </div>
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
                @foreach($coachingData as $no => $coaching)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $coaching->NRP }}</td>
                    <td>{{ $coaching->NAMA }}</td>
                    {{-- <td>{{ $coaching->departemen}}</td> --}}
                    <td>{{ $coaching->perusahaan}}</td>
                    <td>{{ $coaching->KOMPETENSI_CODE }}</td>
                    {{-- <td class="truncate-text">{{ $coaching->informasi}}</td> --}}
                    <td>{{ $coaching->KOMPETENSI_NAME }}</td>
                    <td>{{ $coaching->COACHING_DATE }}</td>
                    <td>
                        @if($coaching->status == 1)
                            <span class="badge rounded-pill text-bg-primary">Create</span>
                        @elseif($coaching->status == 2)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Superintendent PD</span>
                        @elseif($coaching->status == 3)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Manager</span>
                        @elseif($coaching->status == 4)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Manager</span>
                        @elseif($coaching->status == 5)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Direksi</span>
                        @elseif($coaching->status == 6)
                            <span class="badge rounded-pill bg-success text-light">Done</span>
                        @elseif($coaching->status == 7)
                            <span class="badge rounded-pill bg-danger text-start">Reject</span>
                        @elseif($coaching->status == 8)
                            <span class="badge rounded-pill text-bg-warning text-start">Revisi Superintendent PD</span>
                        @elseif($coaching->status == 9)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi Manager</span>
                        @elseif($coaching->status == 10)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Manager</span>
                        @elseif($coaching->status == 11)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Direksi</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Unknown Status</span>
                        @endif
                    </td>
                    <td>  
                     
                <div class="dropdown">
                <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                @if(auth()->user()->id_role == 0)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->PID }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-paper-plane"></i> Send</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>
                    <li><a class="dropdown-item bi bi-file-pdf export" data-id="{{ $coaching->PID }}" href="#"> Export PDF</a></li>                --}}
                </ul>
                @elseif($coaching->status == 1 && auth()->user()->id_role == 1)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->PID }}"><i class="fa-solid fa-trash"></i>Delete</a></li>
                    <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-paper-plane"></i> Send</a></li> --}}
                </ul>
                @elseif($coaching->status == 9 && auth()->user()->id_role == 1)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->PID }}"><i class="fa-solid fa-trash"></i>Delete</a></li> --}}
                </ul>
                @elseif($coaching->status == 10 && auth()->user()->id_role == 2)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->PID }}"><i class="fa-solid fa-trash"></i>Delete</a></li> --}}
                </ul>
                @elseif($coaching->status == 11 && auth()->user()->id_role == 3)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->PID }}"><i class="fa-solid fa-trash"></i>Delete</a></li> --}}
                </ul>
                 @elseif($coaching->status == 12 && auth()->user()->id_role == 4)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->PID }}"><i class="fa-solid fa-trash"></i>Delete</a></li> --}}
                </ul>
                 @elseif($coaching->status == 13 && auth()->user()->id_role == 5)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->PID }}"><i class="fa-solid fa-trash"></i>Delete</a></li> --}}
                </ul>
                @elseif($coaching->status == 11 && auth()->user()->id_role == 3)
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#coachingModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                    <li><a class="dropdown-item delete" href="#" data-id="{{ $coaching->PID }}"><i class="fa-solid fa-trash"></i>Delete</a></li> --}}
                </ul>
                @elseif($coaching->status == 2 && auth()->user()->id_role == 2)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li>                 --}}
                </ul>
                @elseif($coaching->status == 3 && auth()->user()->id_role == 3)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li> --}}
                </ul>
                @elseif($coaching->status == 4 && auth()->user()->id_role == 4)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li> --}}
                </ul>
                @elseif($coaching->status == 5 && auth()->user()->id_role == 5)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                    <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li> --}}
                </ul>
                @elseif($coaching->status == 6 && auth()->user()->id_role == 6)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item send-link" href="#" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-square-check"></i> Approve</a></li>
                    <li><a class="dropdown-item revisi" href="#" data-bs-toggle="modal" data-bs-target="#revisiModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-message"></i>Revisi</a></li>
                   <li><a class="dropdown-item reject" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $coaching->PID }}"><i class="fa-regular fa-circle-xmark"></i>Reject</a></li> --}}
                </ul>
                @elseif($coaching->status == 7)
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    {{-- <li><a class="dropdown-item" href="/coaching_pdf"><i class="fa-solid fa-square-poll-vertical"></i> Export PDF</a></li> --}}
                </ul>
                @else
                 <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewcoachingModal" data-id="{{ $coaching->PID }}"><i class="fa fa-expand"></i>View</a></li>
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
  
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>


<script>
var myTable = $('#datatable').DataTable();
if (myTable) {
    myTable.destroy();
}

var dataTable = $('#datatable').DataTable({
   
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i> Copy',
            className: 'btn btn-secondary',
        },
        {
            extend: 'excel',
            text: '<i class="bi bi-file-earmark-excel"></i> Excel',
            className: 'btn btn-success',
        },
        {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf"></i> PDF',
            className: 'btn btn-danger',
        },
        {
            extend: 'print',
            text: '<i class="bi bi-printer"></i> print',
            className: 'btn btn-danger',
        }
       
    ]
});

$('#statusFilter').on('change', function () {
    var statusValue = $(this).val();
    dataTable.column(9).search(statusValue).draw();
});

//VIEW sekar
var coachingId; 
$('.view').click(function() {
    coachingId = $(this).data('id');
     $('#viewCoachingModal').attr('data-mode', 'edit');
    
    $.ajax({
        type: 'GET',
        url: '{{ url('/coaching/get') }}/' + coachingId,
        success: function(response) {
            $('#viewCoachingModal').find('#nrp').text(response.NRP);
                    $('#viewCoachingModal').find('#name').text(response.NAMA);
                    $('#viewCoachingModal').find('#jabatan').text(response.jabatan);
                    $('#viewCoachingModal').find('#departemen').text(response.departemen);
                    $('#viewCoachingModal').find('#perusahaan').text(response.perusahaan);
                    $('#viewCoachingModal').find('#waktu_coaching').text(response.COACHING_DATE);
                    $('#viewCoachingModal').find('#kom_code').text(response.KOMPETENSI_CODE);
                    $('#viewCoachingModal').find('#kom_nama').text(response.KOMPETENSI_NAME);
                    $('#viewCoachingModal').find('#aprv_atasan').text(response.APPRV_ATASAN);
                    $('#viewCoachingModal').find('#aprv_hr').text(response.APPRV_HR);
                    $('#viewCoachingModal').find('#aprv_hr_mng').text(response.APPRV_HR_MNG);
                    $('#viewCoachingModal').find('#aprv_drc').text(response.APPRV_DRC);
                    $('#viewCoachingModal').find('#ket_atasan').text(response.keterangan);
                    $('#viewCoachingModal').find('#ket_hr').text(response.KETERANGAN_HR);
                    $('#viewCoachingModal').find('#ket_hr_mng').text(response.KETERANGAN_HR_MNG);
                    $('#viewCoachingModal').find('#ket_drc').text(response.KETERANGAN_DRC);
                    $('#viewCoachingModal').find('#upd_atasan').text(response.UPDATE_AT_ATASAN);
                    $('#viewCoachingModal').find('#upd_hr').text(response.UPDATE_AT_HR);
                    $('#viewCoachingModal').find('#upd_hr_mng').text(response.UPDATE_AT_HR_MNG);
                    $('#viewCoachingModal').find('#upd_drc').text(response.UPDATE_AT_DRC);
    
            $('#viewCoachingModal').modal('show');
        },
        error: function(error) {
            // Tampilkan pesan kesalahan jika diperlukan
        }
    });
});
    </script>
   

@endsection

