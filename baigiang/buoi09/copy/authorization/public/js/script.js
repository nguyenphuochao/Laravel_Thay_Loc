$("#student_id").change(function(event) {
	/* Act on the event */
	var student_id = $(this).val();
	var requestUrl = $(this).attr("url");
	requestUrl = requestUrl.replace("pattern", student_id);
	$("#subject_id").children().not(":first-child").remove();
	if (student_id=="") {
		return;
	}
	$("#load").html("Loading...");
	$.ajax({
		url: requestUrl
	})
	.done(function(data) {
		var subjects = JSON.parse(data);
		$(subjects).each(function(index, el) {
			var option = "<option value='" + el.id + "'>" + el.id + " - "+  el.name+ "</option>";
			$("#subject_id").append(option)
		});
		$("#load").empty();
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
});

$(".delete").click(function(){
	var form = $("#modalDeletingConfirmation form");
	$(form).attr("action", $(this).attr("url"));
	$("#modalDeletingConfirmation").modal('show');
});