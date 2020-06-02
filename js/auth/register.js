$('#btnRegister').click(function(){
	register();
});

function register(){

	// var base_url = $('#base_url').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var name = $('#name').val();
	var email = $('#email').val();
	var phone = $('#phone').val();
	var gender = $('#gender').val();
	var address = $('#address').val();
	var bio = $('#bio').val();
	var loc_of_birth = $('#loc_of_birth').val();
	var date_of_birth = $('#date_of_birth').val();
	var picture = $('#picture').prop('files')[0];
	var picture_name = $('input[name=picture]').val().split('\\').pop();

	var alert_danger = `<div class="alert alert-danger alert-dismissible text-left show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Oops, tolong isi yang harus diisi! contohnya hati saya ><
                      </div>
                </div>`;
    var alert_warning_username = `<div class="alert alert-warning alert-dismissible text-left show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Oops, Username harus lebih dari 5 karakter dan tidak lebih dari 20 karakter!
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

	if(name.length==0){
		$('#attention').html(alert_danger);
		return false;
	}
	if(username.length==0){
		$('#attention').html(alert_danger);
		return false;
	}else if(username.length<5){
		$('#attention').html(alert_warning_username);
		return false;
	}else if(username.length>20){
		$('#attention').html(alert_warning_username);
		return false;
	}
	if(username.length==0){
		$('#attention').html(alert_danger);
		return false;
	}else if(username.length<5){
		$('#attention').html(alert_warning_password);
		return false;
	}
	if(email.length==0){
		$('#attention').html(alert_danger);
		return false;
	}
	if(gender.length==0){
		$('#attention').html(alert_danger);
		return false;
	}

	var lanjut = true;
	
	if(lanjut==true){
		var form_data = new FormData();

		form_data.append('name',name);
		form_data.append('username',username);
		form_data.append('password',password);
		form_data.append('email',email);
		form_data.append('phone',phone);
		form_data.append('gender',gender);
		form_data.append('address',address);
		form_data.append('bio',bio);
		form_data.append('loc_of_birth',loc_of_birth);
		form_data.append('date_of_birth',date_of_birth);
		form_data.append('picture',picture);
		form_data.append('picture_name',picture_name);

		$.ajax({
			type : "POST", 
			url  : base_url+'auth/insert_member',
        	data : form_data,
        	processData : false,
        	contentType : false,
        	dataType : "json", 
        	cache : false,
        	beforeSend: function (){
				$("#form").LoadingOverlay("show");
	        },
			success	: function(response){ 
				if(response.status=='gagal'){
					$('#attention').html(response.pesan);
					$("#form").LoadingOverlay("hide", true);
				}
				else{
					$('#attention').html(response.pesan);
					$("#form").LoadingOverlay("hide", true);
					clear_data();
            	}
			}
		});
	}
}

$('#btnclear').click(function(){
	clear_data();
});

function clear_data(){
	$('#form').trigger("reset");
}
