@extends('include/mainlayout')
@section('title', 'kompetensi')
@section('content')
    <div class="pagetitle">
      <h1>Kompetensi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Kompetensi</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i> Kompetensi</h5>
              <button type="button" class="btn bi bi-plus btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kompetensiModal"> Add Kompetensi</button>
              <br><br>

              <!-- Modal View -->
                <div class="modal fade modal-view" id="viewKompetensiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-6" id="btn-view">View Kompetensi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="kompetensi-details">
                                    <div class="detail">
                                        <label for="kode">KODE :</label>
                                        <span id="kode"></span>
                                    </div>
                                    <div class="detail">
                                        <label for="name-view">Nama :</label>
                                        <span id="name-view"></span>
                                    </div>
                                    {{-- <div class="detail">
                                        <label for="harga">Harga :</label>
                                        <span id="harga"></span>
                                    </div> --}}
                                    <div class="detail">
                                        <label for="kompetensi">Kompetensi :</label>
                                        <span id="kompetensi"></span>
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
                <div class="modal fade modal_add" id="kompetensiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mode="add">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="btn-add">Add Kompetensi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <form class="row g-3 needs-validation" method="POST" action="/kompetensi/create">
                        @csrf
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="kode" name="kode" placeholder="Name">
                                <label for="message-text">Kode </label>  
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Name">
                                <label for="message-text">Nama </label>  
                            </div>
                            </div>
                            {{-- <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Name">
                                <label for="message-text">Harga </label>  
                            </div>
                            </div> --}}
                             <div class="col-md-12">
                             <div class="form-floating">
                                <input type="text" class="form-control" id="kompetensi" name="kompetensi" placeholder="Email">
                                <label for="message-text">Kompetensi </label>
                            </div>
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
              
              <!-- Table with stripped rows -->
              <div class="container">
              <table class="table dt_kompetensi" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    {{-- <th scope="col">Harga</th> --}}
                    <th scope="col">Kompetensi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                {{-- //sekar --}}
                @foreach($kompetensiData as $no => $kompetensi)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $kompetensi->KODE }}</td>
                    <td>{{ $kompetensi->NAMA }}</td>
                    {{-- <td>{{ $kompetensi->HARGA }}</td> --}}
                    <td>{{ $kompetensi->KOMPETENSI}}</td>
                    <td>  
                    <div class="dropdown">
                    <a class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item view" href="#" data-bs-toggle="modal" data-bs-target="#viewKompetensiModal" data-id="{{ $kompetensi->PID }}"><i class="fa fa-expand"></i>View</a></li>
                        <li><a class="dropdown-item edit" href="#" data-bs-toggle="modal" data-bs-target="#kompetensiModal" data-id="{{ $kompetensi->PID }}"><i class="fa-regular fa-pen-to-square"></i>Edit</a></li>
                        <li><a class="dropdown-item delete" href="#" data-id="{{ $kompetensi->PID }}"><i class="fa-solid fa-trash"></i>Delete</a></li>              
                    </ul>
                
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
  
    {{-- <script src="app/javascript/user.js"></script> --}}
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
var kompetensiId; 
$('.view').click(function() {
    kompetensiId = $(this).data('id');
     $('#viewKompetensiModal').attr('data-mode', 'edit');
    
    $.ajax({
        type: 'GET',
        url: '{{ url('/kompetensi/get') }}/' + kompetensiId,
        success: function(response) {
            $('#viewKompetensiModal').find('#kode').text(response.KODE);
            $('#viewKompetensiModal').find('#name-view').text(response.NAMA);
            // $('#viewKompetensiModal').find('#harga').text(response.HARGA);
            $('#viewKompetensiModal').find('#kompetensi').text(response.KOMPETENSI);

    
            $('#viewKompetensiModal').modal('show');
        },
        error: function(error) {
            
        }
    });
});

//EDIT
var kompetensiId; 
$('.edit').click(function() {
    kompetensiId = $(this).data('id');
    $('#kompetensiModal').attr('data-mode', 'edit');
    
    $.ajax({
        type: 'GET',
        url: '{{ url('/kompetensi/get') }}/' + kompetensiId,
        success: function(response) {
          
            $('#kompetensiModal').find('#kode').val(response.KODE);
            $('#kompetensiModal').find('#nama').val(response.NAMA);
            // $('#kompetensiModal').find('#harga').val(response.HARGA);
            $('#kompetensiModal').find('#kompetensi').val(response.KOMPETENSI);
            
            // Set selected option in the dropdown
            setDropdownSelected('#id_role', response.id_role);

            $('#kompetensiModal').modal('show');
        },
        error: function(error) {
        }
    });
});

function setDropdownSelected(selector, value) {
    $(selector).val(value);
    $(selector + ' option').filter(function() {
        return $(this).val() == value;
    }).prop('selected', true);
}

$(document).ready(function() {
$('#btn-yes-add').click(function() {
    var mode = $('#kompetensiModal').data('mode');
    
    if (mode === 'add') {
        $.ajax({
            type: 'POST',
            url: '{{ url('/kompetensi/create') }}',
            data: $('form').serialize(),
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'kompetensi berhasil di tambahkan!',
                    }).then(() => {
                       location.reload()
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'kompetensi gagal di tambahkan.',
                    });
                }
            },
        });
    } else if (mode === 'edit') {  
        $.ajax({
            type: 'POST',
            url: '{{ url('/kompetensi/myedit') }}/' + kompetensiId,
            data: $('form').serialize() + '&kompetensi_id=' + kompetensiId,
            success: function(response) {
                if (response.status === 'success') {
                    // Display a SweetAlert success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'kompetensi berhasil di edit!',
                    }).then(() => {
                        location.reload()
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'kompetensi gagal di edit.',
                    });
                }
            },
        });
    }

    $('#kompetensiModal').modal('hide');
    
});
});

//DELETE
document.querySelectorAll('.delete').forEach(function(link) {
   link.addEventListener('click', function(event) {
       event.preventDefault();
       var kompetensiId = this.getAttribute('data-id');

       Swal.fire({
           title: 'Konfirmasi',
           text: 'Apakah Anda yakin akan menghapus data ini?',
           icon: 'warning',
           showCancelButton: true,
           confirmButtonText: 'Ya, Kirim!',
           cancelButtonText: 'Batal'
       }).then((result) => {
           if (result.isConfirmed) {
               axios.post('{{ route('delete.kompetensi') }}', {
                   kompetensi_id: kompetensiId
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





    </script>
   

@endsection

