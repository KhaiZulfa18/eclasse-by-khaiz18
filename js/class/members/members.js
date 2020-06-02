$(document).ready(function(){
	getData(1);
});

$('#search').change(function(){
	getData(1);
});

function getData(pageno){
	
	var search = $('#search').val();

	$.ajax({
		type: 'POST',
		url: base_url+'classes/get_members',
		data: {
			search: search,
			page: pageno
        },
        beforeSend: function (){
			$("#tabel-data").LoadingOverlay("show");
        },
		success: function(data) {
			$("#tabel-data").LoadingOverlay("hide", true);
			$('#tabel-data').html(data);
			paging(pageno);
		}
	});
}

function paging(pageno){

	var search = $('#search').val();
	// var gender = $('#gender').val();
	// var status = $('#status').val();

	$.ajax({
		type: 'POST',
		url: base_url+'classes/paging_members',
		data: {
			// gender: gender,
			// status: status,
			search: search,
			page: pageno
        },
		success: function(data) {
			$("#paging").html(data);
		}
	});
}