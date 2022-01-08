<html>
<title>Daftar Nilai Dosen</title>

<body>

    <?php
    include 'aset/query_masterdata.php';
    include 'aset/class_core.php';
    include 'aset/query_gap.php';
    $A = 3;
    $B = 4;
    $C = 4.5;
    $MIN = ($A * ($Persentase_A['persentase'] / 100)) + ($B * ($Persentase_B['persentase'] / 100)) + ($C * ($Persentase_C['persentase'] / 100));
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <?php if (isset($_POST['singkronasi'])) {
        $Singkron_Nilai_Akhir = mysqli_query($koneksi, "DELETE FROM hasil_akhir 
    WHERE npk_dosen NOT IN (SELECT npk_dosen FROM nilai_gabungan_dosen)");
    }
    ?>

    <?php if (isset($_POST['laporan'])) {
        $QHA = mysqli_query($koneksi, "SELECT * FROM hasil_akhir");
        $QLAP = mysqli_query($koneksi, "SELECT * FROM laporan");
        while ($field = mysqli_fetch_array($QHA)) {
            $NTA = $field['nilai_penggunaan_teknologi'];
            $NTB = $field['nilai_proses_pembelajaran'];
            $NTC = $field['nilai_kedisiplinan'];
            $NHA = $field['nilai_akhir'];
            $NPK_DOSEN = $field['npk_dosen'];
            // Nilai Minimum 
            $MinHA = (
                ($Persentase_A['nilai_standar'] * ($Persentase_A['persentase'] / 100)) +
                ($Persentase_B['nilai_standar'] * ($Persentase_B['persentase'] / 100)) +
                ($Persentase_C['nilai_standar'] * ($Persentase_C['persentase'] / 100)));
            if ($NTA < $Persentase_A['nilai_standar']) {
                $LapA = " kurang ";
            } else {
                $LapA = " bagus ";
            }
            if ($NTB < $Persentase_B['nilai_standar']) {
                $LapB = " kurang ";
            } else {
                $LapB = " bagus ";
            }
            if ($NTC < $Persentase_C['nilai_standar']) {
                $LapC = " kurang ";
            } else {
                $LapC = " bagus ";
            }
            // Query Nilai Gabungan Dosen
            $QE = mysqli_query($koneksi, "SELECT * FROM nilai_gabungan_dosen INNER JOIN dosen WHERE nilai_gabungan_dosen.npk_dosen = '$NPK_DOSEN' AND dosen.npk = '$NPK_DOSEN'");
            while ($Evaluasi = mysqli_fetch_array($QE)) {

                if ($NHA < $MinHA) {
                    $QK = mysqli_query($koneksi, "SELECT * FROM kriteria");
                    $Kriteria = mysqli_fetch_all($QK);
                    // EVALUASI A B C
                    if ($NTA < $Persentase_A['nilai_standar'] && $NTB < $Persentase_B['nilai_standar'] && $NTC < $Persentase_C['nilai_standar']) {
                        if ($Evaluasi['Ai1'] < 2) {
                            $EA1 = "-" . $Kriteria[0][2] . "<br>" . "\r\n";
                        } else {
                            $EA1 = '';
                        }
                        if ($Evaluasi['Ai2'] < 3) {
                            $EA2 = "-" . $Kriteria[1][2] . "<br>" . "\r\n";
                        } else {
                            $EA2 = '';
                        }
                        if ($Evaluasi['Ai3'] < 3) {
                            $EA3 = "-" . $Kriteria[2][2] . "<br>" . "\r\n";
                        } else {
                            $EA3 = '';
                        }
                        if ($Evaluasi['Ai4'] < 3) {
                            $EA4 = "-" . $Kriteria[3][2] . "<br>" . "\r\n";
                        } else {
                            $EA4 = '';
                        }
                        if ($Evaluasi['Ai5'] < 2) {
                            $EA5 = "-" . $Kriteria[4][2] . "<br>" . "\r\n";
                        } else {
                            $EA5 = '';
                        }
                        if ($Evaluasi['Bi1'] < 2) {
                            $EB1 = "-" . $Kriteria[5][2] . "<br>" . "\r\n";
                        } else {
                            $EB1 = '';
                        }
                        if ($Evaluasi['Bi2'] < 2) {
                            $EB2 = "-" . $Kriteria[6][2] . "<br>" . "\r\n";
                        } else {
                            $EB2 = '';
                        }
                        if ($Evaluasi['Bi3'] < 3) {
                            $EB3 = "-" . $Kriteria[7][2] . "<br>" . "\r\n";
                        } else {
                            $EB3 = '';
                        }
                        if ($Evaluasi['Bi4'] < 3) {
                            $EB4 = "-" . $Kriteria[8][2] . "<br>" . "\r\n";
                        } else {
                            $EB4 = '';
                        }
                        if ($Evaluasi['Bi5'] < 3) {
                            $EB5 = "-" . $Kriteria[9][2] . "<br>" . "\r\n";
                        } else {
                            $EB5 = '';
                        }
                        if ($Evaluasi['Bi6'] < 2) {
                            $EB6 = "-" . $Kriteria[10][2] . "<br>" . "\r\n";
                        } else {
                            $EB6 = '';
                        }
                        if ($Evaluasi['Ci1'] < 3) {
                            $EC1 = "-" . $Kriteria[11][2] . "<br>" . "\r\n";
                        } else {
                            $EC1 = '';
                        }
                        if ($Evaluasi['Ci2'] < 3) {
                            $EC2 = "-" . $Kriteria[12][2] . "<br>" . "\r\n";
                        } else {
                            $EC2 = '';
                        }
                        if ($Evaluasi['Ci3'] < 2) {
                            $EC3 = "-" . $Kriteria[13][2] . "<br>" . "\r\n";
                        } else {
                            $EC3 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekA . '<br>' . "\r\n"
                            . $EA1 . $EA2 . $EA3 . $EA4 . $EA5
                            . "2." . $AspekB . '<br>' . "\r\n"
                            . $EB1 . $EB2 . $EB3 . $EB4 . $EB5 . $EB6
                            . "3." . $AspekC . '<br>' . "\r\n"
                            . $EC1 . $EC2 . $EC3;
                    } // EVALUASI A B 
                    else if ($NTA < $Persentase_A['nilai_standar'] && $NTB < $Persentase_B['nilai_standar']) {
                        if ($Evaluasi['Ai1'] < 2) {
                            $EA1 = "-" . $Kriteria[0][2] . "<br>" . "\r\n";
                        } else {
                            $EA1 = '';
                        }
                        if ($Evaluasi['Ai2'] < 3) {
                            $EA2 = "-" . $Kriteria[1][2] . "<br>" . "\r\n";
                        } else {
                            $EA2 = '';
                        }
                        if ($Evaluasi['Ai3'] < 3) {
                            $EA3 = "-" . $Kriteria[2][2] . "<br>" . "\r\n";
                        } else {
                            $EA3 = '';
                        }
                        if ($Evaluasi['Ai4'] < 3) {
                            $EA4 = "-" . $Kriteria[3][2] . "<br>" . "\r\n";
                        } else {
                            $EA4 = '';
                        }
                        if ($Evaluasi['Ai5'] < 2) {
                            $EA5 = "-" . $Kriteria[4][2] . "<br>" . "\r\n";
                        } else {
                            $EA5 = '';
                        }
                        if ($Evaluasi['Bi1'] < 2) {
                            $EB1 = "-" . $Kriteria[5][2] . "<br>" . "\r\n";
                        } else {
                            $EB1 = '';
                        }
                        if ($Evaluasi['Bi2'] < 2) {
                            $EB2 = "-" . $Kriteria[6][2] . "<br>" . "\r\n";
                        } else {
                            $EB2 = '';
                        }
                        if ($Evaluasi['Bi3'] < 3) {
                            $EB3 = "-" . $Kriteria[7][2] . "<br>" . "\r\n";
                        } else {
                            $EB3 = '';
                        }
                        if ($Evaluasi['Bi4'] < 3) {
                            $EB4 = "-" . $Kriteria[8][2] . "<br>" . "\r\n";
                        } else {
                            $EB4 = '';
                        }
                        if ($Evaluasi['Bi5'] < 3) {
                            $EB5 = "-" . $Kriteria[9][2] . "<br>" . "\r\n";
                        } else {
                            $EB5 = '';
                        }
                        if ($Evaluasi['Bi6'] < 2) {
                            $EB6 = "-" . $Kriteria[10][2] . "<br>" . "\r\n";
                        } else {
                            $EB6 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekA . '<br>' . "\r\n"
                            . $EA1 . $EA2 . $EA3 . $EA4 . $EA5
                            . "2." . $AspekB . '<br>' . "\r\n"
                            . $EB1 . $EB2 . $EB3 . $EB4 . $EB5 . $EB6;
                    } // EVALUASI A C 
                    else if ($NTA < $Persentase_A['nilai_standar'] && $NTC < $Persentase_C['nilai_standar']) {
                        if ($Evaluasi['Ai1'] < 2) {
                            $EA1 = "-" . $Kriteria[0][2] . "<br>" . "\r\n";
                        } else {
                            $EA1 = '';
                        }
                        if ($Evaluasi['Ai2'] < 3) {
                            $EA2 = "-" . $Kriteria[1][2] . "<br>" . "\r\n";
                        } else {
                            $EA2 = '';
                        }
                        if ($Evaluasi['Ai3'] < 3) {
                            $EA3 = "-" . $Kriteria[2][2] . "<br>" . "\r\n";
                        } else {
                            $EA3 = '';
                        }
                        if ($Evaluasi['Ai4'] < 3) {
                            $EA4 = "-" . $Kriteria[3][2] . "<br>" . "\r\n";
                        } else {
                            $EA4 = '';
                        }
                        if ($Evaluasi['Ai5'] < 2) {
                            $EA5 = "-" . $Kriteria[4][2] . "<br>" . "\r\n";
                        } else {
                            $EA5 = '';
                        }
                        if ($Evaluasi['Ci1'] < 3) {
                            $EC1 = "-" . $Kriteria[11][2] . "<br>" . "\r\n";
                        } else {
                            $EC1 = '';
                        }
                        if ($Evaluasi['Ci2'] < 3) {
                            $EC2 = "-" . $Kriteria[12][2] . "<br>" . "\r\n";
                        } else {
                            $EC2 = '';
                        }
                        if ($Evaluasi['Ci3'] < 2) {
                            $EC3 = "-" . $Kriteria[13][2] . "<br>" . "\r\n";
                        } else {
                            $EC3 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekA . '<br>' . "\r\n"
                            . $EA1 . $EA2 . $EA3 . $EA4 . $EA5
                            . "2." . $AspekC . '<br>' . "\r\n"
                            . $EC1 . $EC2 . $EC3;
                    } // EVALUASI B C
                    else if ($NTB < $Persentase_B['nilai_standar'] && $NTC < $Persentase_C['nilai_standar']) {
                        if ($Evaluasi['Bi1'] < 2) {
                            $EB1 = "-" . $Kriteria[5][2] . "<br>" . "\r\n";
                        } else {
                            $EB1 = '';
                        }
                        if ($Evaluasi['Bi2'] < 2) {
                            $EB2 = "-" . $Kriteria[6][2] . "<br>" . "\r\n";
                        } else {
                            $EB2 = '';
                        }
                        if ($Evaluasi['Bi3'] < 3) {
                            $EB3 = "-" . $Kriteria[7][2] . "<br>" . "\r\n";
                        } else {
                            $EB3 = '';
                        }
                        if ($Evaluasi['Bi4'] < 3) {
                            $EB4 = "-" . $Kriteria[8][2] . "<br>" . "\r\n";
                        } else {
                            $EB4 = '';
                        }
                        if ($Evaluasi['Bi5'] < 3) {
                            $EB5 = "-" . $Kriteria[9][2] . "<br>" . "\r\n";
                        } else {
                            $EB5 = '';
                        }
                        if ($Evaluasi['Bi6'] < 2) {
                            $EB6 = "-" . $Kriteria[10][2] . "<br>" . "\r\n";
                        } else {
                            $EB6 = '';
                        }
                        if ($Evaluasi['Ci1'] < 3) {
                            $EC1 = "-" . $Kriteria[11][2] . "<br>" . "\r\n";
                        } else {
                            $EC1 = '';
                        }
                        if ($Evaluasi['Ci2'] < 3) {
                            $EC2 = "-" . $Kriteria[12][2] . "<br>" . "\r\n";
                        } else {
                            $EC2 = '';
                        }
                        if ($Evaluasi['Ci3'] < 2) {
                            $EC3 = "-" . $Kriteria[13][2] . "<br>" . "\r\n";
                        } else {
                            $EC3 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekB . '<br>' . "\r\n"
                            . $EB1 . $EB2 . $EB3 . $EB4 . $EB5 . $EB6
                            . "2." . $AspekC . '<br>' . "\r\n"
                            . $EC1 . $EC2 . $EC3;
                    } // EVALUASI A 
                    else if ($NTA < $Persentase_A['nilai_standar']) {
                        if ($Evaluasi['Ai1'] < 2) {
                            $EA1 = "-" . $Kriteria[0][2] . "<br>" . "\r\n";
                        } else {
                            $EA1 = '';
                        }
                        if ($Evaluasi['Ai2'] < 3) {
                            $EA2 = "-" . $Kriteria[1][2] . "<br>" . "\r\n";
                        } else {
                            $EA2 = '';
                        }
                        if ($Evaluasi['Ai3'] < 3) {
                            $EA3 = "-" . $Kriteria[2][2] . "<br>" . "\r\n";
                        } else {
                            $EA3 = '';
                        }
                        if ($Evaluasi['Ai4'] < 3) {
                            $EA4 = "-" . $Kriteria[3][2] . "<br>" . "\r\n";
                        } else {
                            $EA4 = '';
                        }
                        if ($Evaluasi['Ai5'] < 2) {
                            $EA5 = "-" . $Kriteria[4][2] . "<br>" . "\r\n";
                        } else {
                            $EA5 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekA . '<br>' . "\r\n"
                            . $EA1 . $EA2 . $EA3 . $EA4 . $EA5;
                    } // EVALUASI B
                    else if ($NTB < $Persentase_B['nilai_standar']) {
                        if ($Evaluasi['Bi1'] < 2) {
                            $EB1 = "-" . $Kriteria[5][2] . "<br>" . "\r\n";
                        } else {
                            $EB1 = '';
                        }
                        if ($Evaluasi['Bi2'] < 2) {
                            $EB2 = "-" . $Kriteria[6][2] . "<br>" . "\r\n";
                        } else {
                            $EB2 = '';
                        }
                        if ($Evaluasi['Bi3'] < 3) {
                            $EB3 = "-" . $Kriteria[7][2] . "<br>" . "\r\n";
                        } else {
                            $EB3 = '';
                        }
                        if ($Evaluasi['Bi4'] < 3) {
                            $EB4 = "-" . $Kriteria[8][2] . "<br>" . "\r\n";
                        } else {
                            $EB4 = '';
                        }
                        if ($Evaluasi['Bi5'] < 3) {
                            $EB5 = "-" . $Kriteria[9][2] . "<br>" . "\r\n";
                        } else {
                            $EB5 = '';
                        }
                        if ($Evaluasi['Bi6'] < 2) {
                            $EB6 = "-" . $Kriteria[10][2] . "<br>" . "\r\n";
                        } else {
                            $EB6 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekB . '<br>' . "\r\n"
                            . $EB1 . $EB2 . $EB3 . $EB4 . $EB5 . $EB6;
                    } // EVALUASI C
                    else if ($NTC < $Persentase_C['nilai_standar']) {
                        if ($Evaluasi['Ci1'] < 3) {
                            $EC1 = "-" . $Kriteria[11][2] . "<br>" . "\r\n";
                        } else {
                            $EC1 = '';
                        }
                        if ($Evaluasi['Ci2'] < 3) {
                            $EC2 = "-" . $Kriteria[12][2] . "<br>" . "\r\n";
                        } else {
                            $EC2 = '';
                        }
                        if ($Evaluasi['Ci3'] < 2) {
                            $EC3 = "-" . $Kriteria[13][2] . "<br>" . "\r\n";
                        } else {
                            $EC3 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekC . '<br>' . "\r\n"
                            . $EC1 . $EC2 . $EC3;
                    }
                } else if ($NHA > $MinHA) {
                    $LapHA = " Kinerja Dosen Bagus";
                }
                // SIMPAN DATA
                if (mysqli_num_rows($queryLaporan) <= 0) {
                    $sqlLaporan =  mysqli_query($koneksi, "INSERT INTO laporan values('', '{$Evaluasi['npk']}', '{$Evaluasi['nama_dosen']}','{$LapA}', '{$LapB}', '{$LapC}', '{$LapHA}')");
                } else if (mysqli_num_rows($queryHasil_Akhir) > 0) {
                    $sqlLaporan =  mysqli_query($koneksi, "DELETE FROM laporan WHERE npk_dosen='{$Evaluasi['npk']}'");
                    $sqlLaporan =  mysqli_query($koneksi, "REPLACE INTO laporan values('', '{$Evaluasi['npk']}', '{$Evaluasi['nama_dosen']}','{$LapA}', '{$LapB}', '{$LapC}', '{$LapHA}')");
                }
            }
        }
        header("refresh:0.5;{$_url}laporan");
    }
    ?>
    <h2>
        <a href="<?= $_url ?>" class="mif-arrow-left mif-2x"><span></span></a>
        Dashboard
    </h2>

    <?php
    if (isset($_POST['print'])) {
        header("Location: {$_url}laporan/cetak_nilai");
    }
    ?>

    <table class="table table-sm table-bordered table-striped">
        <thead class="thead-light">
            <tr height="40px">
                <th width="5%" style="text-align: center;">No</th>
                <th width="8%" style="text-align: center;">NIDN</th>
                <th width="40%" style="text-align: center;">Nama</th>
                <th width="8%">Penggunaan Teknologi</th>
                <th width="8%">Pembelajaran</th>
                <th width="8%">Kedisiplinan</th>
                <th width="5%">Nilai Akhir</th>
                <th width="5%">Ket</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM hasil_akhir INNER JOIN dosen WHERE hasil_akhir.npk_dosen = dosen.npk");
            $no = 1;
            while ($LHA = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $LHA['npk_dosen']; ?></td>
                    <td><?= $LHA['nama_dosen']; ?>, <?= $LHA['gelar']; ?></td>
                    <td style="text-align: center;"><?= $LHA['nilai_penggunaan_teknologi']; ?></td>
                    <td style="text-align: center;"><?= $LHA['nilai_proses_pembelajaran']; ?></td>
                    <td style="text-align: center;"><?= $LHA['nilai_kedisiplinan']; ?></td>
                    <td style="text-align: center;" class="table-success"><?= $LHA['nilai_akhir']; ?></td>
                    <td style="text-align: center;" class="table-danger"><?= $LHA['nilai_akhir'] - $MIN; ?></td>
                </tr>
            <?php } ?>
        </tbody>

        <form method="POST">
            <span class="place-right" style="margin-top: 60px; margin-left: 5px;">
                <button type="print" name="print" class="button success">Print</button>
            </span>
            <span class="place-right" style="margin-top: 60px; margin-left: 5px;">
                <button type=" laporan" name="laporan" class=" button success">laporan</button>
            </span>
            <span class="place-right" style="margin-top: 60px; margin-left: 5px;">
                <button type=" singkronasi" name="singkronasi" class=" button success mif-spinner3 mif-1x "> singkron</button>
            </span>
            <h4 style="margin-top: 30px; text-align: left;">
                DAFTAR NILAI KINERJA DOSEN MENGAJAR SECARA DARING
            </h4>
            <h5 style="margin-top: 10px;">
                <p style="font-size: medium;"><?= $Persentase_A['nama_aspek']; ?> <?= $Persentase_A['persentase']; ?>%,
                    <?= $Persentase_B['nama_aspek']; ?> <?= $Persentase_B['persentase']; ?>%,
                    <?= $Persentase_C['nama_aspek']; ?> <?= $Persentase_C['persentase']; ?>%,
                    Nilai Minimum = <?= $MIN; ?></p>
            </h5>
        </form>

    </table>
    <style>
        td,
        th {
            font-family: Arial, Helvetica, sans-serif;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: medium;
        }
    </style>

</body>

</html>