<nav class="navbar bg-4 navbar-expand-lg navbar-light shadow rounded bg-light">
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="zoom:85%">
            <li class="nav-item <?php echo ($data['link'] == 'Home') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Home"><i class="text-danger fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown <?php if (isset($data['induk'])): ?><?php echo ($data['induk'] == 'Informasi') ? 'active' : ''; ?> <?php endif;?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="text-danger  fa fa-store-alt"></i> Informasi <span class="sr-only">(current)</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item <?php echo ($data['link'] == 'Tentang') ? 'active' : ''; ?>  " href="?hal=Tentang">Tentang Kami</a>
                     <?php if (isset($Session['admin'])): ?>

            <?php if ($Session['admin']->akses == 'Pelanggan'): ?>
                    <a class="dropdown-item <?php echo ($data['link'] == 'Syarat') ? 'active' : ''; ?> " href="?hal=Syarat">Syarat & Ketentuan</a>
                    <a class="dropdown-item <?php echo ($data['link'] == 'Jadwal') ? 'active' : ''; ?> " href="?hal=Jadwal">Cek Jadwal</a>
                    <?php endif;?>
                    <?php endif;?>
                </div>
            </li>
            <li class="nav-item dropdown <?php if (isset($data['induk'])): ?><?php echo ($data['induk'] == 'Gallery') ? 'active' : ''; ?> <?php endif;?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="text-danger fa fa-photo-video"></i> Gallery <span class="sr-only">(current)</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item <?php echo ($data['link'] == 'Gallery&isi=0') ? 'active' : ''; ?>  " href="?hal=Gallery&isi=0">Baju Selayar</a>
                    <a class="dropdown-item <?php echo ($data['link'] == 'Gallery&isi=1') ? 'active' : ''; ?> " href="?hal=Gallery&isi=1">Baju Adat</a>
                    <a class="dropdown-item <?php echo ($data['link'] == 'Gallery&isi=2') ? 'active' : ''; ?> " href="?hal=Gallery&isi=2">Dekorasi Pelaminan</a>
                </div>
            </li>
            <li class="nav-item <?php echo ($data['link'] == 'Tentang') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Paket"><i class="text-danger fa fa-heart"></i> Paket Penikahan <span class="sr-only">(current)</span></a>
            </li>
            <?php if (isset($Session['admin'])): ?>

            <?php if ($Session['admin']->akses != 'Owner'): ?>

            <li class="nav-item <?php echo ($data['link'] == 'Tentang') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Pesanan"><i class="text-danger fa fa-calendar-alt"></i> Data Pesanan <span class="sr-only">(current)</span></a>
            </li>
            <?php endif;?>

            <?php if ($Session['admin']->akses == 'Admin'): ?>

            <li class="nav-item <?php echo ($data['link'] == 'PaketTambahan') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=PaketTambahan"><i class="text-danger fa fa-cart-plus"></i> Data Paket Tambahan <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($data['link'] == 'Pelanggan') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Pelanggan"><i class="text-danger fa fa-users"></i> Data Pelanggan <span class="sr-only">(current)</span></a>
            </li>
            <?php endif;?>
            <?php if ($Session['admin']->akses == 'Admin' || $Session['admin']->akses == 'Owner'): ?>

            <li class="nav-item dropdown <?php if (isset($data['link'])): ?><?php echo ($data['link'] == 'LPemesanan') ? 'active' : ''; ?> <?php endif;?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="text-danger fa fa-print"></i> Laporan <span class="sr-only">(current)</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item  " href="?hal=LPemesanan">Pemesanan Keseluruhan</a>
                    <a class="dropdown-item " href="?hal=LPemesanan&jenis=Perorang">Pemesanan Per Pelanggan</a>
                </div>
            </li>
            <?php endif;?>
            <?php endif;?>


        </ul>
        <?php if (isset($Session['admin'])): ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['admin']->nama; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="?hal=Akun"><i class="text-danger fa fa-user"></i> Akun </a>
                    <a class="dropdown-item" href="?hal=Logout"><i class="text-danger fa fa-sign-out-alt"></i> Logout </a>
                </div>
            </li>
        </ul>
        <?php else: ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href="?hal=Login"><i class="text-danger fa fa-sign-in-alt"></i> Login </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="?hal=Register"><i class="text-danger fa fa-pencil-alt"></i> Register </a>
            </li>
        </ul>
        <?php endif;?>
    </div>
</nav>