<?php

$query = mysqli_query($koneksi, "UPDATE krs SET accept=1 WHERE tahun_ajaran='{$_tahun_ajaran}' AND nim='{$_id}'");

header("location:{$_url}krs/view/{$_id}");