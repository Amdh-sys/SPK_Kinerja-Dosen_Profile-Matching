<?php

$query_user = mysqli_query($koneksi, "SELECT * FROM user");

$users = array();

while ($field = mysqli_fetch_array($query_user)) {
	$users[] = "'{$field['username']}'";
}

$users = implode(',', $users);

// synchronizing dosen
$query_dosen = mysqli_query($koneksi, "SELECT * FROM dosen WHERE npk NOT IN ({$users})");
$value_dosen = array();

while ($field = mysqli_fetch_array($query_dosen)) {
	$value_dosen[] = "('{$field['nama_dosen']}','{$field['npk']}',('{$field['npk']}'),'dosen')";
}

$value_dosen = implode(',', $value_dosen);

if ($value_dosen != '')
	mysqli_query($koneksi, "INSERT INTO user(nama,username,password,status) VALUES{$value_dosen}");

// synchronizing mahasiswa
$query_mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim NOT IN ({$users})");
$value_mahasiswa = array();

while ($field = mysqli_fetch_array($query_mahasiswa)) {
	$value_mahasiswa[] = "('{$field['nama']}','{$field['nim']}','{$field['nim']}','mahasiswa')";
}

$value_mahasiswa = implode(',', $value_mahasiswa);

if ($value_mahasiswa != '')
	mysqli_query($koneksi, "INSERT INTO user(nama,username,password,status) VALUES{$value_mahasiswa}");

header("location:{$_url}user");
