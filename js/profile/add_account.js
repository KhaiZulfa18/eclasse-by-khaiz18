function addAccount(id_user){
	$("#addaccount-modal").modal('toggle');
	$("#addaccount-modal-modal").modal('show');
	// $("#delete-text").html("Add Your Social ");
	$('#id_user').val(id_user);
	// $('#pageno').val(noPage);
}

$('#btnAdd').click(function(){
	saveAccount();
});

function saveAccount() {
	var id_user = $('#id_user').val();
	var name_account = $('#name_account').val();
	var type_account = $('input[name="type_account"]:checked').val();
	var link_account = $('#link_account').val();
	
	var lanjut = true;

	var alert_danger = `<div class="alert alert-danger alert-dismissible text-left show fade">
	<div class="alert-body">
	<button class="close" data-dismiss="alert">
	<span>&times;</span>
	</button>
	Oops, tolong isi yang harus diisi! contohnya hati saya ><
	</div>
	</div>`;

	if(name_account.length==0){
		$('#attention').html(alert_danger);
		return false;
	}
	if(type_account.length==0){
		$('#attention').html(alert_danger);
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'profile/insert_account',
			data : {
				id_user:id_user,
				name_account:name_account,
				type_account:type_account,
				link_account:link_account
			},
			beforeSend: function (){
				$("#form-add-account").LoadingOverlay("show");
				$("#btnAdd").prop('disabled', true);
				$("#btnDismiss").prop('disabled', true);
			},
			success	: function(response){ 
				if(response.status=='gagal'){
					$('#attention').html(response.pesan);
					$("#form-add-account").LoadingOverlay("hide", true);
				}
				else{
					$("#form-add-account").LoadingOverlay("hide", true);
					$("#addaccount-modal").modal('hide');
					$("#btnDelete").prop('disabled', false);
					$("#btnDismiss").prop('disabled', false);
					$('#attention').html(response.pesan);
					clear_data();
					location.reload();
				}
			}
		});
	}
}

function clear_data(){
	$('#name_account').val('');
	$('#link_account').val('');
}