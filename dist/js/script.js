$(document).ready(function () {
	$("#cariGuru").autocomplete({
		source: "./../src/resource/sourceGuru.php",
	});
});

$(document).ready(function () {
	$("#cariJadwal").autocomplete({
		source: "./../src/resource/sourceJadwal.php",
	});
});

$(document).ready(function () {
	$("#cariMapel").autocomplete({
		source: "./../src/resource/sourceMapel.php",
	});
});

$(document).ready(function () {
	$("#cariMurid").autocomplete({
		source: "./../src/resource/sourceMurid.php",
	});
});

$(document).ready(function () {
	$("#cariRuang").autocomplete({
		source: "./../src/resource/sourceRuang.php",
	});
});
