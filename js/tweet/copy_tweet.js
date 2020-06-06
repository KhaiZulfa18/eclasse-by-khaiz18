var clipboard = new ClipboardJS('.copy-button');

clipboard.on('success', function(e) {
	toastCopy();
});

clipboard.on('error', function(e) {
	console.log(e);
});

function toastCopy() {
	toastr["success"]("Tweet Copied")

	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-bottom-right",
		"preventDuplicates": false,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "2000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
}