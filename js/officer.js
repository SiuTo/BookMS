function alertResult(data, status) {
	var pos=data.indexOf(":");
	$("#alertModal .modal-title").text(data.slice(0, pos));
	$("#alertModal .modal-body").text(data.slice(pos+1));
	$("#alertModal").modal("toggle");
}

$("#queryReader").click(function() {
	$("#showResultPanel-reader").load("queryReader.php", {rid: $("#rid").val()});
});

$("#borrowBook").click(function() {
	$.post("borrowBook.php", {rid: $("#rid").val(), bookid: $("#bookid").val()}, alertResult);
	$("#showResultPanel-reader").load("queryReader.php", {rid: $("#rid").val()});
});

$("#returnBook").click(function() {
	$.post("returnBook.php", {rid: $("#rid").val(), bookid: $("#bookid").val()}, alertResult);
	$("#showResultPanel-reader").load("queryReader.php", {rid: $("#rid").val()});
});

$("#queryBook").click(function() {
	$("#showResultPanel-book").load("queryBook.php", {isbn: $("#isbn").val()});
});

$("#editBook").click(function() {
	window.location.href="editBook.php?isbn="+$("#isbn").val();
});

$("#dropBook").click(function() {
	$.post("dropBook.php", {isbn: $("#isbn").val()}, alertResult);
});

