<?php
$_routing = explode("/", $_route, 3);

$_folder = isset($_routing[0]) && $_routing[0] != '' ? $_routing[0] : 'dashboard';
$_file = isset($_routing[1]) && $_routing[1] != '' ? $_routing[1] : 'index';
$_params = isset($_routing[2]) ? explode("/", $_routing[2]) : array();
$_id = isset($_params[0]) ? $_params[0] : '';

ob_start();
ob_implicit_flush(false);
if (isset($_rules[$_folder . '/' . $_file]) && !in_array($_access, $_rules[$_folder . '/' . $_file])) {
	if ($_route == '' && $_access == '') {
		header("Location:{$_url}sign/in");
	}
	echo "<h1>403</h1><h1>Halaman Tidak Dapat Diakses</h1><br><a href='{$_url}' class='button primary'>Back</a>";
} else if (file_exists("page/{$_folder}/{$_file}.php"))
	require("page/{$_folder}/{$_file}.php");
else
	echo "<h1>404</h1><h1>Halaman Tidak Ditemukan</h1><br><a href='{$_url}' class='button primary'>Back</a>";

$_content = ob_get_clean();
