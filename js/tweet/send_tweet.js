function formTweet(){
	$("#tweet-modal").modal('toggle');
	$("#tweet-modal").modal('show');
}

$('#btnTweet').click(function(){
	tweet();
});

function tweet() {
	var summernote = $('#tweet_txtarea');
	var tweet_post = summernote.summernote('code');
	var plain_tweet = $($("#tweet_txtarea").summernote("code")).text();
	
	var lanjut = true;

	var alert_danger = `<div class="alert alert-danger alert-dismissible text-left show fade">
	<div class="alert-body">
	<button class="close" data-dismiss="alert">
	<span>&times;</span>
	</button>
	Oops, Tweet tidak boleh kosong
	</div>
	</div>`;

	if (summernote.summernote('isEmpty')){
		$('#attention-tweet').html(alert_danger);
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'tweet/insert_tweet',
			data : {
				tweet_post: tweet_post,
				plain_tweet: plain_tweet
			},
			beforeSend: function (){
				$("#form-tweet").LoadingOverlay("show");
				$("#btnTweet").prop('disabled', true);
				$("#btnDismiss").prop('disabled', true);
			},
			success	: function(response){ 
				if(response.status=='gagal'){
					$('#attention-tweet').html(response.pesan);
					// spinner.hide();
					$("#form-tweet").LoadingOverlay("hide", true);
				}
				else{
					$("#form-tweet").LoadingOverlay("hide", true);
					// spinner.hide();
					$("#tweet-modal").modal('hide');
					$("#btnTweet").prop('disabled', false);
					$("#btnDismiss").prop('disabled', false);
					$('#attention-tweet').html(response.pesan);
					clear_data();
					getTweet(1);
				}
			}
		});
	}
}

function clear_data(){
	$('#tweet_txtarea').summernote('reset');
}