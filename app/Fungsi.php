<?php

/**
 *
 */

class Fungsi
{

    public static $type = [
        'varchar' => 'text',
        'text' => 'text',
        'json' => 'text',
        'longtext' => 'text',
        'int' => 'number',
        'decimal' => 'number',
        'tinyint' => 'number',
        'date' => 'date',
        'time' => 'time',
        'year' => 'year',
        'enum' => 'text',
    ];

    public static $hari = [
        1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Minggu',

    ];
    public static $bulan = array(
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    );
    public static function hariini()
    {
        return date('d') . " " . Fungsi::$bulan[date('n')] . " " . date('Y');
    }
    public static function upload($file, $ekstensi2 = array('png', 'jpg'), $size = 1044070, $path = 'upload/')
    {
        $nama = $file['name'][0];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $nama = uniqid() . "." . $ekstensi;
        $result = [
            'nama' => $nama,
            'status' => false,
            'error' => "Sukses",
        ];
        $result = json_decode(json_encode($result));
        $ukuran = $file['size'][0];
        $file_tmp = $file['tmp_name'][0];
        if (in_array($ekstensi, $ekstensi2) === true) {
            if ($ukuran < $size * 5) {
                move_uploaded_file($file_tmp, $path . $nama);
                $result->status = true;
            } else {
                $result->error = 'UKURAN FILE TERLALU BESAR';

            }
        } else {
            $result->error = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        }
        return $result;
    }

}
