<nav class="navbar bg-4 navbar-expand-lg navbar-light shadow rounded bg-light">
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="zoom:85%">
            <li class="nav-item <?php echo ($data['link'] == 'Home') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Home"><i class="text-danger fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($data['link'] == 'Tentang') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Tentang"><i class="text-danger fa fa-store-alt"></i> Tentang Kami <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($data['link'] == 'Tentang') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Paket"><i class="text-danger fa fa-heart"></i> Paket Penikahan <span class="sr-only">(current)</span></a>
            </li>
            <?php if (isset($Session['admin'])): ?>
            <li class="nav-item <?php echo ($data['link'] == 'Tentang') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Pesanan"><i class="text-danger fa fa-calendar-alt"></i> Data Pesanan <span class="sr-only">(current)</span></a>
            </li>
            <?php if (isset($Session['admin'])): ?>
            <?php if ($Session['admin']->akses == 'Owner'): ?>
            <li class="nav-item <?php echo ($data['link'] == 'PaketTambahan') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=PaketTambahan"><i class="text-danger fa fa-cart-plus"></i> Data Paket Tambahan <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($data['link'] == 'Pelanggan') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=Pelanggan"><i class="text-danger fa fa-users"></i> Data Pelanggan <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($data['link'] == 'LPemesanan') ? 'active' : ''; ?>">
                <a class="nav-link" href="?hal=LPemesanan"><i class="text-danger fa fa-print"></i> Laporan Pemesanan <span class="sr-only">(current)</span></a>
            </li>
            <?php endif;?>
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