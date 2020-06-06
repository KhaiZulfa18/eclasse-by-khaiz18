$('#btnDeletePhoto').click(function(){
	deletePhoto();
});

function deletePhoto(){

	var lanjut = true;

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'info/delete_logo',
        	data : {},
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