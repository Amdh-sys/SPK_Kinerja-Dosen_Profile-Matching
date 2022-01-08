<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filemahasiswa']['name']);
move_uploaded_file($_FILES['filemahasiswa']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filemahasiswa']['name'], 0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filemahasiswa']['name'], false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index = 0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i = 2; $i <= $jumlah_baris; $i++) {

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nim     = $data->val($i, 1);
	$nama   = $data->val($i, 2);
	$alamat  = $data->val($i, 3);
	$jenis_kelamin  = $data->val($i, 4);
	$tahun_masuk  = $data->val($i, 5);

	if ($nim != "" && $nama != "" && $alamat != "" && $jenis_kelamin != " && $tahun_masuk != ") {
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi, "INSERT into mahasiswa values('$nim','$nama','$alamat','$jenis_kelamin','$tahun_masuk')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filemahasiswa']['name']);

// alihkan halaman ke index.php
header("refresh:1;mahasiswa?berhasil=$berhasil");
?>