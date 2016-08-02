<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Day8-PHP AJAX</title>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="assets/js/dygraph.js"></script>
	<script src="assets/js/datatable.js"></script>
	<script src="assets/js/jquery_datatable.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/dygraph/1.1.1/dygraph-combined.js" type="text/javascript"></script>>
	<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="assets/js/node_selector.js"></script>
	
</head>
<body>
	<h2>Day 8-PHP AJAX</h2>
	<?php
	require_once("dbtojson.php")
	?>
	<div class="content-container">
		<table id="gamb-values" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Timestamp</th>
					<th>Node</th>
					<th>Xval</th>
					<th>Yval</th>
					<th>Zval</th>
					<th>Mval</th>
					<th>Purged</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Timestamp</th>
					<th>Node</th>
					<th>Xval</th>
					<th>Yval</th>
					<th>Zval</th>
					<th>Mval</th>
					<th>Purged</th>
				</tr>
			</tfoot>
		</table>
		<h2>Dygraph</h2>
		<select id="node_selection" onchange="nodeSelect()">
		</select>
		<div id="graphdiv"></div>
	</div>
</body>
</html>
