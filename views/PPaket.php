<div class="row align-items-center">
    <div class="mx-auto  col-8 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
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
                                    <input type="text" class="form-control" readonly="" value="<?php echo $isi['val']; ?>">
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
                                    <label class="form-control-label">ID Paket</label>
                                    <input type="text" class="form-control" readonly="" value="<?php echo $data['paket']->idpaket; ?>" name="input[]">
                                    <input type="hidden" name="tb[]" value="idpaket">
                                </div>
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label">Nama Paket</label>
                                    <input type="text" class="form-control" readonly="" value="<?php echo $data['paket']->nama_paket; ?>" name="">
                                </div>
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label">Harga Paket</label>
                                    <input type="text" class="form-control" readonly="" value="Rp.<?php echo number_format($data['paket']->harga); ?>" name="">
                                </div>
                                <div class="modal-footer mt-4 d-flex justify-content-center col-12  py-1">
                                    <input type="hidden" name="table" value="pemesanan">
                                    <input type="hidden" name="link" value="index.php?hal=Pesanan">

                                    <a href="?hal=Paket" class="btn btn-sm  btn-primary">Batalkan Pesanan</a>

                                    <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-danger">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>