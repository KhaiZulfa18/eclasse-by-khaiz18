$('#btnCreate').click(function(){
	createNote();
});

function createNote() {
	var summernote = $('#notes');
	var note = summernote.summernote('code');
	var plain_note = $($("#notes").summernote("code")).text();

	if ($('#pinned').is(":checked")){
		var status = 2;
	}else{
		var status = 1;
	}
	
	var lanjut = true;

	var alert_danger = `<div class="alert alert-danger alert-dismissible text-left show fade">
	<div class="alert-body">
	<button class="close" data-dismiss="alert">
	<span>&times;</span>
	</button>
	Oops, Notes tidak boleh kosong
	</div>
	</div>`;

	var alert_success = `<div class="alert alert-success alert-dismissible text-left show fade">
	<div class="alert-body">
	<button class="close" data-dismiss="alert">
	<span>&times;</span>
	</button>
	Yey, Notes berhasil dibuat!
	</div>
	</div>`;

	if (summernote.summernote('isEmpty')){
		$('#attention-note').html(alert_danger);
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'info/insert_note',
			data : {
				status: status,
				note: note,
				plain_note: plain_note
			},
			beforeSend: function (){
				$("#form").LoadingOverlay("show");
				$("#btnCreate").prop('disabled', true);
			},
			success	: function(){ 
				$("#form").LoadingOverlay("hide", true);
				$("#btnCreate").prop('disabled', false);
				$('#attention-note').html(alert_success);
				clear_data();
			}
		});
	}
}

function clear_data(){
	$('#notes').summernote('reset');
	$('#pinned').prop("checked",false);
}