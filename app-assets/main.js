
    var urls = BASE_URL + funct + '/get_list';
    var url_add = BASE_URL + funct + '/form';
    var url_delete = BASE_URL + funct + '/delete';
	
	function myForm()
	{
		window.location.href = url_add;
	}

	function myForm_edit(param)
	{
		window.location.href = BASE_URL + funct + '/form_edit/' + param;;
	}

    $(document).ready(function () {
			
        $("#main-table")
            .DataTable({
                scrollY: true,
                responsive: false,
                lengthChange: false,
                autoWidth: false,
                serverSide: true,
                processing: true,
                // "order": [[ 3, "desc" ]],
                paging: true,
                searching: {
                    regex: true
                },
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"],
                ],
                columnDefs: [
                    { orderable: false, searchable: false, targets: -1 },
                    { "width": "100px", "targets": 0 }
                ],
				dom:
				'<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                pageLength: 10,
                ajax: {
                    url: urls,
                    type: "POST",
                },
            })
    });

	function btn_save() {
// alert('tes');
		if ($("#status_form").val() == 0) {
			var link = BASE_URL + funct + '/add';
		} else {
			var id = $("#id").val();
			var link = BASE_URL + funct + '/edit/' + id;
		}
		// var form = new FormData($('#form-main')[0]);
		// console.log(form);
		$.ajax({
			type: "post",
			url: link,
			data: new FormData($('#form-main')[0]),
			processData: false,
			contentType: false,
			cache: false,
			dataType: "json",
			success: function (data) {
				if (data.error == false) {
					
					$('#btn-save').prop('disabled', true);
					toastr.success(data.msg, 'Sukses!', {
						timeOut: 2000,
                        progressBar: true,
                        allowHtml: true,
                        closeButton: true,
                        tapToDismiss: false,
						onHidden: function() {
							window.location.href = BASE_URL + funct;
						}
                    })
				} else {
					toastr.error(data.msg, 'Error!', {
                        progressBar: true,
                        allowHtml: true,
                        closeButton: true,
                        tapToDismiss: false
                    });
				}
			},
			error: function (xhr, status, errorThrown) {
				error_ajax(xhr.status);
			}
	
		});
	}

    function btn_delete(param) {
        swal.fire({
            title: "Hapus data?",
            text: "Data yang terhapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus",
        })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url_delete,
                        type: "POST",
                        data: {
                            id: param,
                        },
                        success: function (result) {
                            reload_table();
                            swal.fire({
                                title: "Sukses",
                                text: "Sukses menghapus data..",
								icon: "success",
                                showConfirmButton: false,
                                confirmButtonText: false,
                                timer: 2000,
                            });
                        },
                        error: function (xhr, Status, err) {
                            $("Terjadi error : " + Status);
                        },
                    });
                } else {
                    return false;
                }
            });
    }

    function reload_table() {
		
        $("#main-table").DataTable().ajax.reload(); //reload datatable ajax
		
    }

	function error_ajax(status) {
		var message;
		var statusErrorMap = {
			'400': "Server understood the request, but request content was invalid.",
			'401': "Unauthorized access.",
			'403': "Forbidden resource can't be accessed.",
			'404': "The page you requested was not found.",
			'500': "Internal server error.",
			'503': "Service unavailable."
		};
		if (status) {
			message = statusErrorMap[status];
			if (!message) {
				message = "Unknown Error \n.";
			}
		} else if (exception == 'parsererror') {
			message = "Error.\nParsing JSON Request failed.";
		} else if (exception == 'timeout') {
			message = "Request Time out.";
		} else if (exception == 'abort') {
			message = "Request was aborted by the server";
		} else {
			message = "Unknown Error \n.";
		}
		alert(message)
		// swal.fire("Error Message", message, "error");
	}
