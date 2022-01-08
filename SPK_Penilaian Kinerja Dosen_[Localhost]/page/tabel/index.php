<html>
<title>Pemetaan dan Pembobotan GAP</title>

<body>
    <?php
    include 'aset/query_gap.php';
    include 'aset/hitung_bobot.php';
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <?php
    if (isset($_POST['nilaicf'])) {
        header("Location: {$_url}tabel/tabel_nilai_bobot");
    }
    ?>
    <h2 style="margin-bottom: 20px;">
        <a href="<?= $_url ?>penilaian" class="mif-arrow-left mif-2x"><span></span></a>
        Nilai Dosen
    </h2>
    <html>
    <h3 style="margin-bottom: 20px;">
        1. PEMETAAN GAP
    </h3>

    <body>
        <table class="table table-sm table-bordered table-striped">
            <thead class="thead-light">
                <tr height="40px">
                    <th width="5%" style="text-align: center;">No</th>
                    <th width="10%" style="text-align: center;">NIDN</th>
                    <th width="5%" style="text-align: center;">AI1</th>
                    <th width="5%" style="text-align: center;">AI2</th>
                    <th width="5%" style="text-align: center;">AI3</th>
                    <th width="5%" style="text-align: center;">AI4</th>
                    <th width="5%" style="text-align: center;">AI5</th>
                    <th width="5%" style="text-align: center;">BI1</th>
                    <th width="5%" style="text-align: center;">BI2</th>
                    <th width="5%" style="text-align: center;">BI3</th>
                    <th width="5%" style="text-align: center;">BI4</th>
                    <th width="5%" style="text-align: center;">BI5</th>
                    <th width="5%" style="text-align: center;">BI6</th>
                    <th width="5%" style="text-align: center;">CI1</th>
                    <th width="5%" style="text-align: center;">CI2</th>
                    <th width="5%" style="text-align: center;">CI3</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($query) > 0) :
                    $no = 1;
                    while ($field = mysqli_fetch_array($query)) :
                ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++; ?></td>
                            <td><?= $field['npk'] ?></td>
                            <td style="text-align: cenign: ceter;"><?= $GapAi1 = $field['Ai1'] -  $queryKriteria['Ai1'] ?></td>
                            <td style="text-align: center;"><?= $GapAi2 = $field['Ai2'] -  $queryKriteria['Ai2'] ?></td>
                            <td style="text-align: center;"><?= $GapAi3 = $field['Ai3'] -  $queryKriteria['Ai3'] ?></td>
                            <td style="text-align: center;"><?= $GapAi4 = $field['Ai4'] -  $queryKriteria['Ai4'] ?></td>
                            <td style="text-align: center;"><?= $GapAi5 = $field['Ai5'] -  $queryKriteria['Ai5'] ?></td>
                            <td style="text-align: center;"><?= $GapBi1 = $field['Bi1'] -  $queryKriteria['Bi1'] ?></td>
                            <td style="text-align: center;"><?= $GapBi2 = $field['Bi2'] -  $queryKriteria['Bi2'] ?></td>
                            <td style="text-align: center;"><?= $GapBi3 = $field['Bi3'] -  $queryKriteria['Bi3'] ?></td>
                            <td style="text-align: center;"><?= $GapBi4 = $field['Bi4'] -  $queryKriteria['Bi4'] ?></td>
                            <td style="text-align: center;"><?= $GapBi5 = $field['Bi5'] -  $queryKriteria['Bi5'] ?></td>
                            <td style="text-align: center;"><?= $GapBi6 = $field['Bi6'] -  $queryKriteria['Bi6'] ?></td>
                            <td style="text-align: center;"><?= $GapCi1 = $field['Ci1'] -  $queryKriteria['Ci1'] ?></td>
                            <td style="text-align: center;"><?= $GapCi2 = $field['Ci2'] -  $queryKriteria['Ci2'] ?></td>
                            <td style="text-align: center;"><?= $GapCi3 = $field['Ci3'] -  $queryKriteria['Ci3'] ?></td>
                        </tr>
                <?php
                    endwhile;
                endif;
                ?>
            </tbody>
        </table>

        <?php
        include 'aset/query_gap.php';
        ?>

        <h3 style="margin-bottom: 20px;">
            2. PEMBOBOTAN GAP
        </h3>
        <table class="table table-sm table-bordered table-striped">
            <thead class="thead-light">
                <tr height="40px">
                    <th width="5%" style="text-align: center;">No</th>
                    <th width="10%" style="text-align: center;">NIDN</th>
                    <th width="5%" style="text-align: center;">AI1</th>
                    <th width="5%" style="text-align: center;">AI2</th>
                    <th width="5%" style="text-align: center;">AI3</th>
                    <th width="5%" style="text-align: center;">AI4</th>
                    <th width="5%" style="text-align: center;">AI5</th>
                    <th width="5%" style="text-align: center;">BI1</th>
                    <th width="5%" style="text-align: center;">BI2</th>
                    <th width="5%" style="text-align: center;">BI3</th>
                    <th width="5%" style="text-align: center;">BI4</th>
                    <th width="5%" style="text-align: center;">BI5</th>
                    <th width="5%" style="text-align: center;">BI6</th>
                    <th width="5%" style="text-align: center;">CI1</th>
                    <th width="5%" style="text-align: center;">CI2</th>
                    <th width="5%" style="text-align: center;">CI3</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($query) > 0) :
                    $no = 1;
                    while ($field = mysqli_fetch_array($query)) :
                ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++; ?></td>
                            <td><?= $field['npk'] ?></td>
                            <td style="text-align: center;"><?= $b_Ai1 = hitungBobot($field['Ai1'] - $queryKriteria['Ai1']) ?></td>
                            <td style="text-align: center;"><?= $b_Ai2 = hitungBobot($field['Ai2'] - $queryKriteria['Ai2']) ?></td>
                            <td style="text-align: center;"><?= $b_Ai3 = hitungBobot($field['Ai3'] - $queryKriteria['Ai3']) ?></td>
                            <td style="text-align: center;"><?= $b_Ai4 = hitungBobot($field['Ai4'] - $queryKriteria['Ai4']) ?></td>
                            <td style="text-align: center;"><?= $b_Ai5 = hitungBobot($field['Ai5'] - $queryKriteria['Ai5']) ?></td>
                            <td style="text-align: center;"><?= $b_Bi1 = hitungBobot($field['Bi1'] - $queryKriteria['Bi1']) ?></td>
                            <td style="text-align: center;"><?= $b_Bi2 = hitungBobot($field['Bi2'] - $queryKriteria['Bi2']) ?></td>
                            <td style="text-align: center;"><?= $b_Bi3 = hitungBobot($field['Bi3'] - $queryKriteria['Bi3']) ?></td>
                            <td style="text-align: center;"><?= $b_Bi4 = hitungBobot($field['Bi4'] - $queryKriteria['Bi4']) ?></td>
                            <td style="text-align: center;"><?= $b_Bi5 = hitungBobot($field['Bi5'] - $queryKriteria['Bi5']) ?></td>
                            <td style="text-align: center;"><?= $b_Bi6 = hitungBobot($field['Bi6'] - $queryKriteria['Bi6']) ?></td>
                            <td style="text-align: center;"><?= $b_Ci1 = hitungBobot($field['Ci1'] - $queryKriteria['Ci1']) ?></td>
                            <td style="text-align: center;"><?= $b_Ci2 = hitungBobot($field['Ci2'] - $queryKriteria['Ci2']) ?></td>
                            <td style="text-align: center;"><?= $b_Ci3 = hitungBobot($field['Ci3'] - $queryKriteria['Ci3']) ?></td>
                        </tr>
                <?php
                    endwhile;
                endif;
                ?>
            </tbody>
        </table>

        <form method="POST">
            <span class="place-right" style="margin-top: -5px;">
                <button type="nilaicf" name="nilaicf" class="button success">Nilai Core / Secondary</button>
            </span>
        </form>
        <br><br><br>
    </body>
    <style>
        td,
        th {
            font-family: Arial, Helvetica, sans-serif;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: medium;
        }
    </style>

    </html>

</body>

</html>