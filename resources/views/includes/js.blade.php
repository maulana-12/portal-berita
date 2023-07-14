<!--   Core JS Files   -->
<script src="{{ asset('back/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('back/js/core/popper.min.js') }}"></script>
<script src="{{ asset('back/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('back/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('back/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('back/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


<!-- Chart JS -->
<script src="{{ asset('back/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('back/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('back/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('back/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('back/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('back/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('back/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('back/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Atlantis JS -->
<script src="{{ asset('back/js/atlantis.min.js') }}"></script>

<!-- Datatables Category -->
<script >
	$(document).ready(function() {
		
		$('#category').DataTable({
			"pageLength": 5,
		});

		var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

		$('#addRowButton').click(function() {
			$('#category').dataTable().fnAddData([
				$("#addName").val(),
				$("#addSlug").val(),
				action
				]);
			$('#addRowModal').modal('hide');

		});
	});

	$('.deleteCategory').click(function(e) {
		e.preventDefault();

		var catId=$(this).attr('data-id');
		var catName=$(this).attr('data-name');
		var url = "{{ route('category.destroy', '') }}" + "/"+catId;

		swal({
			title: 'Apakah anda yakin?',
			// text: "Anda akan menghapus data <b>"+catName+"</b>"	,
			type: 'warning',
			buttons:{
				confirm: {
					text : 'Ya, hapus!',
					className : 'btn btn-warning'
				},
				cancel: {
					visible: true,
					className: 'btn btn-primary'
				}
			},
			content: {
				element: "span",
				attributes: {
					innerHTML: "Anda akan menghapus data <strong>" + catName + "</strong>",
					className: "text-bold"
				}
			}
		}).then((Delete) => {
			if (Delete) {
				$.ajax({
					url:url,
					type:'POST',
					data:{
						"_method": "DELETE",
						"_token": "{{ csrf_token() }}"
					},
					success: function (response) {
						swal({
							title: 'Berhasil!',
							// text: 'Data '+catName+' dihapus.',
							type: 'success',
							buttons : {
								confirm: {
									className : 'btn btn-success'
								}
							},
							content: {
								element: "span",
								attributes: {
									innerHTML: 'Data <strong>'+catName+'</strong> dihapus.',
									className: "text-bold"
								}
							}
						}).then(function() {
							// Refresh halaman setelah penghapusan data
							location.reload();
						});
					},
					error:function (xhr) {
						swal('Error','Terjadi kesalahan saat menghapus data.', 'error');
					}
				});
			} else {
				swal.close();
			}
		});
	});

	$('.deleteArticle').click(function(e) {
		e.preventDefault();

		var catId=$(this).attr('data-id');
		var catName=$(this).attr('data-name');
		var url = "{{ route('article.destroy', '') }}" + "/"+catId;

		swal({
			title: 'Apakah anda yakin?',
			// text: "Anda akan menghapus data <b>"+catName+"</b>"	,
			type: 'warning',
			buttons:{
				confirm: {
					text : 'Ya, hapus!',
					className : 'btn btn-warning'
				},
				cancel: {
					visible: true,
					className: 'btn btn-primary'
				}
			},
			content: {
				element: "span",
				attributes: {
					innerHTML: "Anda akan menghapus data <strong>" + catName + "</strong>",
					className: "text-bold"
				}
			}
		}).then((Delete) => {
			if (Delete) {
				$.ajax({
					url:url,
					type:'POST',
					data:{
						"_method": "DELETE",
						"_token": "{{ csrf_token() }}"
					},
					success: function (response) {
						swal({
							title: 'Berhasil!',
							// text: 'Data '+catName+' dihapus.',
							type: 'success',
							buttons : {
								confirm: {
									className : 'btn btn-success'
								}
							},
							content: {
								element: "span",
								attributes: {
									innerHTML: 'Data <strong>'+catName+'</strong> dihapus.',
									className: "text-bold"
								}
							}
						}).then(function() {
							// Refresh halaman setelah penghapusan data
							location.reload();
						});
					},
					error:function (xhr) {
						swal('Error','Terjadi kesalahan saat menghapus data.', 'error');
					}
				});
			} else {
				swal.close();
			}
		});
	});

	$('.deletePlaylist').click(function(e) {
		e.preventDefault();

		var catId=$(this).attr('data-id');
		var catName=$(this).attr('data-name');
		var url = "{{ route('playlist.destroy', '') }}" + "/"+catId;

		swal({
			title: 'Apakah anda yakin?',
			// text: "Anda akan menghapus data <b>"+catName+"</b>"	,
			type: 'warning',
			buttons:{
				confirm: {
					text : 'Ya, hapus!',
					className : 'btn btn-warning'
				},
				cancel: {
					visible: true,
					className: 'btn btn-primary'
				}
			},
			content: {
				element: "span",
				attributes: {
					innerHTML: "Anda akan menghapus data <strong>" + catName + "</strong>",
					className: "text-bold"
				}
			}
		}).then((Delete) => {
			if (Delete) {
				$.ajax({
					url:url,
					type:'POST',
					data:{
						"_method": "DELETE",
						"_token": "{{ csrf_token() }}"
					},
					success: function (response) {
						swal({
							title: 'Berhasil!',
							// text: 'Data '+catName+' dihapus.',
							type: 'success',
							buttons : {
								confirm: {
									className : 'btn btn-success'
								}
							},
							content: {
								element: "span",
								attributes: {
									innerHTML: 'Data <strong>'+catName+'</strong> dihapus.',
									className: "text-bold"
								}
							}
						}).then(function() {
							// Refresh halaman setelah penghapusan data
							location.reload();
						});
					},
					error:function (xhr) {
						swal('Error','Terjadi kesalahan saat menghapus data.', 'error');
					}
				});
			} else {
				swal.close();
			}
		});
	});
</script>


<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor1' );
</script>