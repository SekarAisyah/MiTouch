$(document).ready(function(){
    init();
    // loadData(null);
});

/*-------------------------------------------
 * INIT
 *-----------------------------------------*/
function init(){
    var table = '.dt_pelatihan';
    var action = 'pelatihan';
    
    var url = action+'/'

    //TAMBAH
    $('#btn-add').click(function() {

        modal = '.modal_add';
        $(modal+" #action_flag").val('A');
        $(modal).modal('show');
    }); 

    var form = '.form_add'
    var pesan_error = $("#pesan_error").val();


    $('#btn-yes-add').click(function(){
        $(form).submit();
    });

    $( form ).validate({
        rules: {
      
        },
        messages: {
            id_pelatihan: {
                required: "There is something wrong with id pelaporan, please call administrator"
            },
        },
        
        //display error alert on form submit
        invalidHandler: function(event, validator) {
            swal.fire({
                "title": "",
                "text": pesan_error,
                "type": "error",
                "confirmButtonClass": "btn btn-secondary",
                "onClose": function(e) {
                    console.log('on close event fired!');
                }
            });

            event.preventDefault();
            // $(form).attr('action',''+action+'/add');
        },

        submitHandler: function (event) {
            $.ajax({
                url : url,
                type: "POST",
                dataType: "json",
                data : {
                    "id": $(form+" #id").val(),
                    "action_flag" : $(form+" #action_flag").val(),
                    "jenis_pelatihan" : $(form+" #jenis_pelatihan").val(),
                    "nama_pelatihan" : $(form+" #nama_pelatihan").val(),
                    "informasi_pelatihan" : $(form+" #informasi_pelatihan").val(),
                    "narasumber" : $(form+" #narasumber").val(),
                    "alasan_pelatihan" : $(form+"#alasan_pelatihan").val(),
                    "sharing_pelatihan" : $(form+"#sharing_pelatihan").val(),
                    "waktu_pelatihan" : $(form+" #waktu_pelatihan").val(),
                    "tempat_pelatihan" : $(form+" #tempat_pelatihan").val(),
                    "biaya_pelatihan" : $(form+" #biaya_pelatihan").val(),
                

                },
                success: function(response, textStatus, jqXHR)
                {

                    action_flag = $(form+" #action_flag").val();

                    if(response.status == 1 && action_flag == 'E'){
                        var pesan_action = pesan_berhasil_edit
                    }else if(response.status == 0 && action_flag == 'E'){
                        var pesan_action = pesan_gagal_edit
                    }

                    if(response.status == 1 && action_flag == 'A'){
                        var pesan_action = pesan_berhasil_simpan
                    }else if (response.status == 0 && action_flag == 'A'){
                        var pesan_action = pesan_gagal_simpan
                    }

                    swal.fire({
                        title: pesan_selesai,
                        text: pesan_action,
                        type: response.type,
                        "confirmButtonClass": "btn-finish"
                    })

                    $('.btn-finish').click(function() {
                        $(modal).modal('hide');
                        $(table).DataTable().ajax.reload();
                    });

                }
            });
        }
    });

}