$(document).ready(function() {
	display();
	
	$("#submitButton").click(function(){
		storeValuesInSession();
	});
	
});


function storeValuesInSession(){
	var storeFullName = $("#fullName").val();
	var storeEmail = $("#email").val();
	var storeAge = $("#age").val();
	
	sessionStorage.setItem("fullName", storeFullName);
	sessionStorage.setItem("email", storeEmail);
	sessionStorage.setItem("age", storeAge);
	subscribePageClick();

}

function subscribePageClick(){
	var openLink = "subscribePage.html";
	window.location.href=openLink;
	window.location.assign(openLink);
}


function display() {
	var displayFullName = sessionStorage.getItem("fullName");
	$("#displayFullName").html(displayFullName);
	
}



