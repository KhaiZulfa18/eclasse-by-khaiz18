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
		url: base_url+'info/get_notes',
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

	$.ajax({
		type: 'POST',
		url: base_url+'info/paging_notes',
		data: {
			search: search,
			page: pageno
        },
		success: function(data) {
			$("#paging").html(data);
		}
	});
}

function deleteNote(id_note,noPage){
	$("#delete-modal").modal('toggle');
	$("#delete-modal").modal('show');
	$("#delete-text").html("<h6>Are you sure delete this Note?</h6>");
	$('#id_note').val(id_note);
	$('#pageno').val(noPage);
}

$('#btnDelete').click(function() {
	var id_note = $('#id_note').val();
	var pageno = $('#pageno').val();
	if(pageno.length==0){
		var pageno = 1;
	}

	$.ajax({
		type: "POST",		
		url: base_url+'info/delete_note',
		data: {
			id_note: id_note
		},
		beforeSend: function (){
            $("#btnDelete").prop('disabled', true);
            $("#btnDismiss").prop('disabled', true);
        },
		success: function() {
			$("#delete-modal").modal('hide');
			$("#btnDelete").prop('disabled', false);
			$("#btnDismiss").prop('disabled', false);
			$('#id_note').val('');
			$('#pageno').val('');
			getData(pageno);
		}
	});
});