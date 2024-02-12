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
                                    <h6 class="labelku">WAKTU PELAKSANAAN ADMP</h6>
                                </div>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="star_admp">Waktu Mulai admp:</label>
                                    <span id="star_admp"></span>
                                </div>
                                <div class="detail">
                                    <label for="finish_admp">Waktu Selesai admp:</label>
                                    <span id="finish_admp"></span>
                                </div>
                                <div class="col-12">
                                <div class="form-floating">
                                    <h6 class="labelku">INFORMASI ADMP</h6>
                                </div>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="nama_admp">Nama admp:</label>
                                    <span id="nama_admp"></span>
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
                                <div class="col-12">
                                <div class="form-floating">
                                    <h6 class="labelku">KETERANGAN</h6>
                                </div>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="upd_ats">Update By Superintendent PD :</label>
                                    <span id="upd_ats"> </span>
                                </div>
                                <div class="detail">
                                    <label for="aprv_ats">Approve Superintendent PD :</label>
                                    <span id="aprv_ats"> </span>
                                </div>
                                    <div class="detail">
                                    <label for="ket_ats">Keterangan Superintendent PD :</label>
                                    <span id="ket_ats"> </span>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="upd_hr">Update By Manager :</label>
                                    <span id="upd_hr"> </span>
                                </div>
                                <div class="detail">
                                    <label for="aprv_hr">Approve Manager :</label>
                                    <span id="aprv_hr"> </span>
                                </div>
                                    <div class="detail">
                                    <label for="ket_hr">Keterangan Manager :</label>
                                    <span id="ket_hr"> </span>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="upd_hr_mng">Update By HR Manager :</label>
                                    <span id="upd_hr_mng"> </span>
                                </div>
                                <div class="detail">
                                    <label for="aprv_hr_mng">Approve HR Manager :</label>
                                    <span id="aprv_hr_mng"> </span>
                                </div>
                                    <div class="detail">
                                    <label for="ket_hr_mng">Keterangan HR Manager :</label>
                                    <span id="ket_hr_mng"> </span>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="upd_drc">Update By Direktur :</label>
                                    <span id="upd_drc"> </span>
                                </div>
                                <div class="detail">
                                    <label for="aprv_drc">Approve Direktur :</label>
                                    <span id="aprv_drc"> </span>
                                </div>
                                <div class="detail">
                                    <label for="ket_drc">Keterangan Direktur :</label>
                                    <span id="ket_drc"> </span>
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
                      <option value="Need Approval Superintendent PD">Need Approval Superintendent PD</option>
                      <option value="Need Approval Manager">Need Approval Manager</option>
                      <option value="Need Approval HR Manager">Need Approval HR Manager</option>
                      <option value="Need Approval Direksi">Need Approval Direksi</option>
                      <option value="Revisi Superintendent PD">Revisi Superintendent PD</option>
                      <option value="Revisi Manager">Revisi Manager</option>
                      <option value="Revisi HR Manager">Revisi HR Manager</option>
                      <option value="Revisi Direksi">Revisi Direksi</option>
                      <option value="Done">Done</option>
                      <option value="Reject">Reject</option>
                  </select>
                </div>
              <table class="table dt_admp" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Nama ADMP</th>
                    <th scope="col">Waktu Mulai ADMP</th>
                    <th scope="col">Waktu Selesai ADMP</th>
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
    dataTable.column(7).search(statusValue).draw();
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
                    function hideIfNullOrEmpty(elementId, value) {
                        var element = $('#viewadmpModal').find('#' + elementId);
                        var detailElement = element.closest('.detail');

                        if (value === null || value.trim() === '') {
                            detailElement.hide();
                        } else {
                            element.html(value);
                            detailElement.show();
                        }
                    }

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

                    if (response.REJECT_BY == 2) {
                        $app1 = '<span style="color: red;">Reject Pengajuan</span>';
                    }  else if (response.REVISI_BY == 2) {
                        $app1 = '<span style="color: red;">Revisi Pengajuan</span>';
                    }  else if (response.APPRV_ATASAN == 1) {
                        $app1 = 'Pengajuan di Terima'
                    } else {
                        $app1 = null;
                    }
             
                    hideIfNullOrEmpty('aprv_ats', $app1);
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
                    hideIfNullOrEmpty('ket_ats', response.keterangan);
                    hideIfNullOrEmpty('ket_hr', response.KETERANGAN_HR);
                    hideIfNullOrEmpty('ket_hr_mng', response.KETERANGAN_HR_MNG);
                    hideIfNullOrEmpty('ket_drc', response.KETERANGAN_DRC);
                    hideIfNullOrEmpty('upd_ats', response.UPDATE_AT_ATASAN);
                    hideIfNullOrEmpty('upd_hr', response.UPDATE_AT_HR);
                    hideIfNullOrEmpty('upd_hr_mng', response.UPDATE_AT_HR_MNG);
                    hideIfNullOrEmpty('upd_drc', response.UPDATE_AT_DRC);

                    $('#viewadmpModal').modal('show');
                },
                error: function(error) {
                    
                }
            });
        });

</script>
   

@endsection

