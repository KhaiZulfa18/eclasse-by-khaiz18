$(document).ready(function(){
	getData(1);
});

$('#gender').change(function(){
	getData(1);
});

$('#status').change(function(){
	getData(1);
});

$('#search').change(function(){
	getData(1);
});

function getData(pageno){
	
	var search = $('#search').val();
	var gender = $('#gender').val();
	var status = $('#status').val();

	$.ajax({
		type: 'POST',
		url: base_url+'home/get_member',
		data: {
			gender: gender,
			status: status,
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
	var gender = $('#gender').val();
	var status = $('#status').val();

	$.ajax({
		type: 'POST',
		url: base_url+'home/paging_member',
		data: {
			gender: gender,
			status: status,
			search: search,
			page: pageno
        },
		success: function(data) {
			$("#paging").html(data);
		}
	});
}

function deleteData(id_user,noPage,name){
	$("#delete-modal").modal('toggle');
	$("#delete-modal").modal('show');
	$("#delete-text").html("<h6>Are you sure delete "+name+"?</h6>");
	$('#id_user').val(id_user);
	$('#pageno').val(noPage);
}

$('#btnDelete').click(function() {
	var id_user = $('#id_user').val();
	var pageno = $('#pageno').val();
	if(pageno.length==0){
		var pageno = 1;
	}

	$.ajax({
		type: "POST",		
		url: base_url+'home/delete_member',
		data: {
			id_user: id_user
		},
		beforeSend: function (){
            $("#btnDelete").prop('disabled', true);
            $("#btnDismiss").prop('disabled', true);
        },
		success: function() {
			$("#delete-modal").modal('hide');
			$("#btnDelete").prop('disabled', false);
			$("#btnDismiss").prop('disabled', false);
			$('#id_user').val('');
			$('#pageno').val('');
			getData(pageno);
		}
	});
});