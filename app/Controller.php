<?php

/**
 *
 */
use ClanCats\Hydrahon\Query\Expression as Ex;

class Controller
{
    public $Request;
    public $Data;
    public $Crud;
    public function __construct($Request)
    {
        $this->Crud = Crud::idupin();

        $this->Request = json_decode(json_encode($Request));
        $hal = $this->Request->hal;
        $this->$hal();

    }
    public function fields($tb)
    {

        return dd($this->Crud->getFields($tb)->toJson());
    }
    public function Login()
    {
        $data = [
            'judul' => 'Login',
            'path' => 'Login',
            'link' => 'Login',

        ];
        $Request = $this->Request;
        $this->Data = $data;
        if (isset($Request->login)) {
            $data['admin'] = collect($this->Crud->mysqli2->table('user')->select()->where('user', $Request->user)->where('pass', $Request->pass)->get());
            if ($data['admin']->isEmpty()) {
                echo "<script>alert('Maaf, Username atau Password yang anda inputkan salah');</script>";
                echo "<script>location.href = '?hal=Login';</script>";
                die();
            } else {
                $_SESSION['admin'] = $data['admin']->first();
                echo "<script>alert('Berhasil');</script>";
                echo "<script>location.href = '?hal=Home';</script>";
                die();
            }

        }
    }
    public function Tentang()
    {
        $data = [
            'judul' => 'Tentang Kami',
            'path' => 'Tentang',
            'induk' => 'Informasi',
            'link' => 'Tentang',
            'icon' => 'fa-store-alt',

        ];
        $data['a'] = scandir('mine/foto');
        array_shift($data['a']);
        array_shift($data['a']);
        $this->Data = $data;

    }
    public function Syarat()
    {
        $data = [
            'judul' => 'SYARAT & KETENTUAN PEMESANAN',
            'path' => 'Syarat',
            'induk' => 'Informasi',
            'link' => 'Syarat',
            'icon' => 'fa-store-alt',

        ];

        $this->Data = $data;

    }
    public function Jadwal()
    {
        $data = [
            'judul' => 'Cek Jadwal',
            'path' => 'Jadwal',
            'induk' => 'Informasi',
            'link' => 'Jadwal',
            'icon' => 'fa-store-alt',

        ];
        $cek = collect($this->Crud->mysqli2->table('pemesanan')->select()->where('status', '!=', 'Dibatalkan')->get());
        $data['jadwal'] = array();
        foreach ($cek as $k) {

            $x = [
                "start" => $k->tgl_acara,
                "display" => 'background',
                "color" => "#dc3545",
            ];
            array_push($data['jadwal'], $x);
        }

        $this->Data = $data;

    }
    public function Gallery()
    {
        $data = [
            'judul' => 'Gallery Baju Adat',
            'path' => 'Gallery',
            'link' => 'Gallery',
            'icon' => 'fa-store-alt',

        ];
        $isi = $this->Request->isi;
        if ($isi == '0') {
            $data['judul'] = 'Gallery Baju Selayar';
        }
        if ($isi == '1') {
            $data['judul'] = 'Gallery Baju Adat';
        }
        if ($isi == '2') {
            $data['judul'] = 'Gallery Dekorasi Pelaminan';
        }
        $data['a'] = scandir('galeri/gallery' . $isi);
        array_shift($data['a']);
        array_shift($data['a']);
        $data['a'] = collect($data['a'])->mapWithKeys(function ($item) use ($isi) {
            $x = scandir('galeri/gallery' . $isi . '/' . $item);
            array_shift($x);
            array_shift($x);
            return [$item => $x];

        });
        $this->Data = $data;

    }
    public function Logout()
    {
        session_destroy();
        echo "<script>alert('Berhasil');</script>";
        echo "<script>location.href = '?hal=Login';</script>";
        die();
    }
    public function Register()
    {
        $data = [
            'judul' => 'Register',
            'path' => 'Register',
            'link' => 'Register',

        ];
        //$this->fields('user');
        $fields1 = '[
                {"name":"iduser","label":"ID User","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"nama","label":"Nama Lengkap","type":"text","max":"30","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"alamat","label":"Alamat","type":"text","max":"40","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"jk","label":"Jenis Kelamin","type":"text","max":"10","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"hp","label":"No HP","type":"number","max":"99999999999","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}

                ]';
        $data['user.form'] = json_decode($fields1, true);
        $fields1 = '[

                {"name":"user","label":"Username","type":"text","max":"15","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"pass","label":"Password","type":"password","max":"15","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['user.form2'] = json_decode($fields1, true);

        $data['user'] = $this->Crud->mysqli2->table('user')->select('iduser')->orderBy('iduser', 'desc')->limit(1)->get();
        $data['user.form'][0]['val'] = "U" . sprintf('%05d', intval(substr($data['user']->iduser, 1)) + 1);

        $this->Data = $data;
    }
    public function Akun()
    {
        $data = [
            'judul' => 'Kelola Akun',
            'path' => 'Akun',
            'link' => 'Akun',

        ];
        //$this->fields('user');
        $fields1 = '[
                {"name":"iduser","label":"ID User","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"nama","label":"Nama Lengkap","type":"text","max":"30","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"alamat","label":"Alamat","type":"text","max":"40","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"jk","label":"Jenis Kelamin","type":"text","max":"10","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"hp","label":"No HP","type":"number","max":"99999999999","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}

                ]';
        $data['user.form'] = json_decode($fields1, true);
        $fields1 = '[

                {"name":"user","label":"Username","type":"text","max":"15","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"pass","label":"Password","type":"password","max":"15","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['user.form2'] = json_decode($fields1, true);

        $data['user'] = $this->Crud->mysqli2->table('user')->select()->where('iduser', $_SESSION['admin']->iduser)->get()[0];
        foreach ($data['user.form'] as $v => $k) {
            $b = $k['name'];
            $data['user.form'][$v]['val'] = $data['user']->$b;
        }
        foreach ($data['user.form2'] as $v => $k) {
            $b = $k['name'];
            $data['user.form2'][$v]['val'] = $data['user']->$b;
        }

        $this->Data = $data;
    }
    public function Home()
    {
        $data = [
            'judul' => 'Home',
            'path' => 'Home',
            'link' => 'Home',
            'icon' => 'fa-home',

            'warna' => 'primary',

        ];
        $data['a'] = scandir('foto');
        array_shift($data['a']);
        array_shift($data['a']);
        $this->Data = $data;
    }

    public function Paket()
    {
        $data = [
            'judul' => 'Paket Pernikahan',
            'path' => 'Paket',
            'link' => 'Paket',
            'icon' => 'fa-heart',
            'warna' => 'danger',

        ];
        // $this->fields('paket');

        $fields1 = '[
                {"name":"idpaket","label":"ID Paket","type":"text","max":"5","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"nama_paket","label":"Nama Paket","type":"text","max":"30","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"desk","label":"Deskripsi","type":"text","max":"500","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"harga","label":"Harga","type":"number","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"url","label":"Gambar","type":"text","max":"65535","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['paket.form'] = json_decode($fields1, true);

        $data['paket'] = collect($this->Crud->mysqli2->table('paket')->select()->get())->map(function ($item, $key) {
            $item->desk = explode("\r\n", $item->desk);
            return $item;
        });

        $this->Data = $data;
    }
    public function KPaket()
    {
        $data = [
            'judul' => 'Kelola Paket',
            'path' => 'KPaket',
            'link' => 'KPaket',
            'icon' => 'fa-plus',
            'warna' => 'danger',

        ];
        // $this->fields('paket');

        $fields1 = '[
                {"name":"idpaket","label":"ID Paket","type":"text","max":"5","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"nama_paket","label":"Nama Paket","type":"text","max":"30","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"desk","label":"Deskripsi","type":"textarea","max":"500","pnj":12,"val":null,"red":"required placeholder=\'Gunakan enter untuk memisahkan tiap barisnya\' ","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"harga","label":"Harga","type":"number","max":null,"pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"url","label":"Gambar","type":"file","max":"65535","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['paket.form'] = json_decode($fields1, true);
        $Request = $this->Request;

        $data['paket'] = $this->Crud->mysqli2->table('paket')->select('idpaket')->orderBy('idpaket', 'desc')->limit(1)->get();
        $data['paket.form'][0]['val'] = "P" . sprintf('%05d', intval(substr($data['paket']->idpaket, 1)) + 1);
        if (isset($Request->key)) {
            $data['paket'] = $this->Crud->mysqli2->table('paket')->select()->where('idpaket', $Request->key)->get();
            foreach ($data['paket.form'] as $v => $k) {
                $b = $k['name'];
                $data['paket.form'][$v]['val'] = $data['paket'][0]->$b;
            }
        }

        $this->Data = $data;
    }
    public function PPaket()
    {
        $data = [
            'judul' => 'Pemesanan Paket',
            'path' => 'PPaket',
            'link' => 'PPaket',
            'icon' => 'fa-calendar-plus',
            'warna' => 'danger',

        ];
        //$this->fields('pemesanan');
        $Session = $_SESSION;
        $Request = $this->Request;
        $fields1 = '[
               {"name":"idpemesanan","label":"ID Pemesanan","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"iduser","label":"ID User","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"nama","label":"Nama Lengkap","type":"date","max":null,"pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},

               {"name":"tgl_pesan","label":"Tanggal Pesan","type":"date","max":null,"pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}

                ]';
        $data['paket.form'] = json_decode($fields1, true);

        $fields1 = '[

               {"name":"tgl_acara","label":"Tanggal Acara","type":"date","max":null,"pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}

                ]';
        $data['paket.form2'] = json_decode($fields1, true);
        $data['paket'] = $this->Crud->mysqli2->table('pemesanan')->select('idpemesanan')->orderBy('idpemesanan', 'desc')->limit(1)->get();
        if ($data['paket']) {
            $data['paket.form'][0]['val'] = "PP" . sprintf('%05d', intval(substr($data['paket']->idpemesanan, 2)) + 1);
        } else {
            $data['paket.form'][0]['val'] = "PP" . sprintf('%05d', intval(0) + 1);

        }
        $data['paket.form'][1]['val'] = $Session['admin']->iduser;
        $data['paket.form'][2]['val'] = $Session['admin']->nama;
        $data['paket.form'][3]['val'] = date('Y-m-d');
        if (isset($Request->idpaket)) {
            $data['paket'] = $this->Crud->mysqli2->table('paket')->select()->where('idpaket', $Request->idpaket)->get()[0];
        }

        $this->Data = $data;
    }
    public function KPesanan()
    {
        $data = [
            'judul' => 'Kelola Pesanan',
            'path' => 'KPesanan',
            'link' => 'KPesanan',
            'icon' => 'fa-pencil-alt',
            'warna' => 'danger',

        ];
        //===$this->fields('pemesanan');
        $Session = $_SESSION;
        $link = $_SERVER['HTTP_REFERER'];

        $Request = $this->Request;

        $fields1 = '[
               {"name":"idpemesanan","label":"ID Pemesanan","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"iduser","label":"ID User","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"nama","label":"Nama Lengkap","type":"date","max":null,"pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},

               {"name":"tgl_pesan","label":"Tanggal Pesan","type":"date","max":null,"pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}

                ]';
        $data['paket.form'] = json_decode($fields1, true);

        $fields1 = '[

               {"name":"tgl_acara","label":"Tanggal Acara","type":"date","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}

                ]';
        $data['paket.form2'] = json_decode($fields1, true);
        // $data['paket'] = collect($this->Crud->mysqli2->table('paket')->select()->get());
        $data['paket.form'][0]['val'] = $Request->key;

        $data['paket'] = collect($this->Crud->mysqli2->table('pemesanan')->select()->join('paket', 'paket.idpaket', '=', 'pemesanan.idpaket')->join('user', 'user.iduser', '=', 'pemesanan.iduser')->where('pemesanan.idpemesanan', $Request->key)->get());
        $data['diskusi'] = collect($this->Crud->mysqli2->table('diskusi')->select()->where('idpemesanan', $Request->key)->get())->sortBy('terkirim');
        $data['diskusi'] = $data['diskusi']->map(function ($item, $key) {
            $item->tgl = date_format(date_create($item->terkirim), 'd/m/Y');
            $item->time = date_format(date_create($item->terkirim), 'H:i');
            return $item;
        })->groupBy('tgl');

        if ($Session['admin']->akses == 'Pelanggan') {
            $data['paket'] = $data['paket']->where('iduser', $Session['admin']->iduser);
        }
        if ($data['paket']->isEmpty()) {
            echo "<script>alert('Pesanan tidak di temukan')</script>";
            echo "<script>location.href='$link'</script>";
            die();
        }
        $data['paket'] = $data['paket']->first();
        $data['paket.form'][3]['val'] = $data['paket']->tgl_pesan;
        $data['paket.form2'][0]['val'] = $data['paket']->tgl_acara;
        $data['paket.form'][1]['val'] = $data['paket']->iduser;

        $data['paket.form'][2]['val'] = $data['paket']->nama;
        if ($Session['admin']->akses == 'Admin') {
            $data['paket.form2'][0]['red'] = "readonly";
        }
        $data['paket_tambahan'] = collect($this->Crud->mysqli2->table('paket_tambahan')->select()->get());
        $data['tambahan'] = collect($this->Crud->mysqli2->table('tambahan')->select()->join('paket_tambahan', 'paket_tambahan.idpt', '=', 'tambahan.idpt')->where('idpemesanan', $Request->key)->get());
        $data['tambahan'] = $data['tambahan']->groupBy('idpt')->map(function ($item, $key) {
            $a = $item[0];
            $a->qty = $item->sum('qty');
            $a->jum = $item->sum('qty') * $a->harga;
            return $a;
        });
        $data['pembayaran'] = $this->Crud->mysqli2->table('pembayaran')->select('idpembayaran')->orderBy('idpembayaran', 'desc')->limit(1)->get();
        if ($data['pembayaran']) {
            $data['idpembayaran'] = "Pay-" . sprintf('%05d', intval(substr($data['pembayaran']->idpembayaran, 4)) + 1);

        } else {
            $data['idpembayaran'] = "Pay-" . sprintf('%05d', +1);

        }
        $data['pembayaran'] = collect($this->Crud->mysqli2->table('pembayaran')->select()->where('idpemesanan', $Request->key)->get());

        $this->Data = $data;
    }
    public function Pesanan()
    {
        $data = [
            'judul' => 'Data Pesanan',
            'path' => 'Pesanan',
            'link' => 'Pesanan',
            'icon' => 'fa-calendar-alt',
            'warna' => 'danger',

        ];
        //$this->fields('pemesanan');
        $Session = $_SESSION;

        $fields1 = '[
               {"name":"idpemesanan","label":"ID Pemesanan","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"tgl_pesan","label":"Tanggal Pesan","type":"date","max":null,"pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"tgl_acara","label":"Tanggal Acara","type":"date","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"nama_paket","label":"Paket","type":"text","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"harga","label":"Harga","type":"number","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"status","label":"Status","type":"number","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}


                ]';
        $data['pemesanan.form'] = json_decode($fields1, true);
        if ($Session['admin']->akses == 'Pelanggan') {
            $data['pemesanan'] = collect($this->Crud->mysqli2->table('pemesanan')->select()->join('paket', 'paket.idpaket', '=', 'pemesanan.idpaket')->join('user', 'user.iduser', '=', 'pemesanan.iduser')->where('user.iduser', $Session['admin']->iduser)->get());
        } else {
            $data['pemesanan'] = collect($this->Crud->mysqli2->table('pemesanan')->select()->join('paket', 'paket.idpaket', '=', 'pemesanan.idpaket')->join('user', 'user.iduser', '=', 'pemesanan.iduser')->where('akses', 'Pelanggan')->get());

        }
        $data['idpemesanan'] = $data['pemesanan']->pluck('idpemesanan')->toArray();
        $data['pembayaran'] = collect($this->Crud->mysqli2->table('pembayaran')->select()->whereIn('idpemesanan', $data['idpemesanan'])->get());
        $data['tambahan'] = collect($this->Crud->mysqli2->table('tambahan')->select()->join('paket_tambahan', 'paket_tambahan.idpt', '=', 'tambahan.idpt')->whereIn('idpemesanan', $data['idpemesanan'])->get());
        $data['tambahan'] = $data['tambahan']->groupBy('idpemesanan')->map(function ($item, $key) {
            $item->groupBy('idpt')->map(function ($item) {
                $a = $item[0];
                $a->qty = $item->sum('qty');
                $a->jum = $item->sum('qty') * $a->harga;
                return $a;

            });

            return $item;
        });
        $data['pemesanan'] = $data['pemesanan']->where('status', '!=', 'Dibatalkan')->map(function ($item, $key) use ($data) {
            if (array_key_exists($item->idpemesanan, $data['tambahan']->toArray())) {
                if (array_key_exists($item->idpemesanan, $data['tambahan']->toArray())) {
                    $item->tambahan = $data['tambahan'][$item->idpemesanan]->values();
                } else {
                    $item->tambahan = collect([]);
                }
            } else {
                $item->tambahan = collect([]);
            }
            $item->tambahantotal = $item->tambahan->sum('jum');
            $item->totalbayar = $data['pembayaran']->where('idpemesanan', $item->idpemesanan)->where('validasi', "Valid")->sum('nominal');
            $item->total = $item->harga + $item->tambahantotal;
            $item->sisa = $item->total - $item->totalbayar;
            return $item;
        });

        $this->Data = $data;
    }
    public function PaketTambahan()
    {
        $data = [
            'judul' => 'Data Paket Tambahan',
            'path' => 'PaketTambahan',
            'link' => 'PaketTambahan',
            'icon' => 'fa-cart-plus',
            'warna' => 'danger',

        ];
        //$this->fields('paket_tambahan');
        $Session = $_SESSION;
        $Request = $this->Request;

        $fields1 = '[
               {"name":"idpt","label":"ID Paket","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"nama_pt","label":"Nama Paket","type":"text","max":"25","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"satuan","label":"Satuan","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"harga","label":"Harga Satuan","type":"number","max":null,"pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}


                ]';
        $data['form'] = json_decode($fields1, true);
        $data['paket'] = $this->Crud->mysqli2->table('paket_tambahan')->select('idpt')->orderBy('idpt', 'desc')->limit(1)->get();
        if ($data['paket']) {
            $data['form'][0]['val'] = "PT" . sprintf('%05d', intval(substr($data['paket']->idpt, 2)) + 1);

        } else {
            $data['form'][0]['val'] = "PT" . sprintf('%05d', +1);

        }
        $data['paket_tambahan'] = collect($this->Crud->mysqli2->table('paket_tambahan')->select()->get());
        if (isset($Request->key)) {
            $data['paket'] = $data['paket_tambahan']->where('idpt', $Request->key)->first();
            foreach ($data['form'] as $v => $k) {
                $b = $k['name'];
                $data['form'][$v]['val'] = $data['paket']->$b;
            }
        }

        $this->Data = $data;
    }

    public function Pelanggan()
    {
        $data = [
            'judul' => 'Data Pelanggan',
            'path' => 'Pelanggan',
            'link' => 'Pelanggan',
            'icon' => 'fa-users',
            'warna' => 'danger',

        ];
        //$this->fields('user');

        $fields1 = '[
             {"name":"iduser","label":"ID Pelanggan","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
             {"name":"nama","label":"Nama Lengkap","type":"text","max":"30","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
             {"name":"alamat","label":"Alamat","type":"text","max":"40","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
             {"name":"jk","label":"Jenis Kelamin","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
             {"name":"hp","label":"No HP","type":"text","max":"12","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
             {"name":"user","label":"Username","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}


                ]';
        $data['user.form'] = json_decode($fields1, true);
        $data['pelanggan'] = collect($this->Crud->mysqli2->table('user')->select()->where('akses', 'Pelanggan')->get());

        $this->Data = $data;
    }
    public function RPesanan()
    {
        $data = [
            'judul' => 'Riwayat Pesanan',
            'path' => 'RPesanan',
            'link' => 'RPesanan',
            'icon' => 'fa-calendar-alt',
            'warna' => 'danger',

        ];
        //$this->fields('user');
        $Request = $this->Request;
        $fields1 = '[
             {"name":"iduser","label":"ID Pelanggan","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
             {"name":"nama","label":"Nama Lengkap","type":"text","max":"30","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
             {"name":"alamat","label":"Alamat","type":"text","max":"40","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
             {"name":"jk","label":"Jenis Kelamin","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
             {"name":"hp","label":"No HP","type":"text","max":"12","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
             {"name":"user","label":"Username","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}


                ]';
        $data['user.form'] = json_decode($fields1, true);
        $fields1 = '[
               {"name":"idpemesanan","label":"ID Pemesanan","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"tgl_pesan","label":"Tanggal Pesan","type":"date","max":null,"pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"tgl_acara","label":"Tanggal Acara","type":"date","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"nama_paket","label":"Nama Paket","type":"text","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"harga","label":"Harga","type":"number","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"status","label":"Status","type":"number","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}


                ]';
        if ($_SESSION['admin']->akses == 'Pelanggan') {
            $Request->key = $_SESSION['admin']->iduser;
        }
        $data['pemesanan.form'] = json_decode($fields1, true);
        $data['pemesanan'] = collect($this->Crud->mysqli2->table('pemesanan')->select()->join('paket', 'paket.idpaket', '=', 'pemesanan.idpaket')->where('iduser', $Request->key)->get());

        $data['idpemesanan'] = $data['pemesanan']->pluck('idpemesanan')->toArray();
        $data['pembayaran'] = collect($this->Crud->mysqli2->table('pembayaran')->select()->whereIn('idpemesanan', $data['idpemesanan'])->get());
        $data['tambahan'] = collect($this->Crud->mysqli2->table('tambahan')->select()->join('paket_tambahan', 'paket_tambahan.idpt', '=', 'tambahan.idpt')->whereIn('idpemesanan', $data['idpemesanan'])->get());
        $data['tambahan'] = $data['tambahan']->groupBy('idpemesanan')->map(function ($item, $key) {
            $item->groupBy('idpt')->map(function ($item) {
                $a = $item[0];
                $a->qty = $item->sum('qty');
                $a->jum = $item->sum('qty') * $a->harga;
                return $a;

            });

            return $item;
        });
        $data['pemesanan'] = $data['pemesanan']->where('status', '!=', 'Dibatalkan')->map(function ($item, $key) use ($data) {
            if (array_key_exists($item->idpemesanan, $data['tambahan']->toArray())) {
                if (array_key_exists($item->idpemesanan, $data['tambahan']->toArray())) {
                    $item->tambahan = $data['tambahan'][$item->idpemesanan]->values();
                } else {
                    $item->tambahan = collect([]);
                }
            } else {
                $item->tambahan = collect([]);
            }
            $item->tambahantotal = $item->tambahan->sum('jum');
            $item->totalbayar = $data['pembayaran']->where('idpemesanan', $item->idpemesanan)->where('validasi', "Valid")->sum('nominal');
            $item->total = $item->harga + $item->tambahantotal;
            $item->sisa = $item->total - $item->totalbayar;
            return $item;
        });

        $data['pelanggan'] = $this->Crud->mysqli2->table('user')->select()->where('iduser', $Request->key)->get()[0];

        $this->Data = $data;
    }
    public function LPemesanan()
    {
        $data = [
            'judul' => 'Laporan Pemesanan',
            'path' => 'Laporan/Pemesanan',
            'link' => 'LPemesanan',
            'icon' => 'fa-print',
            'warna' => 'danger',

        ];
        //$this->fields('pemesanan');
        $Session = $_SESSION;
        $Request = $this->Request;

        $fields1 = '[
               {"name":"idpemesanan","label":"ID Pemesanan","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"tgl_pesan","label":"Tanggal Pesan","type":"date","max":null,"pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"tgl_acara","label":"Tanggal Acara","type":"date","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"nama_paket","label":"Paket","type":"text","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"harga","label":"Harga","type":"number","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
               {"name":"status","label":"Status","type":"number","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}


                ]';
        $data['pemesanan.form'] = json_decode($fields1, true);
        if (isset($Request->tgl)) {
            $data['tgl'] = $Request->tgl;
            if ($Request->jenis == 'bulanan') {
                $data['pemesanan'] = collect($this->Crud->mysqli2->table('pemesanan')->select()->join('paket', 'paket.idpaket', '=', 'pemesanan.idpaket')->join('user', 'user.iduser', '=', 'pemesanan.iduser')->where('akses', 'Pelanggan')->where(new Ex('month(tgl_acara)'), $data['tgl'][0])->where(new Ex('year(tgl_acara)'), $data['tgl'][1])->get());

            } else {
                $data['pemesanan'] = collect($this->Crud->mysqli2->table('pemesanan')->select()->join('paket', 'paket.idpaket', '=', 'pemesanan.idpaket')->join('user', 'user.iduser', '=', 'pemesanan.iduser')->where('akses', 'Pelanggan')->where(new Ex('year(tgl_acara)'), $data['tgl'][1])->get());
            }

            $data['idpemesanan'] = $data['pemesanan']->pluck('idpemesanan')->toArray();
            $data['pembayaran'] = collect($this->Crud->mysqli2->table('pembayaran')->select()->whereIn('idpemesanan', $data['idpemesanan'])->get());
            $data['tambahan'] = collect($this->Crud->mysqli2->table('tambahan')->select()->join('paket_tambahan', 'paket_tambahan.idpt', '=', 'tambahan.idpt')->whereIn('idpemesanan', $data['idpemesanan'])->get());
            $data['tambahan'] = $data['tambahan']->groupBy('idpemesanan')->map(function ($item, $key) {
                $item->groupBy('idpt')->map(function ($item) {
                    $a = $item[0];
                    $a->qty = $item->sum('qty');
                    $a->jum = $item->sum('qty') * $a->harga;
                    return $a;

                });

                return $item;
            });
            $data['pemesanan'] = $data['pemesanan']->where('status', '!=', 'Dibatalkan')->map(function ($item, $key) use ($data) {
                if (array_key_exists($item->idpemesanan, $data['tambahan']->toArray())) {
                    $item->tambahan = $data['tambahan'][$item->idpemesanan]->values();
                } else {
                    $item->tambahan = collect([]);
                }
                $item->tambahantotal = $item->tambahan->sum('jum');
                $item->totalbayar = $data['pembayaran']->where('idpemesanan', $item->idpemesanan)->where('validasi', "Valid")->sum('nominal');
                $item->total = $item->harga + $item->tambahantotal;
                $item->sisa = $item->total - $item->totalbayar;
                $item->bln = date_format(date_create($item->tgl_acara), 'n');
                $item->year = date_format(date_create($item->tgl_acara), 'Y');
                return $item;
            });

        }
        if (isset($Request->jenis)) {
            if ($Request->jenis == 'Perorang') {
                $data['pelanggan'] = collect($this->Crud->mysqli2->table('user')->select()->where('akses', 'Pelanggan')->get());
                if (isset($Request->pelanggan)) {
                    $data['pemesanan'] = collect($this->Crud->mysqli2->table('pemesanan')->select()->join('paket', 'paket.idpaket', '=', 'pemesanan.idpaket')->join('user', 'user.iduser', '=', 'pemesanan.iduser')->where('user.iduser', $Request->pelanggan)->get());
                    $data['idpemesanan'] = $data['pemesanan']->pluck('idpemesanan')->toArray();
                    $data['pembayaran'] = collect($this->Crud->mysqli2->table('pembayaran')->select()->whereIn('idpemesanan', $data['idpemesanan'])->get());
                    $data['tambahan'] = collect($this->Crud->mysqli2->table('tambahan')->select()->join('paket_tambahan', 'paket_tambahan.idpt', '=', 'tambahan.idpt')->whereIn('idpemesanan', $data['idpemesanan'])->get());
                    $data['tambahan'] = $data['tambahan']->groupBy('idpemesanan')->map(function ($item, $key) {
                        $item->groupBy('idpt')->map(function ($item) {
                            $a = $item[0];
                            $a->qty = $item->sum('qty');
                            $a->jum = $item->sum('qty') * $a->harga;
                            return $a;

                        });

                        return $item;
                    });
                    $data['pemesanan'] = $data['pemesanan']->map(function ($item, $key) use ($data) {
                        if (array_key_exists($item->idpemesanan, $data['tambahan']->toArray())) {
                            $item->tambahan = $data['tambahan'][$item->idpemesanan]->values();
                        } else {
                            $item->tambahan = collect([]);
                        }
                        $item->tambahantotal = $item->tambahan->sum('jum');
                        $item->totalbayar = $data['pembayaran']->where('idpemesanan', $item->idpemesanan)->where('validasi', "Valid")->sum('nominal');
                        $item->total = $item->harga + $item->tambahantotal;
                        $item->sisa = $item->total - $item->totalbayar;
                        return $item;
                    });
                    $data['pelanggan.key'] = $data['pelanggan']->where('iduser', $Request->pelanggan)->first();

                }

            } elseif ($Request->jenis == 'tahunan') {
                $data['path'] = 'Laporan/PemesananT1';
                $bln = array();
                foreach (Fungsi::$bulan as $v => $k) {
                    $t = $data['pemesanan']->where('bln', $v);
                    $x = ['bln' => $k, 'paket' => $t->count(), 'total' => $t->sum('total')];
                    array_push($bln, $x);
                }
                $data['pemesanan'] = collect($bln);

            }
        }
        $data['admin'] = collect($this->Crud->mysqli2->table('user')->select()->where('akses', 'Admin')->get())->first();
        $data['owner'] = collect($this->Crud->mysqli2->table('user')->select()->where('akses', 'Owner')->get())->first();

        $this->Data = $data;
    }

}
