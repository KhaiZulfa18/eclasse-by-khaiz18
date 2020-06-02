$('#btnUpdatePassword').click(function(){
	updatePassword();
	// console.log('tes')
});

function updatePassword(){

	var password = $('#password').val();
	var newpassword = $('#newpassword').val();
	var confirmpassword = $('#confirmpassword').val();

	var alert_danger = `<div class="alert alert-danger alert-dismissible text-left show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Oops, harap isi Password, Password Baru, & Konfirmasi Password
                      </div> 
                </div>`;

    var alert_warning_password = `<div class="alert alert-warning alert-dismissible text-left show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Oops, Password harus lebih dari 5 karakter!
                      </div>
                </div>`;

	if(password.length==0){
		$('#attention-password').html(alert_danger);
		return false;
	}
	if(newpassword.length==0){
		$('#attention-password').html(alert_danger);
		return false;
	}
	if(newpassword.length<5){
		$('#attention-password').html(alert_warning_password);
		return false;
	}
	if(confirmpassword.length==0){
		$('#attention-password').html(alert_danger);
		return false;
	}

	var lanjut = true;
	
	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'profile/update_password',
			data : {
				id_user:id_user,
				password:password,
				confirmpassword:confirmpassword,
				newpassword:newpassword
        	},
        	dataType:"json",
        	beforeSend: function (){
				$("#form-update-password").LoadingOverlay("show");
	        },
			success	: function(response){
				if(response.status=='gagal'){
					$('#attention-password').html(response.pesan);
					$("#form-update-password").LoadingOverlay("hide", true);
				}
				else{
					$('#attention-password').html(response.pesan);
					$("#form-update-password").LoadingOverlay("hide", true);
					clear_form();
            	}
			}
		});
	}
}

$('#btnClear').click(function(){
	clear_form();
});

function clear_form() {
	$('#password').val('');
	$('#newpassword').val('');
	$('#confirmpassword').val('');
}
