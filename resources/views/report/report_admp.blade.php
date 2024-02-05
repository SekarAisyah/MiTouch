@extends('include/mainlayout')
@section('title', 'ADMP')
@section('content')
    <div class="pagetitle">
      <h1> Laporan ADMP</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Laporan ADMP</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i>  Laporan ADMP</h5>
              
              <!-- Modal View -->
                <div class="modal fade modal-view" id="viewadmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-6" id="btn-view">View admp</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal View -->

            
              
              <!-- Table with stripped rows -->
              <div class="container">
              <form id="filterForm">
                <div class="row" method="GET" action="report-admp/search">
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
              <table class="table dt_admp" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Nama admp</th>
                    <th scope="col">Waktu Mulai admp</th>
                    <th scope="col">Waktu Selesai admp</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                {{-- //sekar --}}
                @foreach($admpData as $no => $admp)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $admp->NRP }}</td>
                    <td>{{ $admp->username}}</td>
                    {{-- <td>{{ $admp->departemen}}</td> --}}
                    <td>{{ $admp->perusahaan}}</td>
                    <td>{{ $admp->NAMA }}</td>
                    <td>{{ $admp->ADMP_JA_START_DATE }}</td>
                    {{-- <td class="truncate-text">{{ $admp->informasi}}</td> --}}
                    <td>{{ $admp->ADMP_JA_FINISH_DATE }}</td>
                    <td>
                        @if($admp->status == 1)
                            <span class="badge rounded-pill text-bg-primary">Create</span>
                        @elseif($admp->status == 2)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Superintendent PD</span>
                        @elseif($admp->status == 3)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Manager</span>
                        @elseif($admp->status == 4)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Manager</span>
                        @elseif($admp->status == 5)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Direksi</span>
                        @elseif($admp->status == 6)
                            <span class="badge rounded-pill bg-success text-light">Done</span>
                        @elseif($admp->status == 7)
                            <span class="badge rounded-pill bg-danger text-start">Reject</span>
                        @elseif($admp->status == 8)
                            <span class="badge rounded-pill text-bg-warning text-start">Revisi Superintendent PD</span>
                        @elseif($admp->status == 9)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi Manager</span>
                        @elseif($admp->status == 10)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Manager</span>
                        @elseif($admp->status == 11)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Direksi</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Unknown Status</span>
                        @endif
                    </td>
                    <td>  
                     
                <div class="dropdown">
                <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewadmpModal" data-id="{{ $admp->PID }}"><i class="fa fa-expand"></i>View</a></li>          
                </ul>
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
            $('#viewadmpModal').find('#star_admp').text(response.ADMP_JA_START_DATE);
            $('#viewadmpModal').find('#finish_admp').text(response.ADMP_JA_FINISH_DATE);
            $('#viewadmpModal').find('#ja_result').text(response.JA_RESULT_DESCRIPTION);
            $('#viewadmpModal').find('#ja_target').text(response.JA_TARGET_DESCRIPTION);
            $('#viewadmpModal').find('#ja_short').text(response.JA_SHORT_DESCRIPTION);
            $('#viewadmpModal').find('#ket_ats').text(response.keterangan);
            $('#viewadmpModal').find('#ket_hr').text(response.KETERANGAN_HR);
            $('#viewadmpModal').find('#ket_hr_mng').text(response.KETERANGAN_HR_MNG);
            $('#viewadmpModal').find('#ket_drc').text(response.KETERANGAN_DRC);
            $('#viewadmpModal').find('#aprv_ats').text(response.APPRV_ATASAN);
            $('#viewadmpModal').find('#aprv_hr').text(response.APPRV_HR);
            $('#viewadmpModal').find('#aprv_hr_mng').text(response.APPRV_HR_MNG);
            $('#viewadmpModal').find('#aprv_drc').text(response.APPRV_DRC);
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

</script>
   

@endsection

