$('#btnUpdateProfile').click(function(){
	edit();
});

function edit(){

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
    var alert_success = `<div class="alert alert-success alert-dismissible text-left show fade">
						<div class="alert-body">
						    <button class="close" data-dismiss="alert">
							    <span>&times;</span>
						    </button>
						    Yey, Berhasil memperbarui profil!
						 </div>
					</div>`;
	if(name.length==0){
		$('#attention-profile').html(alert_danger);
		return false;
	}
	if(username.length==0){
		$('#attention-profile').html(alert_danger);
		return false;
	}else if(username.length<5){
		$('#attention-profile').html(alert_warning_username);
		return false;
	}else if(username.length>20){
		$('#attention-profile').html(alert_warning_username);
		return false;
	}
	if(username.length==0){
		$('#attention-profile').html(alert_danger);
		return false;
	}else if(username.length<5){
		$('#attention-profile').html(alert_warning_password);
		return false;
	}
	if(email.length==0){
		$('#attention-profile').html(alert_danger);
		return false;
	}
	if(gender.length==0){
		$('#attention-profile').html(alert_danger);
		return false;
	}

	var lanjut = true;
	
	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'profile/update_profile',
        	data : {
        		id_user:id_user,
        		name:name,
        		username:username,
        		email:email,
        		phone:phone,
        		gender:gender,
        		loc_of_birth:loc_of_birth,
        		date_of_birth:date_of_birth,
        		address:address,
        		bio:bio
        	},
        	beforeSend: function (){
				// $("#btnUpdateProfile").prop('disabled', true);
				$("#form-update-profile").LoadingOverlay("show");
	        },
			success	: function(response){
				$("#attention-profile").html(alert_success);
				$("#form-update-profile").LoadingOverlay("hide", true);
				// back();
			}
		});
	}
}
// $('#btnback').click(function() {
// 	back();
// });

// function back(){
// 	var base_url = $('#base_url').val();

// 	window.location.assign(base_url+"dashboard/data_kategori");
// }