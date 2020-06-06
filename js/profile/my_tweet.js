$(document).ready(function(){
	getTweet(1);
});

$('#search').change(function(){
	getTweet(1);
});

function getTweet(pageno){

	var search = $('#search').val();

	$.ajax({
		type: 'POST',
		url: base_url+'profile/get_tweet',
		data: {
			search: search,
			page: pageno
        },
        beforeSend: function (){
			$("#tweet-body").LoadingOverlay("show");
			// spinner.show();
        },
		success: function(data) {
			$("#tweet-body").LoadingOverlay("hide", true);
			// spinner.hide();
			$('#tweet-post').html(data);
			paging(pageno);
		}
	});
}

function paging(pageno){

	var search = $('#search').val();

	$.ajax({
		type: 'POST',
		url: base_url+'profile/paging_tweet',
		data: {
			search: search,
			page: pageno
        },
		success: function(data) {
			$("#paging-tweet").html(data);
		}
	});
}

function deleteTweet(id_tweet,noPage){
	$("#delete-tweet-modal").modal('toggle');
	$("#delete-tweet-modal").modal('show');
	// $("#delete-text").html("<h6>Are you sure delete "+name+"?</h6>");
	$('#pageno').val(noPage);
	$('#id_tweet').val(id_tweet);
}

$('#btnDeleteTweet').click(function() {
	var id_tweet = $('#id_tweet').val();
	var pageno = $('#pageno').val();
	if(pageno.length==0){
		var pageno = 1;
	}

	$.ajax({
		type: "POST",		
		url: base_url+'tweet/delete_tweet',
		data: {
			id_tweet: id_tweet
		},
		beforeSend: function (){
            $("#btnDelete").prop('disabled', true);
            $("#btnDismiss").prop('disabled', true);
        },
		success: function() {
			$("#delete-tweet-modal").modal('hide');
			$("#btnDelete").prop('disabled', false);
			$("#btnDismiss").prop('disabled', false);
			$('#id_tweet').val('');
			$('#pageno').val('');
			getTweet(pageno);
		}
	});
});