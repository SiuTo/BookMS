$("#readerQuery").click(function() {
	$("#showResultPanel").load(
		"readerQuery.php",
		{
			rid: $("#rid").val(),
		}
	);
});

function deleteReader()
{
	$.post("deleteReader.php",
		{
			rid: $("#rid").val()
		},
		function(){
			$("#showResultPanel").text("");
		}
	);
}

