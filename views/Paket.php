<div class="row">
    <?php foreach ($data['paket'] as $k): ?>
    <div class="col-4 mb-5">
        <div class="card zoom text-center shadow-lg animate__slideInRight wow " data-wow-duration="2s" data-wow-delay=".3s" style="zoom:85%;border-radius: 20px;">
            <?php if (is_null($k->url)): ?>
            <img src="upload/no.svg" class="card-img-top rounded" alt="...">

            <?php else: ?>
            <img src="upload/<?php echo $k->url; ?>" class="card-img-top rounded" alt="...">

            <?php endif;?>
            <h5 class="text-dark ml-2 mt-1 pt-1">
                <?php echo $k->nama_paket; ?>
            </h5>
            <table class="table table-striped">
                <tr>
                    <td class="py-1">
                        Deskripsi
                    </td>
                </tr>
                <tr>
                    <td class="py-1 text-left ">
                        <?php foreach ($k->desk as $k2): ?>
                        <li>
                            <?php echo $k2; ?>
                        </li>
                        <?php endforeach;?>
                    </td>
                </tr>
                <tr>
                    <td class="py-1">
                        Harga
                    </td>
                </tr>
                <tr>
                    <td class="py-1 text-danger">
                        Rp.
                        <?php echo number_format($k->harga); ?>
                    </td>
                </tr>
            </table>
            <div class="card-footer ">
                <?php if (isset($Session['admin'])): ?>
                <?php if ($Session['admin']->akses == 'Owner'): ?>
                <a href="?hal=KPaket&key=<?php echo $k->idpaket; ?>" class="btn-sm btn btn-outline-warning btn-rounded">Kelola</a>
                <?php endif;?>
                <?php if ($Session['admin']->akses == 'Pelanggan'): ?>
                <a href="?hal=PPaket&idpaket=<?php echo $k->idpaket; ?>" class="btn-sm btn btn-outline-success btn-rounded">Pesan</a>
                <?php endif;?>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>