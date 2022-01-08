<h2>
	<a href="<?= $_url ?>" class="mif-arrow-left mif-2x"><span></span></a>
	Dashboard
</h2>
<?php
if (isset($_POST['gabung'])) {
	$querycek = mysqli_query(
		$koneksi,
		"SELECT * FROM nilai_gabungan_dosen"
	);
	if ($querycek->num_rows > 0) {
		// Delete 
		$sql = mysqli_query($koneksi, "DELETE FROM nilai_gabungan_dosen");
		// Add
		$sql = mysqli_query(
			$koneksi,
			"INSERT INTO nilai_gabungan_dosen(npk_dosen,Ai1,Ai2,Ai3,Ai4,Ai5,Bi1,Bi2,Bi3,Bi4,Bi5,Bi6,Ci1,Ci2,Ci3) 
		SELECT npk_dosen, 
			ROUND(SUM(IF(npk_dosen, Ai1, Ai1))/(COUNT(IF(npk_dosen, Ai1, Ai1))),0),
			ROUND(SUM(IF(npk_dosen, Ai2, Ai2))/(COUNT(IF(npk_dosen, Ai2, Ai2))),0),
			ROUND(SUM(IF(npk_dosen, Ai3, Ai3))/(COUNT(IF(npk_dosen, Ai3, Ai3))),0),
			ROUND(SUM(IF(npk_dosen, Ai4, Ai4))/(COUNT(IF(npk_dosen, Ai4, Ai4))),0),
			ROUND(SUM(IF(npk_dosen, Ai5, Ai5))/(COUNT(IF(npk_dosen, Ai5, Ai5))),0),
			ROUND(SUM(IF(npk_dosen, Bi1, Bi1))/(COUNT(IF(npk_dosen, Bi1, Bi1))),0),
			ROUND(SUM(IF(npk_dosen, Bi2, Bi2))/(COUNT(IF(npk_dosen, Bi2, Bi2))),0),
			ROUND(SUM(IF(npk_dosen, Bi3, Bi3))/(COUNT(IF(npk_dosen, Bi3, Bi3))),0),
			ROUND(SUM(IF(npk_dosen, Bi4, Bi4))/(COUNT(IF(npk_dosen, Bi4, Bi4))),0),
			ROUND(SUM(IF(npk_dosen, Bi5, Bi5))/(COUNT(IF(npk_dosen, Bi5, Bi5))),0),
			ROUND(SUM(IF(npk_dosen, Bi6, Bi6))/(COUNT(IF(npk_dosen, Bi6, Bi6))),0),
			ROUND(SUM(IF(npk_dosen, Ci1, Ci1))/(COUNT(IF(npk_dosen, Ci1, Ci1))),0),
			ROUND(SUM(IF(npk_dosen, Ci2, Ci2))/(COUNT(IF(npk_dosen, Ci2, Ci2))),0),
			ROUND(SUM(IF(npk_dosen, Ci3, Ci3))/(COUNT(IF(npk_dosen, Ci3, Ci3))),0)
		FROM nilai_dosen
		GROUP BY npk_dosen"
		);
		header("Location: {$_url}penilaian/gabung_nilai");
	} else {
		// Add
		$sql = mysqli_query(
			$koneksi,
			"INSERT INTO nilai_gabungan_dosen(npk_dosen,Ai1,Ai2,Ai3,Ai4,Ai5,Bi1,Bi2,Bi3,Bi4,Bi5,Bi6,Ci1,Ci2,Ci3) 
		SELECT npk_dosen, 
			ROUND(SUM(IF(npk_dosen, Ai1, Ai1))/(COUNT(IF(npk_dosen, Ai1, Ai1))),0),
			ROUND(SUM(IF(npk_dosen, Ai2, Ai2))/(COUNT(IF(npk_dosen, Ai2, Ai2))),0),
			ROUND(SUM(IF(npk_dosen, Ai3, Ai3))/(COUNT(IF(npk_dosen, Ai3, Ai3))),0),
			ROUND(SUM(IF(npk_dosen, Ai4, Ai4))/(COUNT(IF(npk_dosen, Ai4, Ai4))),0),
			ROUND(SUM(IF(npk_dosen, Ai5, Ai5))/(COUNT(IF(npk_dosen, Ai5, Ai5))),0),
			ROUND(SUM(IF(npk_dosen, Bi1, Bi1))/(COUNT(IF(npk_dosen, Bi1, Bi1))),0),
			ROUND(SUM(IF(npk_dosen, Bi2, Bi2))/(COUNT(IF(npk_dosen, Bi2, Bi2))),0),
			ROUND(SUM(IF(npk_dosen, Bi3, Bi3))/(COUNT(IF(npk_dosen, Bi3, Bi3))),0),
			ROUND(SUM(IF(npk_dosen, Bi4, Bi4))/(COUNT(IF(npk_dosen, Bi4, Bi4))),0),
			ROUND(SUM(IF(npk_dosen, Bi5, Bi5))/(COUNT(IF(npk_dosen, Bi5, Bi5))),0),
			ROUND(SUM(IF(npk_dosen, Bi6, Bi6))/(COUNT(IF(npk_dosen, Bi6, Bi6))),0),
			ROUND(SUM(IF(npk_dosen, Ci1, Ci1))/(COUNT(IF(npk_dosen, Ci1, Ci1))),0),
			ROUND(SUM(IF(npk_dosen, Ci2, Ci2))/(COUNT(IF(npk_dosen, Ci2, Ci2))),0),
			ROUND(SUM(IF(npk_dosen, Ci3, Ci3))/(COUNT(IF(npk_dosen, Ci3, Ci3))),0)
		FROM nilai_dosen
		GROUP BY npk_dosen"
		);
		header("Location: {$_url}penilaian/gabung_nilai");
	}
}
?>
<?php
$sql = "SELECT * FROM nilai_dosen ORDER BY nim ASC";
$query = mysqli_query($koneksi, $sql);
?>