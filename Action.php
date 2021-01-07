<?php
session_start();

require_once "vendor/autoload.php";
require 'app/class.php';
$Crud = Crud::idupin()->mysqli2;
$Request = json_decode(json_encode($_REQUEST));
$aksi = $Request->aksi;
$link = $_SERVER['HTTP_REFERER'];
$pesan = 'Berhasil';
if (isset($Request->link)) {
    $link = $Request->link;
}
if (isset($Request->pesan)) {
    $pesan = $Request->pesan;
}

$aksi($Request, $Crud, $link, $pesan);
function insert($Request, $Crud, $link, $pesan)
{
    $tb = $Request->tb;
    $input = $Request->input;
    $table = $Request->table;
    if ($table == 'pemesanan') {
        $cek = collect($Crud->table('pemesanan')->select()->where('status', '!=', 'Dibatalkan')->where('tgl_acara', $input[3])->get());
        if ($cek->isNotEmpty()) {
            $pesan = "Maaf sudah ada yang membooking acara pada tanggal yang anda pilih";
            $link = $_SERVER['HTTP_REFERER'];

            echo "<script>alert('$pesan')</script>";
            echo "<script>location.href='$link'</script>";
            die();
        }
    }
    if (isset($_FILES['input'])) {
        if ($_FILES['input']['size'][0] > 0) {
            $upload = Fungsi::upload($_FILES['input']);
            if ($upload->status) {
                array_push($input, $upload->nama);
                array_push($tb, "url");
            } else {
                $pesan = $upload->error;
                echo "<script>alert('$pesan')</script>";
                echo "<script>location.href='$link'</script>";
                die();
            }

        }
    }

    $tes = collect($tb);
    $ar = $tes->combine($input)->toArray();
    $Crud->table($table)->insert($ar)->execute();
}
function update($Request, $Crud, $link, $pesan)
{
    $tb = $Request->tb;
    $input = $Request->input;
    $table = $Request->table;
    if (isset($_FILES['input'])) {
        if ($_FILES['input']['size'][0] > 0) {
            $upload = Fungsi::upload($_FILES['input']);
            if ($upload->status) {
                array_push($input, $upload->nama);
                array_push($tb, "url");
            } else {
                $pesan = $upload->error;
                echo "<script>alert('$pesan')</script>";
                echo "<script>location.href='$link'</script>";
                die();
            }

        }
    }
    $tes = collect($tb);
    $ar = $tes->combine($input)->toArray();
    if (is_array($Request->primary)) {
        $t = $Crud->table($table)->update($ar);
        foreach ($Request->primary as $v => $k) {
            $t = $t->where($Request->primary[$v], $Request->key[$v]);
        }
        $t = $t->execute();
    } else {
        $Crud->table($table)->update($ar)->where($Request->primary, $Request->key)->execute();
    }
    if ($table == 'user') {

        $_SESSION['admin'] = $Crud->table('user')->select()->where('iduser', $Request->key)->get()[0];
    }
}
function delete($Request, $Crud, $link, $pesan)
{
    $table = $Request->table;
    if (is_array($Request->primary)) {
        $t = $Crud->table($table)->delete();
        foreach ($Request->primary as $v => $k) {
            $t = $t->where($Request->primary[$v], $Request->key[$v]);
        }
        $t = $t->execute();
    } else {

        $Crud->table($table)->delete()->where($Request->primary, $Request->key)->execute();
    }

}
echo "<script>alert('$pesan')</script>";

echo "<script>location.href='$link'</script>";
