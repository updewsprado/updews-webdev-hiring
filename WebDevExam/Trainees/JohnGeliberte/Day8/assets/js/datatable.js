$(document).ready(function() {
	$('#gamb-values').DataTable( {
		"bProcessing": true,
		"sAjaxSource": "dbjson.json",
		"sAjaxDataProp": "",
		"aoColumns": [
		{ "mData": "idaccel" },
		{ "mData": "time_stamp" },
		{ "mData": "node" },
		{ "mData": "xval" },
		{ "mData": "yval" },
		{ "mData": "xval" },
		{ "mData": "mval" },
		{ "mData": "purged" }
		]
	} );
});