<div class="row ">
    <div class="mx-auto  col-6 mb-2">
        <div class="card rounded shadow mb-2" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Form Pemesanan</h5>
            <div class=" card-body ">
                <form action="Action.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <?php foreach ($data['paket.form'] as $isi): ?>
                                <?php if ($isi['name'] == 'nama'): ?>
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" readonly="" value="<?php echo $isi['val']; ?>" name="">
                                </div>
                                <?php else: ?>
                                <?php include $komponen . '/Input.php';?>
                                <?php endif;?>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <?php foreach ($data['paket.form2'] as $isi): ?>
                                <?php include $komponen . '/Input.php';?>
                                <?php endforeach;?>
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label">Paket Yang dipesan</label>
                                    <input type="text" class="form-control" readonly="" value="<?php echo $data['paket']->nama_paket; ?> || Rp.<?php echo number_format($data['paket']->harga); ?>" name="">
                                </div>
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label">Status</label>
                                    <input type="text" class="form-control" readonly="" value="<?php echo $data['paket']->status; ?> " name="">
                                </div>
                                <div class="modal-footer mt-4 d-flex justify-content-center col-12  py-1">
                                    <input type="hidden" name="key" value="<?php echo $Request->key; ?>">
                                    <input type="hidden" name="primary" value="idpemesanan">
                                    <input type="hidden" name="table" value="pemesanan">
                                    <?php if ($Session['admin']->akses == 'Pelanggan'): ?>
                                    <button type="submit" name="aksi" value="update" class="btn btn-sm  btn-info">Edit</button>
                                    <?php if ($data['paket']->status == 'Menunggu Pembayaran'): ?>
                                    <a href="Action.php?table=pemesanan&aksi=update&input[]=Dibatalkan&tb[]=status&primary=idpemesanan&key=<?php echo $Request->key; ?>&link=index.php?hal=Pesanan" class="btn btn-sm  btn-primary">Batalkan</a>
                                    <?php endif;?>
                                    <?php else: ?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card rounded shadow mb-2" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Bukti Transfer</h5>
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Silahkan Upload Bukti Transfer</h4>
                <p></p>
                <hr>
                <p class="mb-0"><button type="button" data-toggle="collapse" data-target="#upload" class="btn btn-danger">Isi Form Bukti Transfer</button></p>
            </div>
            <div class="collapse card-body border-bottom" id="upload">
                <form action="Action.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-grup col-12 mb-2 input-group-sm">
                            <label class="form-control-label">ID Pembayaran</label>
                            <input type="text" readonly="" value="<?php echo $data['idpembayaran']; ?>" class="form-control" name="input[]">
                            <input type="hidden" required name="tb[]" value="idpembayaran">
                        </div>
                        <div class="form-grup col-12 mb-2 input-group-sm">
                            <label class="form-control-label">No. Rekening Tujuan</label>
                          <input type="text" class="form-control" readonly="" name="input[]" value="0309888520 | A.n Mariantini">
                            <input type="hidden" required name="tb[]" value="no_rek">
                        </div>
                        <div class="form-grup col-12 mb-2 input-group-sm">
                            <label class="form-control-label">Bank</label>
                            <input type="text" required class="form-control" readonly="" value="BNI" name="input[]">
                            <input type="hidden" name="tb[]" value="bank">
                        </div>
                        <div class="form-grup col-12 mb-2 input-group-sm">
                            <label class="form-control-label">Nominal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                </div>
                                <?php $cek = $data['pembayaran']->where('validasi', 'Valid')->isEmpty();?>
                                <input type="text" id="uang" required class="form-control uang" <?php if ($cek): ?>  onchange="cekdp('msgnominal','uang2',<?php echo ($data['tambahan']->sum('jum') + $data['paket']->harga) * 0.3; ?>)" <?php endif;?> onkeyup="$('#uang2').val($('#uang').val().replace(/\./g, ''))">
                            </div>
                            <span id="msgnominal" class="text-danger"></span>
                            <input type="hidden" name="input[]" id="uang2" value="">
                            <input type="hidden" name="tb[]" value="nominal">
                        </div>
                        <div class="form-grup col-12 mb-2 input-group-sm">
                            <label class="form-control-label">Bukti Transfer</label>
                            <input type="file" class="form-control" required="" name="input[]">
                        </div>
                        <div class="form-grup col-12 mb-2 input-group-sm">
                            <label class="form-control-label">Status</label>
                            <div class="d-flex">
                                <span class="mx-2">
                                    <input type="radio" required="" name="input[]" value="DP"> DP
                                </span>
                                <span class="mx-2">
                                    <input type="radio" required="" name="input[]" value="Lunas"> Lunas
                                </span>
                            </div>
                            <input type="hidden" name="tb[]" value="status">
                        </div>
                        <div class="modal-footer mt-4 d-flex justify-content-center col-12  py-1">
                            <input type="hidden" name="table" value="pembayaran">
                            <input type="hidden" name="input[]" value="<?php echo $Request->key; ?>">
                            <input type="hidden" name="tb[]" value="idpemesanan">
                            <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-danger">Simpan</button>
                            <button type="button" data-toggle="collapse" data-target="#upload" class="btn btn-sm  btn-primary">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Rekening Tujuan</th>
                        <th>Nominal</th>
                        <th>Validasi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['pembayaran'] as $v => $k): ?>
                    <tr>
                        <td>
                            <?php echo $v + 1; ?>
                        </td>
                          <td>
                             <div class="text-muted">Bank:
                                <?php echo $k->bank; ?>
                            </div>
                            <?php echo $k->no_rek; ?>

                        </td>

                        <td>
                            Rp.
                            <?php echo number_format($k->nominal); ?> <span class="badge badge-danger">
                                <?php echo $k->status; ?></span>
                        </td>
                        <td>
                            <?php if ($k->validasi == "..."): ?>
                            <?php echo $k->validasi; ?>
                            <?php endif;?>
                            <?php if ($k->validasi == "Valid"): ?>
                            <span class="badge badge-success">
                                <?php echo $k->validasi; ?></span>
                            <?php endif;?>
                            <?php if ($k->validasi == "Tidak Valid"): ?>
                            <span class="badge badge-warning">
                                <?php echo $k->validasi; ?></span>
                            <?php endif;?>
                        </td>
                        <td>
                            <a href="#bukti-<?php echo $k->idpembayaran; ?>" data-toggle="collapse" class="btn btn-sm btn-info">Bukti</a>
                            <?php if ($Session['admin']->akses == 'Admin'): ?>
                            <a href="Action.php?table=pembayaran&aksi=update&input[]=Valid&tb[]=validasi&primary=idpembayaran&key=<?php echo $k->idpembayaran; ?>" class="btn btn-sm  btn-success">Valid</a>
                            <a href="Action.php?table=pembayaran&aksi=update&input[]=Tidak Valid&tb[]=validasi&primary=idpembayaran&key=<?php echo $k->idpembayaran; ?>" class="btn btn-sm  btn-warning">Tidak Valid</a>
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr class="">
                        <td colspan="5" class="p-0">
                            <div class="collapse" id="bukti-<?php echo $k->idpembayaran; ?>">
                                <div class=" d-flex justify-content-center">
                                <a href="upload/<?php echo $k->url; ?>" download>
                                    <img width="200" src="upload/<?php echo $k->url; ?>" class="img-fluid rounded"  alt="Responsive image">
                                </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mx-auto  col-6 mb-2">
        <div class="card rounded shadow mb-2" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Paket Tambahan & Total Biaya</h5>
            <div class=" card-body  overflow-auto px-1" id="diskusi" style="background-color: #eff1f4c2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tambahan</th>
                            <th>Qty</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php foreach ($data['tambahan']->values() as $v => $k): ?>
                        <tr>
                            <td>
                                <?php echo $v + 1; ?>
                            </td>
                            <td>
                                <small>[
                                    <?php echo $k->idpt; ?>]</small> <strong>
                                    <?php echo $k->nama_pt; ?></strong>

                            </td>
                            <td>
                                <?php echo $k->qty; ?>
                                <?php echo $k->satuan; ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <div> <small class="text-muted">
                                            <?php echo $k->qty; ?> * Rp.
                                            <?php echo number_format($k->harga); ?></small>
                                        <div><strong>Rp.
                                                <?php echo number_format($k->jum); ?></strong></div>
                                    </div>
                                    <div>
                                        <a href="Action.php?aksi=delete&primary[]=idpemesanan&key[]=<?php echo $k->idpemesanan; ?>&primary[]=idpt&key[]=<?php echo $k->idpt; ?>&table=tambahan" class="btn btn-sm btn-primary">Batal</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Sub Total</th>
                            <th colspan="3">Rp.
                                <?php echo number_format($data['tambahan']->sum('jum')); ?>
                            </th>
                        </tr>
                        <tr class="bg-white">
                            <th></th>
                            <th colspan="">
                                <?php echo $data['paket']->nama_paket; ?>
                            </th>
                            <th colspan=""></th>
                            <th colspan="">Rp.
                                <?php echo number_format($data['paket']->harga); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3">Grand Total</th>
                            <th colspan="3">Rp.
                                <?php echo number_format($data['tambahan']->sum('jum') + $data['paket']->harga); ?>
                            </th>
                        </tr>
                        <tr class="bg-white">
                            <th></th>
                            <th colspan="">
                                Sudah Bayar
                            </th>
                            <th colspan=""></th>
                            <th colspan="">Rp.
                                <?php echo number_format($data['pembayaran']->where('validasi', 'Valid')->sum('nominal')); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3">Sisa Pembayaran</th>
                            <?php $g = $data['tambahan']->sum('jum') + $data['paket']->harga - $data['pembayaran']->where('validasi', 'Valid')->sum('nominal');?>
                            <?php if ($g < 0): ?>

                            <th colspan="3">Rp.0
                            </th>
                            <?php else: ?>
                              <th colspan="3">Rp.
                                <?php echo number_format($g); ?>

                            </th>
                            <?php endif;?>

                        </tr>
                        <tr>
                            <th colspan="3">Kembalian</th>
                            <?php $g = $data['tambahan']->sum('jum') + $data['paket']->harga - $data['pembayaran']->where('validasi', 'Valid')->sum('nominal');?>
                            <?php if ($g < 0): ?>

                            <th colspan="3">Rp.
                                <?php echo number_format(-$g); ?>

                            </th>
                            <?php else: ?>
                              <th colspan="3">Rp.0

                            </th>
                            <?php endif;?>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer bg-white">
                <form action="Action.php" method="post">
                    <div class="row">
                        <?php if ($Session['admin']->akses == 'Pelanggan'): ?>
                        <div class="form-grup col-6 mb-2 input-group-sm">
                            <label class="form-control-label">Tambahan</label>
                            <select class="form-control" name="input[]">
                                <?php foreach ($data['paket_tambahan'] as $k): ?>
                                <option value="<?php echo $k->idpt; ?>">
                                    <?php echo $k->nama_pt; ?> [Rp.
                                    <?php echo number_format($k->harga); ?> /
                                    <?php echo $k->satuan; ?>]</option>
                                <?php endforeach;?>
                            </select>
                            <input type="hidden" name="tb[]" value="idpt">
                        </div>
                        <div class="form-grup col-6 mb-2 input-group-sm">
                            <label class="form-control-label">Qty</label>
                            <input type="number" class="form-control" name="input[]">
                            <input type="hidden" name="tb[]" value="qty">
                        </div>
                        <?php endif;?>
                        <div class="modal-footer mt-4 d-flex justify-content-center col-12  py-1">
                            <?php if ($Session['admin']->akses == 'Pelanggan'): ?>
                            <input type="hidden" name="input[]" value="<?php echo $Request->key; ?>">
                            <input type="hidden" name="tb[]" value="idpemesanan">
                            <input type="hidden" name="table" value="tambahan">
                            <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-info">Tambahkan</button>
                            <?php else: ?>
                            <a href="Action.php?table=pemesanan&aksi=update&input[]=Diproses&tb[]=status&primary=idpemesanan&key=<?php echo $Request->key; ?>" class="btn btn-sm  btn-danger">Diproses</a>
                            <a href="Action.php?table=pemesanan&aksi=update&input[]=Selesai&tb[]=status&primary=idpemesanan&key=<?php echo $Request->key; ?>" class="btn btn-sm  btn-success">Selesai</a>
                            <a href="Action.php?table=pemesanan&aksi=update&input[]=Dibatalkan&tb[]=status&primary=idpemesanan&key=<?php echo $Request->key; ?>" class="btn btn-sm  btn-primary">Batalkan</a>
                            <?php endif;?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mb-2">
            Hubungi Penjualan
            <div class="card rounded-circle p-2 shadow">
                <a href="#chat" data-toggle="collapse" class="text-reset">
                    <i style="font-size: 5vh" class="text-danger fa fa-comments"></i>
                </a>
            </div>
        </div>
        <div id="chat" class="card rounded collapse shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Diskusi</h5>
            <div class=" card-body  overflow-auto px-1" id="diskusi" style="background-color: #eff1f4c2;height: 309px">
                <?php foreach ($data['diskusi'] as $v => $k): ?>
                <div class="mx-3 mb-2 d-flex justify-content-center">
                    <span class="badge badge-success ">
                        <?php echo $v; ?>
                    </span>
                </div>
                <?php foreach ($k as $v2 => $k2): ?>
                <div class="mx-3 mb-2 d-flex <?php if ($k2->iduser == $Session['admin']->iduser): ?> justify-content-end <?php endif;?>">
                    <span class="mb-0 px-3 py-2 shadow text-wrap <?php if ($k2->iduser != $Session['admin']->iduser): ?> bg-4 <?php endif;?> rounded-pill ">
                        <?php echo $k2->pesan; ?> <small><small class="text-muted">|
                                <?php echo $k2->time; ?></small></small>
                    </span>
                </div>
                <?php endforeach;?>
                <?php endforeach;?>
            </div>
            <div class="card-footer bg-4 mt-auto text-center">
                <form action="Action.php" method="post">
                    <div class="input-group mb-3">
                        <textarea class="form-control" name="input[]" placeholder="Tuliskan Sesuatu....." aria-label="Recipient's username" aria-describedby="button-addon2"></textarea>
                        <input type="hidden" name="tb[]" value="pesan">
                        <input type="hidden" name="input[]" value="<?php echo $Session['admin']->iduser; ?>">
                        <input type="hidden" name="tb[]" value="iduser">
                        <input type="hidden" name="input[]" value="<?php echo $Request->key; ?>">
                        <input type="hidden" name="tb[]" value="idpemesanan">
                        <div class="input-group-append">
                            <input type="hidden" name="table" value="diskusi">
                            <button class="btn btn-outline-danger" type="submit" value="insert" name="aksi" id="button-addon2">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
    </div>
</div>