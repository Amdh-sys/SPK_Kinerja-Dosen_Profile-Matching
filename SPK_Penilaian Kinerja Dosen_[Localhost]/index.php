<?php
include("config/main.php");
include("config/routing.php");
?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="KRS Online yang digunakan untuk mengatur kartu rencana studi mahasiswa">
    <meta name="keywords" content="KRS, SIM, Mahasiswa, Unmuh Jember">
    <meta name="author" content="Taffai Kassan">

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />

    <link href="<?= $_url ?>css/metro.css" rel="stylesheet">
    <link href="<?= $_url ?>css/metro-icons.css" rel="stylesheet">
    <link href="<?= $_url ?>css/docs.css" rel="stylesheet">

    <script src="<?= $_url ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?= $_url ?>js/metro.js"></script>

    <style type="text/css">
        body {
            font-family: "Verdana";
        }

        /* Sticky footer styles
    -------------------------------------------------- */

        html,
        body {
            height: 100%;
            /* The html and body elements cannot have any padding or margin. */
        }

        /* Wrapper for page content to push down footer */
        #wrap {
            min-height: 100%;
            height: auto;
            /* Negative indent footer by its height */
            margin: 0 auto -60px;
            /* Pad bottom by footer height */
            padding: 60px 0 60px;
        }

        /* Set the fixed height of the footer here */
        #footer {
            height: 60px;
            background-color: #f5f5f5;
        }
    </style>

</head>

<body>
    <header class="app-bar fixed-top" data-role="appbar">
        <div class="container">
            <a href="<?= $_url ?>" class="app-bar-element branding">SPK KINERJA</a>

            <?php if ($_access != '') : ?>
                <ul class="app-bar-menu place-right" data-flexdirection="reverse">
                    <li>
                        <a href="#" class="dropdown-toggle"><?= $_name ?> (<?= $_access ?>)</a>
                        <ul class="d-menu place-right" data-role="dropdown" data-no-close="true">
                            <?php if ($_access == 'dosen') : ?>
                                <li><a href="<?= $_url ?>dosen/view/<?= $_username ?>/<?= urlencode($_name) ?>">Profile</a></li>
                            <?php elseif ($_access == 'kaprodi') : ?>
                                <li><a href="<?= $_url ?>dosen/view/<?= $_username ?>/<?= urlencode($_name) ?>">Profile</a></li>
                            <?php elseif ($_access == 'mahasiswa') : ?>
                                <li><a href="<?= $_url ?>mahasiswa/view/<?= $_username ?>/<?= urlencode($_name) ?>">Profile</a></li>
                            <?php endif; ?>
                            <li><a href="<?= $_url ?>user/change-password">Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= $_url ?>sign/out">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>

                <span class="app-bar-pull"></span>
            <?php endif; ?>

        </div>
    </header>

    <div id="wrap">
        <div class="container page-content">

            <?php

            echo $_content;

            ?>

        </div>
    </div>

    <footer id="footer" style="background-color:#A9A9A9">
        <div class="align-center padding20" style="color: white;">
            Copyright @ Adam Hudayanto
        </div>
        </div>
    </footer>

</body>

</html>