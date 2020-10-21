function txt_to_json() {
	var z1 = $("#z1").val();
	var z2 = $("#z2").val();
	var z3 = $("#z3").val();
	var z4 = $("#z4").val();
	var z5 = $("#z5").val();

	var textarea = $("#area").val();

	textarea =
		textarea +
		',{"z1":"' +
		z1 +
		'", "z2":"' +
		z2 +
		'", "z3":"' +
		z3 +
		'", "z4":"' +
		z4 +
		'", "z5":"' +
		z5 +
		'" }';
	$("#area").val(textarea);
}

function csv_to_json() {
	var inp = $("#csv").val();
	var outp = "";
	var allRws = inp.split(/\r?\n|\r/);
	for (var i = 0; i < allRws.length; i++) {
		var cells = allRws[i].split(";");
		console.log(cells);
		outp += '{"z1":"' + cells[1] + " " + cells[2] + '",';
		outp += '"z3":"' + cells[4] + '",';
		outp += '"z2":"", "z4":"", "z5":"" },';
	}
	outp = outp.substring(0, outp.length - 1);
	var textarea = $("#area").val();

	textarea = textarea + outp;
	$("#area").val(textarea);
}
