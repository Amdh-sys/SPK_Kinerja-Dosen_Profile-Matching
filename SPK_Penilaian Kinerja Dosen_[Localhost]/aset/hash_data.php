<?php
$nim_hash = base64_encode("$_username");
$nim_unhash = base64_decode("$nim_hash");

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$querymakul = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kode ='" . $uri_segments[7] . "' ");
$makul = mysqli_fetch_array($querymakul);
