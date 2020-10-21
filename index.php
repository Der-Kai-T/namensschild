<html>
<head>
<meta charset="utf-8"/>
<title>Namensschilder-Generator</title>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="_usercss.css" />

  <script src="_userjs.js"></script>
 </head>
 
 <body>
<div class="diagonal-box">
	<div class="content">
		<div class="row">
			<div class="box_full">
				<h1>Johanniter Namensschilder Generator</h1>
			</div>
		</div>

		<div class="box">
			<h2>JSON zur &Uuml;bergabe an PDF-Generator:
			<br><br>
			<form action="pdf_namensschild.php" method="POST">
				Dateiname: <input type="text" class="txt_input" name="filename"><br><br>
				<textarea name="namen" rows="10" cols="75" id="area"></textarea>
				<br>
				<input class="cta_button"  type="submit" value="PDF erzeugen">
			</form>

		</div>

		<div class="box">
			<h2>CSV Importer</h2>
			f&uuml;r OVnHH-Teilnehmerlisten, Ausgelesen werden Spalten-IDs 1, 2 und 4<br>
			<textarea name="namen" rows="10" cols="75" id="csv"></textarea><br>
			<button class="button" value="" onClick="csv_to_json()">csv umwandeln</button>

		</div>

		<div class="box">
			<h2>Manuelle Eingabe</h2>

			<b>Zeile 1 <b> &nbsp; <input class="txt_input" type="text" name="z1" id="z1"><br>
			<b>Zeile 2 <b> &nbsp; <input class="txt_input"  type="text" name="z2" id="z2"><br>
			<b>Zeile 3 <b> &nbsp; <input class="txt_input"  type="text" name="z3" id="z3"><br>
			<b>Zeile 4 <b> &nbsp; <input class="txt_input"  type="text" name="z4" id="z4"><br>
			<b>Zeile 5 <b> &nbsp; <input class="txt_input"  type="text" name="z5" id="z5"><br>
			<br>
			<button class="button"  value="einfügen" onClick="txt_to_json()">einfügen</button>

		</div>

		<div class="box" id="imgbox">
			<h3>Variablenbezeichnungen</h3>
			<br>
			<img src="img/vorschau.jpg">
		</div>
	</div>
</div>



<body>
</html>