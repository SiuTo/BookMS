$("#readerQuery").click(function() {
	$("#showResultPanel").load(
		"readerQuery.php",
		{
			rid: $("#rid").val()
		}
	);
});

$("#officerQuery").click(function() {
    $("#showResultPanel").load(
        "officerQuery.php",
        {
            oid: $("#oid").val()
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

function modifyLevel(levelName, borrowNum, period)
{
	$.post("modifyLevel.php",
		{
			levelName: levelName,
			borrowNum: borrowNum,
			period: period
		},
		alert("Succeed!")
	);
}

