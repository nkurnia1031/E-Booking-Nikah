<?php
session_start();
$Session = $_SESSION;

$Request = json_decode(json_encode($_REQUEST));

require_once "vendor/autoload.php";
date_default_timezone_set('Asia/Jakarta');
if (!isset($_GET['hal'])) {
    echo "<script>
location.href = '?hal=Home';
</script>";
}
if (
    $_GET['hal'] != 'Login'
    && $_GET['hal'] != 'Logout'
    && $_GET['hal'] != 'Home'
    && $_GET['hal'] != 'Register'
    && $_GET['hal'] != 'Paket'
    && $_GET['hal'] != 'Tentang'
    && $_GET['hal'] != 'Gallery'
) {
    if (!isset($Session['admin'])) {
        echo "<script>
alert('Anda belum login, silahkan login');
</script>";
        echo "<script>
location.href = '?hal=Login';
</script>";
    }
}

require 'app/class.php';
$Controller = new Controller($_REQUEST);

$komponen = 'views/Komponen';
$data = $Controller->Data;
include 'views/html.php';
/* Start to develop here. Best regards https://php-download.com/ */
