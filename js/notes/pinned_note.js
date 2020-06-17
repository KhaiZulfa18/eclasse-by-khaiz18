function pinnedNote(id_note,pageno) {
	if(pageno.length==0){
		var pageno = 1;
	}
	$.ajax({
		type : "POST", 
		url  : base_url+'info/pinned_note',
		data : {
			id_note
		},
		success: function() {
			getData(pageno);
			console.log(pageno);
		}
	});
}

function unpinnedNote(id_note,pageno) {
	if(pageno.length==0){
		var pageno = 1;
	}
	$.ajax({
		type : "POST", 
		url  : base_url+'info/unpinned_note',
		data : {
			id_note
		},
		success: function() {
			getData(pageno);
		}
	});
}