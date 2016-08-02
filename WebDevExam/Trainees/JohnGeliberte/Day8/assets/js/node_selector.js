 $(document).ready(function() {
 	var $select = $('#node_selection');

 	$.getJSON('dbjson.json', function(data) {

 		$select.html('');
 		var nodes = [];
 		var i;
 		$.each(data, function(key, val){
 			if (nodes.contains(val.node) === false){
 				nodes.push(val.node);
 			}
 		});
 		for (var x=0;x < nodes.length;x++){
 			$select.append('<option id="nodeId" value="'+nodes[x]+'">' + nodes[x] + ' </option>');
 		}
 	});
 });

 Array.prototype.contains = function ( needle ) {
 	for (i in this) {
 		if (this[i] == needle) return true;
 	}
 	return false;
 }

 function nodeSelect() {
 	var x = document.getElementById("node_selection").value;
 	$.getJSON('dbjson.json', function(data) {
 		var array = [];
 		var node_selected = [];
 		$.each(data, function(key, val){
 			if (val.node === x) {
 				node_selected = [];
 				node_selected.push(val.idaccel);
 				node_selected.push(val.time_stamp);
 				node_selected.push(val.node);
 				node_selected.push(val.xval);
 				node_selected.push(val.yval);
 				node_selected.push(val.xval);
 				node_selected.push(val.mval);
 				node_selected.push(val.purged);
 				array.push(node_selected);
 			}

 		});

 		var p = 0;
 		new Dygraph(document.getElementById("graphdiv"),array,
              {
                labels: [ "id", "time_stamp", "node" , "xval", "yval", "zval","mval" , "purged"]
              });
 	}); 
 }
