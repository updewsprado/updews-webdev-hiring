
$(document).ready(function() {
	$("#button2").click(function () {

		function show_all() {

			$.ajax ({
				type: "POST",
				url: "pullData.php",
				data:{action:"showroom"},
				success: function(data) {
					$("#graphdiv").hide();
					$("#tableResult").show();
					$("#tableResult").html(data);
				}
			});

		}

		document.title = "Table \"accel\"";
		$("#pageTitle").text("Table \"accel\"");
		show_all();
		$.getScript("ddtf.js", function() {
			jQuery('#myTable').ddTableFilter();
		});
		
	});

});

$(document).ready(function() {
	$("#button3").click(function () {

		function showGraph() {

			$.ajax ({
				type: "POST",
				url: "graph.php",
				data:{action:"showroom"},
				success: function(data) {
					$("#tableResult").hide();
					$("#graphdiv").show();
					$("#graphdiv").html(data);
				}
			});

		}

		document.title = "Graph of \"accel\"";
		$("#pageTitle").text("Graph \"accel\"");
		showGraph();
		
	});
});