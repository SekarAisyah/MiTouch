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
                <div class="modal fade modal-view" id="viewPelatihanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-6" id="btn-view">View Pelatihan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        <label for="approval_DRC">Approve Direktur:</label>
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
                                        <label for="ket_DRC">Keterangan Direktur:</label>
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
                                        <label for="upd_DRC">Update Direktur:</label>
                                        <span id="upd_DRC"> </span>
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
                      <option value="Pending Atasan">Pending Superintendent PD</option>
                      <option value="Pending HR:PD">Pending Manager</option>
                      <option value="Pending Manager">Pending Manager</option>
                      <option value="Pending Direksi">Pending Direksi</option>
                      <option value="Pending HRGA">Pending HRGA</option>
                      <option value="Revisi Atasan">Revisi Superintendent PD</option>
                      <option value="Revisi HR:PD">Revisi Manager</option>
                      <option value="Revisi Manager">Revisi Manager</option>
                      <option value="Revisi Direksi">Revisi Direksi</option>
                      <option value="Revisi HRGA">Revisi HRGA</option>
                      <option value="Aprroved">Approved</option>
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
                        <span class="badge rounded-pill text-bg-warning text-start">Revisi<br>Manager</span>
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
                    $('#viewPelatihanModal').find('#approval_Atasan').text(response.APPRV_ATASAN);
                    $('#viewPelatihanModal').find('#approval_HR').text(response.APPRV_HR);
                    $('#viewPelatihanModal').find('#approval_HR_MNG').text(response.APPRV_HR_MNG);
                    $('#viewPelatihanModal').find('#approval_DRC').text(response.APPRV_DRC);
                    $('#viewPelatihanModal').find('#ket_HR').text(response.KETERANGAN_HR);
                    $('#viewPelatihanModal').find('#ket_HR_MNG').text(response.KETERANGAN_HR_MNG);
                    $('#viewPelatihanModal').find('#ket_DRC').text(response.KETERANGAN_DRC);
                    $('#viewPelatihanModal').find('#upd_Atasan').text(response.UPDATE_ATASAN);
                    $('#viewPelatihanModal').find('#upd_HR').text(response.UPDATE_HR);
                    $('#viewPelatihanModal').find('#upd_HR_MNG').text(response.UPDATE_HR_MNG);
                    $('#viewPelatihanModal').find('#upd_DRC').text(response.UPDATE_DRC);
    
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


    </script>
   

@endsection

