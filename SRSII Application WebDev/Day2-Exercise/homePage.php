<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Volcanology Home</title>
</head>

<body>
	<h1 align="center">Welcome to Volcanology Web Site</h1>
	<br/>
	<div style="text-align: center">
		<img alt="Volcanology SetUp Image" src="volcanologySetUpImg.jpg" align="middle">
	</div>
	<br/>
	<p>
		<b>Volcanology</b> (also spelled vulcanology) is the study of volcanoes, lava, magma, and related geological,
		geophysical and geochemical phenomena. The term volcanology is derived from the Latin word vulcan.
		Vulcan was the ancient Roman god of fire.
		A <b>volcanologist</b> is a geologist who studies the eruptive activity and formation of volcanoes, and
		their current and historic eruptions. Volcanologists frequently visit volcanoes, especially active ones,
		to observe volcanic eruptions, collect eruptive products including tephra (such as ash or pumice), rock and lava samples.
		One major focus of enquiry is the prediction of eruptions; there is currently no accurate way to do this,
		but predicting eruptions, like predicting earthquakes, could save many lives.
	</p>
	<span>Please select an active volcano below:</span>
	<br/>
	<select id="selectVolcano">
		<option id="vulcan1" value="babuyanClaroVulcan">Babuyan Claro</option>
		<option id="vulcan2" value="cabalianVulcan">Cabalian</option>
		<option id="vulcan3" value="hibokHibokVulcan">Hibok-Hibok</option>
		<option id="vulcan4" value="mayonVulcan">Mayon</option>
		<option id="vulcan5" value="taalVulcan">Taal</option>
	</select>
	
	<div id="subscribeForm">
		<h4>Please enter your info below to subscribe:</h4>
		<form action="subscribePage.php" method="post">
			<table>
				<tr>
					<td>
						Name:
					</td>
					<td>
						<input type="text" name="name" placeholder="First Name, Middle Name, Last Name" size="30" id="fullName">
					</td>
				</tr>
				<tr>
					<td>
						Email:
					</td>
					<td>
						<input type="text" name="email" placeholder="sample@email.com" size="25" id="email">
					</td>
				</tr>
				<tr>
					<td>
						Age:
					</td>
					<td>
						<input type="text" name="age" maxlength="2" size="4" id="age">
					</td>
				</tr>
			</table>
			<input type="submit" name="subscribe" value="Subscribe" id="submitButton">
		</form>
	</div>
	
	
</body>
</html>
