$(function () {
    $('.table').DataTable({
        "language": {
            "oPaginate": {
                "sFirst": "<i class='fas fa-chevron-double-left'></i>",
                "sPrevious": "<i class='fas fa-chevron-left'></i>",
                "sNext": "<i class='fas fa-chevron-right'></i>",
                "sLast": "<i class='fas fa-chevron-double-right'></i>"
            }
        }
    });
    $('.datepicker').datepicker();
    bsCustomFileInput.init();

    // Delete Button
    $(document).on('click', '.delete-button', function (e) {
        Swal.fire({
            title: 'Apa anda yakin?',
            text: "Data tidak bisa dikembalikan lagi setelahnya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            reverseButtons: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return $.ajax({
                    url: $(this).data('url'),
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "_method": 'DELETE',
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (val) {
                        return val;
                        console.log(val);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        Swal.showValidationMessage(
                            `Gagal: ${xhr.responseJSON.message || "Data Gagal Dihapus"}`
                        );
                        console.log(xhr.responseText, ajaxOptions, thrownError);
                        window.location.href = $(this).data('url-callback');
                    }
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Sukses!',
                    'Data berhasil dihapus',
                    'success'
                )
                window.location.href = $(this).data('url-callback');
            }
        })
    })

    // Preview Image
    function previewImage() {
        document.getElementById("foto-preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("foto-source").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("foto-preview").src = oFREvent.target.result;
        };
    };
})

