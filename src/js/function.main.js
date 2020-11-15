document.addEventListener('DOMContentLoaded', function () {
//  $('#cuenta').DataTable();
}, false)

function notifi(data, icon) {
	$(function () {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		})
		Toast.fire({
			icon: icon,
			title: data
		})
	})
}