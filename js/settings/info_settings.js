$('#btnSaveChanges').click(function(){
	edit();
});

function edit(){

	var class_name = $('#class').val();
	var school = $('#school').val();
	var years = $('#years').val();
	var email = $('#email').val();
	var instagram = $('#instagram').val();
	var link_instagram = $('#link_instagram').val();
	var link_group_wa = $('#link_group_wa').val();

	var alert_danger = `<div class="alert alert-danger alert-dismissible text-left show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Oops, nama kelas tidak boleh kosong ><
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
	if(class_name.length==0){
		$('#attention-profile').html(alert_danger);
		return false;
	}

	var lanjut = true;
	
	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'info/update_profile_class',
        	data : {
        		class_name:class_name,
        		school:school,
        		years:years,
        		email:email,
        		link_instagram:link_instagram,
        		link_group_wa:link_group_wa,
        		instagram:instagram
        	},
        	beforeSend: function (){
				// $("#btnUpdateProfile").prop('disabled', true);
				$("#form-update-profile").LoadingOverlay("show");
	        },
			success	: function(response){
				$("#attention-profile").html(alert_success);
				$("#form-update-profile").LoadingOverlay("hide", true);
				location.reload();
			}
		});
	}
}