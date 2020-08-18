<div class="row " style="zoom:85%">
    <?php include $komponen . '/Filter.php';?>
    <div class="col-lg-12 col-12 mt-3">
        <div class="card" style="zoom:85%">
            <div class="card-header card-header-primary">
                <div class="d-flex  justify-content-between">
                    <h4 class="card-title ">Preview Laporan</h4>
                    <button type="button" class="btn btn-outline-dark btn-sm  " onclick="$('#print22').print();">Cetak</button>
                </div>
            </div>
            <div class="" style="zoom:100%" id="print22">
                <?php if (isset($data['pemesanan'])): ?>
                <?php include $komponen . '/Kop.php';?>
                <div class="row ">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <br>
                        <h4 class="text-center"><b><u>Laporan Pemesanan
                                    <?php if ($Request->jenis == 'Perorang'): ?>
                                    Perpelanggan
                                    <?php else: ?>
                                    <?php echo ucfirst($Request->jenis); ?>
                                    <?php endif;?>
                                </u></b></h4>
                        <br>
                        <br>
                        <br>
                        <?php if ($Request->jenis == 'Perorang'): ?>
                        <table width="30%">
                            <tr>
                                <td>ID Pelanggan</td>
                                <td>:
                                    <?php echo $data['pelanggan.key']->iduser; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:
                                    <?php echo $data['pelanggan.key']->nama; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat / HP</td>
                                <td>:
                                    <?php echo $data['pelanggan.key']->alamat; ?> /
                                    <?php echo $data['pelanggan.key']->hp; ?>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php if ($Request->jenis == 'bulanan'): ?>
                            <table width="15%">
                                <tr>
                                    <td>Bulan</td>
                                    <td>:
                                        <?php echo Fungsi::$bulan[$Request->tgl[0]]; ?>
                                    </td>
                                </tr>
                                <?php endif;?>
                                <tr>
                                    <td>Tahun</td>
                                    <td>:
                                        <?php echo $Request->tgl[1]; ?>
                                    </td>
                                </tr>
                                <?php endif;?>
                            </table>
                            <table width="100%" class="text-wrap mb-0  table  table-bordered table-striped table-hover ">
                                <thead class="">
                                    <tr>
                                        <th class="w-1">#</th>
                                        <th class="w-1">ID Pesanan</th>
                                        <?php if ($Request->jenis == 'tahunan'): ?>
                                        <th>Bulan</th>
                                        <?php endif;?>
                                        <th class="w-1">Paket</th>
                                        <th class="w-1">Jumlah</th>
                                        <?php if ($Request->jenis != 'tahunan'): ?>

                                        <th class="w-1">Sudah Bayar</th>
                                        <th class="w-1">Sisa</th>
                                        <th class="w-1">Status Pesanan</th>
                                        <?php endif;?>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['pemesanan'] as $v => $k): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $k->idpemesanan; ?>
                                            <div class="text-muted">Tanggal Pesan:
                                                <?php echo $k->tgl_pesan; ?>
                                            </div>
                                            <div class="text-muted">
                                                <strong>Tanggal Acara:
                                                    <?php echo $k->tgl_acara; ?></strong>
                                            </div>
                                            <div class="">
                                                <strong>Oleh:
                                                    <?php echo $k->nama; ?> <span class="text-muted">[
                                                        <?php echo $k->iduser; ?>]</span></strong>
                                            </div>
                                        </td>
                                        <?php if ($Request->jenis == 'tahunan'): ?>
                                        <td>
                                            <?php echo date_format(date_create($k->tgl_pesan), 'd/m/Y'); ?>
                                        </td>
                                        <?php endif;?>

                                        <td>
                                            <?php echo $k->nama_paket; ?> <strong>[Rp.
                                                <?php echo number_format($k->harga); ?>]</strong>
                                            <ul>
                                                <?php foreach ($k->tambahan as $k2): ?>
                                                <li>
                                                    <?php echo $k2->nama_pt; ?> [
                                                    <?php echo $k2->qty; ?>] - <strong>Rp.
                                                        <?php echo number_format($k2->jum); ?></strong></li>
                                                <?php endforeach;?>
                                            </ul>
                                        </td>
                                        <td>
                                            Rp.
                                            <?php echo number_format($k->total); ?>
                                        </td>
                                        <?php if ($Request->jenis != 'tahunan'): ?>

                                        <td>
                                            Rp.
                                            <?php echo number_format($k->totalbayar); ?>
                                        </td>
                                        <td>
                                            Rp.
                                            <?php echo number_format($k->sisa); ?>
                                        </td>
                                        <td>
                                            <?php echo $k->status; ?>
                                        </td>
                                        <?php endif;?>

                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <?php $jum = 3;?>
                                        <?php if ($Request->jenis == 'tahunan'): ?>

                                    <?php $jum = 4;?>
                                        <?php endif;?>

                                    <tr>
                                        <th colspan="<?php echo $jum; ?>">Grand Total</th>
                                        <th colspan="">Rp.
                                            <?php echo number_format($data['pemesanan']->sum('total')); ?>
                                        </th>
                                        <?php if ($Request->jenis != 'tahunan'): ?>

                                        <th colspan="">Rp.
                                            <?php echo number_format($data['pemesanan']->sum('totalbayar')); ?>
                                        </th>
                                        <th colspan="">Rp.
                                            <?php echo number_format($data['pemesanan']->sum('sisa')); ?>
                                        </th>
                                        <th colspan="">
                                            <?php foreach ($data['pemesanan']->groupBy('status') as $k => $v): ?>
                                            <div>
                                                <?php echo $k; ?> :
                                                <?php echo $v->count(); ?>
                                            </div>
                                            <?php endforeach;?>
                                        </th>
                                        <?php endif;?>

                                    </tr>
                                </tfoot>
                            </table>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
                <?php include $komponen . '/Ttd.php';?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>