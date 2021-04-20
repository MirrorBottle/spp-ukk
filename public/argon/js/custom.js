$(function () {
    // Select2
    $('.select2').select2();
    // Datatable
    $('.table-datatable').DataTable({
        "language": {
            "emptyTable":     "Data kosong",
            "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
            "infoFiltered":   "",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Tampilkan _MENU_ data",
            "loadingRecords": "Loading...",
            "processing":     "Memproses...",
            "search":         "Cari:",
            "zeroRecords":    "Tidak ada data yang ditemukan.",
            "oPaginate": {
                "sFirst": "<i class='fas fa-chevron-double-left'></i>",
                "sPrevious": "<i class='fas fa-chevron-left'></i>",
                "sNext": "<i class='fas fa-chevron-right'></i>",
                "sLast": "<i class='fas fa-chevron-double-right'></i>"
            }
        }
    });
    $('.table-minimal').DataTable({
        "paging": false,
        "bInfo": false,
        "searching": false,
        "sorting": false,
        "language": {
            "emptyTable":     "Data kosong",
            "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
            "infoFiltered":   "",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Tampilkan _MENU_ data",
            "loadingRecords": "Loading...",
            "processing":     "Memproses...",
            "search":         "Cari:",
            "zeroRecords":    "Tidak ada data yang ditemukan.",
            "oPaginate": {
                "sFirst": "<i class='fas fa-chevron-double-left'></i>",
                "sPrevious": "<i class='fas fa-chevron-left'></i>",
                "sNext": "<i class='fas fa-chevron-right'></i>",
                "sLast": "<i class='fas fa-chevron-double-right'></i>"
            }
        }
    });
    $('.datepicker-second').datepicker({
        format: 'dd-mm-yyyy',
    });
    $('.yearpicker').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
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

