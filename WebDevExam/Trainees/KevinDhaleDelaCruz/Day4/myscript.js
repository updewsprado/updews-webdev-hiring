//Sidebar Drop Down Navigator
function loadPage(src)
{
	window.location=src;
}

//Randomized Quote Of The Day

function randomQuote()
{
	var rand = Math.round(Math.random()*10)-1;
	var quote = new Array(10);
	quote[0] = "Time is gold.";
	quote[1] = "Think positively.";
	quote[2] = "Cleanliness is next to godliness.";
	quote[3] = "In Omnibus amare et servire Domino.";
	quote[4] = "'Pag may tiyaga, may nilaga.";
	quote[5] = "Magis Quam Schola Familia";
	quote[6] = "Winners never quit. Quitters never win.";
	quote[7] = "Daig ng taong maagap ang taong masikap.";
	quote[8] = "An ounce of prevention is better than a pound of cure.";
	quote[9] = "Be strong and take courage.";
	
	document.getElementById("quote").innerHTML = quote[rand];

}
	
