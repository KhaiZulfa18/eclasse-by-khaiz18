
function updateLevel(id_user,noPage,name){
	$("#update-level-modal").modal('toggle');
	$("#update-level-modal").modal('show');
	$("#modal-title").html("Change "+name+" Level?");
	$('#id_user').val(id_user);
	$('#pageno').val(noPage);
}

$('#btnUpdateLevel').click(function() {
	var level = $('#level').val();
	var id_user = $('#id_user').val();
	var pageno = $('#pageno').val();
	if(pageno.length==0){
		var pageno = 1;
	}

	var form_data = new FormData();

	form_data.append('id_user',id_user);
	form_data.append('level',level);

	$.ajax({
		type: "POST",		
		url: base_url+'home/update_level',
		data : form_data,
		processData : false,
		contentType : false,
		dataType : "json", 
		cache : false,
		beforeSend: function (){
			$("#btnUpdateLevel").prop('disabled', true);
			$("#btnDismiss").prop('disabled', true);
		},
		success: function(response) {
			if (response.status=='gagal') {
				$("#attention-update").html(response.pesan);
			}else{
				// $("#attention-update").html(response.pesan);
				$("#update-level-modal").modal('hide');
				$("#btnUpdateLevel").prop('disabled', false);
				$("#btnDismiss").prop('disabled', false);
				$('#id_user').val('');
				$('#pageno').val('');
				getData(pageno);
			}
		}
	});
});