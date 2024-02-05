@extends('include/mainlayout')
@section('title', 'Pasca-ADMP')
@section('content')
    <div class="pagetitle">
      <h1>Pasca-ADMP</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Pasca-ADMP</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i> Pasca-ADMP</h5>
              <button type="button" class="btn bi bi-plus btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#praadmpModal"> Add Pasca ADMP</button>
              <br><br>

              <!-- Modal View -->
                <div class="modal fade modal-view" id="viewPraadmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-6" id="btn-view">View ADMP</h1>
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
                                        <label for="ringkasan">Ringkasan HASIL ADMP: </label>
                                        <span id="ringkasan"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="file">File:</label>
                                        <span id="file"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="file">Created by:</label>
                                        <span id="created"></span>
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

              <!-- Modal Add -->
                <div class="modal fade modal_add" id="praadmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mode="add">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="btn-add">Add Pasca admp</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       
                        <input type="hidden" name="id" id="id" />

                        <form class="row g-3 needs-validation" method="POST" action="/praadmp/create"  enctype="multipart/form-data">
                        @csrf
                            <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control" id="nrp-dropdown" name="nrp-dropdown">
                                    <option value="" selected>Select NRP</option>
                                    @foreach ($nrpOptions as $nrp)
                                        <option value="{{ $nrp->nrp }}">{{ $nrp->nrp }}</option>
                                    @endforeach
                                </select>
                                <label for="nrp">NRP <span style="color:red">*</span></label>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" disabled class="form-control" id="name-add" name="name-add" placeholder="Name">
                                <label for="message-text">Nama </label>  
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" disabled class="form-control" id="jabatan-add" name="jabatan-add" placeholder="Jabatan">
                                <label for="message-text">Jabatan </label>
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" disabled class="form-control" id="departemen-add" name="departemen-add" placeholder="Password">
                                <label for="message-text">Departemen </label>
                            </div>
                            </div>
                             <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" disabled class="form-control" id="perusahaan-add" name="perusahaan-add" placeholder="Password">
                                <label for="message-text">Perusahaan</label>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Address" id="ringkasan_admp" name="ringkasan_admp" style="height: 200px;"></textarea>
                                <label for="message-text">Ringkasan Hasil ADMP </span></label>
                            </div>
                            </div>
                           <div class="form-group">
                                <label for="file">Pilih File</label>
                                <input type="file" class="form-control" name="file" id="file" required>
                            </div>
                             
                         </form>             
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-yes-add">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
              {{-- End Modal Add --}}

              <!-- Modal Edit -->
                <div class="modal fade modal_edit" id="editpraadmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mode="edit">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="btn-add">Edit Pasca ADMP</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        

                        <form class="row g-3 needs-validation" id="formedit" action="/praadmp/myedit/{id}"  enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                            <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control" id="nrp-dropdown-edit" name="nrp-dropdown-edit">
                                    <option value="" selected>Select NRP</option>
                                    @foreach ($nrpOptions as $nrp)
                                        <option value="{{ $nrp->nrp }}">{{ $nrp->nrp }}</option>
                                    @endforeach
                                </select>
                                <label for="nrp">NRP <span style="color:red">*</span></label>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" readonly class="form-control" id="name-edit" name="name-edit" placeholder="Name">
                                <label for="message-text">Nama </label>  
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" disabled class="form-control" id="jabatan-edit" name="jabatan-edit" placeholder="Jabatan">
                                <label for="message-text">Jabatan </label>
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" disabled class="form-control" id="departemen-edit" name="departemen-edit" placeholder="Password">
                                <label for="message-text">Departemen </label>
                            </div>
                            </div>
                             <div class="col-md-4">
                             <div class="form-floating">
                                <input type="text" disabled class="form-control" id="perusahaan-edit" name="perusahaan-edit" placeholder="Password">
                                <label for="message-text">Perusahaan</label>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Address" id="ringkasan_admp_edit" name="ringkasan_admp_edit" style="height: 200px;"></textarea>
                                <label for="message-text">Ringkasan Hasil ADMP </span></label>
                            </div>
                            </div>
                           <div class="form-group">
                                <label for="file">Pilih File</label>
                                <input type="file" class="form-control" name="file_edit" id="file_edit" required>
                            </div> 
                         </form>             
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-yes-edit">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
              {{-- End Modal Add --}}
   
              <!-- Table with stripped rows -->
              <div class="container">
              <table class="table dt_admp" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Departemen</th>
                    <th scope="col" style= "width: 100px;">Perusahaan</th>
                    <th scope="col" style= "width: 200px;" >Ringkasan ADMP</th>
                    <th scope="col">File</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                {{-- //sekar --}}
                @foreach($praadmpData as $no => $praadmp)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $praadmp->nrp }}</td>
                    <td>{{ $praadmp->username}}</td>
                    <td>{{ $praadmp->departemen}}</td>
                    <td>{{ $praadmp->perusahaan}}</td>
                    <td class="truncate-text">{{ $praadmp->ringkasan }}</td>
                     <td>
                        <a class="btn bi bi-file-earmark-text-fill text-primary" href="{{ asset($praadmp->file_path) }}" target="_blank">
                        </a>
                    </td>
                    <td>  
                        <div class="dropdown">
                        <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu"> 
                            <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewPraadmpModal" data-id="{{ $praadmp->id }}"><i class="fa fa-expand"></i>View</a></li> 
                            <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#editpraadmpModal" data-id="{{ $praadmp->id }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                            <li><a class="dropdown-item delete" href="#" data-id="{{ $praadmp->id }}"><i class="fa-solid fa-trash"></i>Delete</a></li>        
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
    </div>

  
    {{-- <script src="app/javascript/admp.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
        $('#datatable').DataTable();});
    </script>

<script>

//VIEW sekar
var admpId; 
$('.view').click(function() {
    admpId = $(this).data('id');
     $('#viewPraadmpModal').attr('data-mode', 'edit');
    
    $.ajax({
        type: 'GET',
        url: '{{ url('/praadmp/get') }}/' + admpId,
        success: function(response) {
            $('#viewPraadmpModal').find('#nrp').text(response.nrp);
            $('#viewPraadmpModal').find('#name').text(response.name);
            $('#viewPraadmpModal').find('#jabatan').text(response.jabatan);
            $('#viewPraadmpModal').find('#departemen').text(response.departemen);
            $('#viewPraadmpModal').find('#perusahaan').text(response.perusahaan);
            $('#viewPraadmpModal').find('#ringkasan').text(response.ringkasan);
            $('#viewPraadmpModal').find('#created').text(response.created_name);
            //$('#viewPraadmpModal').find('#file').text(response.file_path);
            $('#viewPraadmpModal').find('#file').html('<a href="' + response.file_path + '" target="_blank" class="btn bi bi-file-earmark-text-fill text-primary"></a>');


    
            $('#viewPraadmpModal').modal('show');
        },
        error: function(error) {
            // Tampilkan pesan kesalahan jika diperlukan
        }
    });
});

$(document).ready(function() {

    $('#nrp-dropdown').on('change', function() {
        var selectedNrp = $(this).val();
    
        $.ajax({
            type: 'POST',
            url: '/praadmp/get_user_info',
            data: { nrp: selectedNrp, _token: '{{ csrf_token() }}' },
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

    $('#nrp-dropdown-edit').on('change', function() {
        var selectedNrp = $(this).val();
    
        $.ajax({
            type: 'POST',
            url: '/praadmp/get_user_info',
            data: { nrp: selectedNrp, _token: '{{ csrf_token() }}' },
            success: function(response) {
    
                $('#name-edit').val(response.nama);
                $('#jabatan-edit').val(response.jabatan);
                $('#departemen-edit').val(response.departemen);
                $('#perusahaan-edit').val(response.perusahaan);
            },
            error: function(error) {
                console.log('Ajax Error:', error);
            }
        });
    });
});

//EDIT
var admpId; 
$('.edit').click(function() {
    admpId = $(this).data('id');
    
    
    $.ajax({
        type: 'GET',
        url: '{{ url('/praadmp/get') }}/' + admpId,
        success: function(response) {
           
            $('#editpraadmpModal').find('#nrp-dropdown-edit').val(response.nrp);
            $('#editpraadmpModal').find('#name-edit').val(response.name);
            $('#editpraadmpModal').find('#jabatan-edit').val(response.jabatan);
            $('#editpraadmpModal').find('#departemen-edit').val(response.departemen);
            $('#editpraadmpModal').find('#perusahaan-edit').val(response.perusahaan);
            $('#editpraadmpModal').find('#ringkasan_admp_edit').val(response.ringkasan);
            $('#editpraadmpModal').find('#file_edit').val(response.file_path);
           
            $('#editpraadmpModal').modal('show');
        },
        error: function(error) {
            // Tampilkan pesan kesalahan jika diperlukan
        }
    });
});

//Tambah
$(document).ready(function() {
    $('#btn-yes-add').click(function() {
        var mode = $('#praadmpModal').data('mode');
        var formData = new FormData($('form')[0]);
        //formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                type: 'POST',
                url: '{{ url('/praadmp/create') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'ADMP berhasil di tambahkan!',
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'ADMP gagal di tambahkan.',
                        });
                    }
                },
            });
        $('#praadmpModal').modal('hide');
    });
});

//EDIT
$(document).ready(function() {
    $('#btn-yes-edit').click(function() {
        var formDataEdit = new FormData(document.getElementById('formedit'));
        formDataEdit.append('_method', 'PUT');  // Tambahkan metode PUT secara eksplisit

        $.ajax({
            type: 'POST', // Ubah menjadi POST karena method tunneling (PUT) pada umumnya dilakukan melalui POST
            url: '{{ url('/praadmp/myedit') }}/' + admpId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formDataEdit,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'ADMP berhasil di edit!',
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'ADMP gagal di edit.',
                    });
                }
            },
            error: function(error) {
                console.log('Ajax Error:', error);
            }
        });

        $('#editpraadmpModal').modal('hide');
    });
});


document.querySelectorAll('.delete').forEach(function(link) {
   link.addEventListener('click', function(event) {
       event.preventDefault();
       var praadmpId = this.getAttribute('data-id');

       Swal.fire({
           title: 'Konfirmasi',
           text: 'Apakah Anda yakin akan menghapus data ini?',
           icon: 'warning',
           showCancelButton: true,
           confirmButtonText: 'Ya, Kirim!',
           cancelButtonText: 'Batal'
       }).then((result) => {
           if (result.isConfirmed) {
               axios.post('{{ route('delete.praadmp') }}', {
                   praadmp_id: praadmpId
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

</script>

@endsection


