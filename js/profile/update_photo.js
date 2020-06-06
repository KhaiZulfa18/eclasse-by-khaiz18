$('#btnUpdatePhoto').click(function(){
	updatePhoto();
});

function updatePhoto(){

	var picture = $('#picture').prop('files')[0];
	var picture_name = $('input[name=picture]').val().split('\\').pop();
	
	var alert_danger = `<div class="alert alert-danger alert-dismissible text-left show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Upload foto tercantik mu dulu dong!
                      </div> 
                </div>`;

	var lanjut = true;

	if(id_user.length==0){
		$('#attention-photo').html('error');
		return false;
	}
	if(picture_name.length==0){
		$('#attention-photo').html(alert_danger);
		return false;
	}

	if(lanjut==true){
		var form_data = new FormData();

		form_data.append('id_user',id_user);
		form_data.append('picture',picture);
		form_data.append('picture_name',picture_name);

		$.ajax({
			type : "POST", 
			url  : base_url+'profile/update_photo',
        	data : form_data,
        	processData : false,
        	contentType : false,
        	dataType : "json", 
        	cache : false,
        	beforeSend: function (){
				$("#form-update-photo").LoadingOverlay("show");
	        },
			success	: function(response){
				if(response.status=='gagal'){
					$("#form-update-photo").LoadingOverlay("hide", true);
					$('#attention-photo').html(response.pesan);
				}
				else{
					$("#form-update-photo").LoadingOverlay("hide", true);
					$('#attention-photo').html(response.pesan);
					location.reload();
            	}
			}
		});
	}
}
