function loadList(isbn) {
	$("#alertModal .modal-title").text("Single Book Information");
	$("#alertModal .modal-body").load(
		"bookList.php",
		{isbn: isbn},
		function(){
			$("#alertModal").modal("toggle");
		}
	);
}

