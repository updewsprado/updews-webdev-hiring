/**
 * 
 */
$(document).ready(function() {
	$('#selectionPage').on('change',function(){
    var value = $(this).val();
    window.location.href = value; 
    });
});




