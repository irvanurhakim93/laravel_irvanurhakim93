<script>
    $('body').on('click', '#btn-hapus-rs', function(){

        let rs_id = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: 'anda ingin menghapus data ini ?',
            icon: 'warning',
            showCancelButton: true,
            cancelButton: 'TIDAK',
            confirmButton: 'Hapus saja'
        }).then((result) => {
            if(result.isConfirmed){
                console.log('test');

                $.ajax({
                    url : '/${id}',
                    type : "DELETE",
                    cache : false,
                    data : {
                        "_token" : token
                    },

                    success:function(response){
                        Swal.fire({
                            type: 'success',
                            icon : 'success',
                            title : `${response.message}`,
                            shoConfirmButton : false,
                            timer : 3000
                        });

                        $(`#`)
                    }
                })

            }
        })

    })
</script>