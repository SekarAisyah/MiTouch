@extends('include/mainlayout')
@section('title', 'Pelatihan')
@section('content')
    <div class="pagetitle">
      <h1>Laporan Pelatihan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Laporan Pelatihan</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i>  Laporan Pelatihan</h5>

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
                                    <h6 class="labelku">INFORMASI PELATIHAN</h6>
                                </div>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="nama_pelatihan">Nama Pelatihan:</label>
                                    <span id="nama_pelatihan"></span>
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
                                <div class="col-12">
                                <div class="form-floating">
                                    <h6 class="labelku">WAKTU PELAKSANAAN PELATIHAN</h6>
                                </div>
                                </div>
                                <hr>
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
                                    <div class="col-12">
                                <div class="form-floating">
                                    <h6 class="labelku">MANFAAT PELATIHAN</h6>
                                </div>
                                </div>
                                <hr>
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
                                <div class="col-12">
                                <div class="form-floating">
                                    <h6 class="labelku">KETERANGAN</h6>
                                </div>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="upd_Atasan">Update Superintendent PD:</label>
                                    <span id="upd_Atasan"> </span>
                                </div>
                                <div class="detail">
                                    <label for="approval_Atasan">Approve Superintendent PD:</label>
                                    <span id="approval_Atasan"> </span>
                                </div>                                
                                <div class="detail">
                                    <label for="ket_Atasan">Keterangan Superintendent PD:</label>
                                    <span id="ket_Atasan"> </span>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="upd_HR">Update Manager:</label>
                                    <span id="upd_HR"> </span>
                                </div>
                                <div class="detail">
                                    <label for="approval_HR">Approve Manager:</label>
                                    <span id="approval_HR"> </span>
                                </div>
                                <div class="detail">
                                    <label for="ket_HR">Keterangan Manager:</label>
                                    <span id="ket_HR"> </span>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="upd_HR_MNG">Update HR Manager:</label>
                                    <span id="upd_HR_MNG"> </span>
                                </div>
                                <div class="detail">
                                    <label for="approval_HR_MNG">Approve HR Manager:</label>
                                    <span id="approval_HR_MNG"> </span>
                                </div>
                                <div class="detail">
                                    <label for="ket_HR_MNG">Keterangan HR Manager:</label>
                                    <span id="ket_HR_MNG"> </span>
                                </div>
                                <hr>
                                <div class="detail">
                                    <label for="upd_DRC">Update Direksi:</label>
                                    <span id="upd_DRC"> </span>
                                </div>
                                <div class="detail">
                                    <label for="approval_DRC">Approve Direksi:</label>
                                    <span id="approval_DRC"> </span>
                                </div>
                                <div class="detail">
                                    <label for="ket_DRC">Keterangan Direksi:</label>
                                    <span id="ket_DRC"> </span>
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
                    <div class="row" method="GET" action="report-pelatihan/search">
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
              
              <table class="table dt_pelatihan" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Jenis Pelatihan</th>
                    <th scope="col">Nama Pelatihan</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                {{-- //sekar --}}
                @foreach($pelatihanData as $no => $pelatihan)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $pelatihan->NRP }}</td>
                    <td>{{ $pelatihan->username}}</td>
                    <td>{{ $pelatihan->perusahaan}}</td>
                    <td>{{ $pelatihan->NAMA_PENYELENGGARA }}</td>
                    <td>{{ $pelatihan->NAMA }}</td>
                    {{-- <td class="truncate-text">{{ $pelatihan->informasi}}</td> --}}
                    <td>{{ $pelatihan->BERANGKAT_TRAINING }}</td>
                    <td>{{ $pelatihan->AREA }}</td>
                    <td>{{ $pelatihan->CURRENCY }}{{ $pelatihan->BIAYA }}</td>
                    <td>
                        @if($pelatihan->STATUS == 1)
                            <span class="badge rounded-pill text-bg-primary">Create</span>
                        @elseif($pelatihan->STATUS == 2)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Superintendent PD</span>
                        @elseif($pelatihan->STATUS == 3)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Manager</span>
                        @elseif($pelatihan->STATUS == 4)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Manager</span>
                        @elseif($pelatihan->STATUS == 5)
                            <span class="badge rounded-pill text-bg-info text-start">Need Approval<br>Direksi</span>
                        @elseif($pelatihan->STATUS == 6)
                            <span class="badge rounded-pill bg-success text-light">Done</span>
                        @elseif($pelatihan->STATUS == 7)
                            <span class="badge rounded-pill bg-danger text-start">Reject</span>
                        @elseif($pelatihan->STATUS == 8)
                            <span class="badge rounded-pill text-bg-warning text-start">Revisi Superintendent PD</span>
                        @elseif($pelatihan->STATUS == 9)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi Manager</span>
                        @elseif($pelatihan->STATUS == 10)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br> HR Manager</span>
                        @elseif($pelatihan->STATUS == 11)
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Direksi</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Unknown Status</span>
                        @endif
                    </td>
                    <td>   
                    <div class="dropdown">
                    <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPelatihanModal" data-id="{{ $pelatihan->PID }}"><i class="fa fa-expand"></i>View</a></li>
                    </ul>
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


        var pelatihanId;
        $('.view').click(function() {
            pelatihanId = $(this).data('id');
            $('#viewPelatihanModal').attr('data-mode', 'edit');

            $.ajax({
                type: 'GET',
                url: '{{ url('/pelatihan/get') }}/' + pelatihanId,
                success: function(response) {
                    function hideIfNullOrEmpty(elementId, value) {
                        var element = $('#viewPelatihanModal').find('#' + elementId);
                        var detailElement = element.closest('.detail');

                        if (value === null || value.trim() === '') {
                            detailElement.hide();
                        } else {
                            element.html(value);
                            detailElement.show();
                        }
                    }

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
                    
                    hideIfNullOrEmpty('is_plan_atmp', response.IS_PLAN_ATMP);
                    hideIfNullOrEmpty('train_done', response.TRAINING_DONE);
                    
                    if (response.REJECT_BY == 2) {
                        $app1 = '<span style="color: red;">Reject Pengajuan</span>';
                    }  else if (response.REVISI_BY == 2) {
                        $app1 = '<span style="color: red;">Revisi Pengajuan</span>';
                    }  else if (response.APPRV_ATASAN == 1) {
                        $app1 = 'Pengajuan di Terima'
                    } else {
                        $app1 = null;
                    }
                   
                    hideIfNullOrEmpty('approval_Atasan', $app1);
                    if (response.REJECT_BY == 3) {
                        $app2 = '<span style="color: red;">Reject Pengajuan</span>';
                    }  else if (response.REVISI_BY == 3) {
                        $app2 = '<span style="color: red;">Revisi Pengajuan</span>';
                    } else if (response.APPRV_HR == 1) {
                        $app2 = 'Pengajuan di Terima'
                    } else {
                        $app2 = null;
                    }
             
                    hideIfNullOrEmpty('approval_HR', $app2);
                    if (response.REJECT_BY == 4) {
                        $app3 = '<span style="color: red;">Reject Pengajuan</span>';
                    }  else if (response.REVISI_BY == 4) {
                        $app3 = '<span style="color: red;">Revisi Pengajuan</span>';
                    } else if (response.APPRV_HR_MNG == 1) {
                        $app3 = 'Pengajuan di Terima'
                    } else {
                        $app3 = null;
                    }
   
                    hideIfNullOrEmpty('approval_HR_MNG', $app3);
                    if (response.REJECT_BY == 5) {
                        $app4 = '<span style="color: red;">Reject Pengajuan</span>';
                    }  else if (response.REVISI_BY == 5) {
                        $app4 = '<span style="color: red;">Revisi Pengajuan</span>';
                    } else if (response.APPRV_DRC == 1) {
                        $app4 = 'Pengajuan di Terima'
                    } else {
                        $app4 = null;
                    }
                    
                    hideIfNullOrEmpty('approval_DRC', $app4);
                    hideIfNullOrEmpty('ket_Atasan', response.KETERANGAN_ATASAN);
                    hideIfNullOrEmpty('ket_HR', response.KETERANGAN_HR);
                    hideIfNullOrEmpty('ket_HR_MNG', response.KETERANGAN_HR_MNG);
                    hideIfNullOrEmpty('ket_DRC', response.KETERANGAN_DRC);
                    hideIfNullOrEmpty('upd_Atasan', response.UPDATE_AT_ATASAN);
                    hideIfNullOrEmpty('upd_HR', response.UPDATE_AT_HR);
                    hideIfNullOrEmpty('upd_HR_MNG', response.UPDATE_AT_HR_MNG);
                    hideIfNullOrEmpty('upd_DRC', response.UPDATE_AT_DRC);

                    $('#viewPelatihanModal').modal('show');
                },
                error: function(error) {
              
                }
            });
        });

    </script>
   

@endsection

