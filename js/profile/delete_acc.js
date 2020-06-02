function deleteAcc(id,name){
	$("#delete-account-modal").modal('toggle');
	$("#delete-account-modal").modal('show');
	$("#delete-account-text").html("<h6>Are you sure delete account "+name+"?</h6>");
	$('#id_account').val(id);
}

$('#btnDeleteAcc').click(function() {
	var id = $('#id_account').val();

	$.ajax({
		type: "POST",		
		url: base_url+'profile/delete_account',
		data: {
			id: id
		},
		beforeSend: function (){
            $("#btnDeleteAcc").prop('disabled', true);
            $("#btnDismissAcc").prop('disabled', true);
        },
		success: function() {
			$("#delete-account-modal").modal('hide');
			$("#btnDeleteAcc").prop('disabled', false);
			$("#btnDismissAcc").prop('disabled', false);
			$('#id_account').val('');
			location.reload();
			// getData(pageno);
		}
	});
});