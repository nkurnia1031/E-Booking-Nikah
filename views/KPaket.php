<div class="row align-items-center">
    <div class="mx-auto  col-5 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Form Paket Pernikahan</h5>
            <div class=" card-body ">
                <form action="Action.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <?php foreach ($data['paket.form'] as $isi): ?>
                        <?php if ($isi['name'] == 'url'): ?>
                        <div class="form-grup col-12 mb-2 input-group-sm">
                            <label class="form-control-label">Foto Cover</label>
                            <input type="file" class="form-control" name="input[]">
                        </div>
                        <?php elseif ($isi['name'] == 'harga'): ?>
                               <div class="form-grup col-12 mb-2 input-group-sm">
                            <label class="form-control-label"><?php echo $isi['label']; ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                </div>
                                <input type="text" id="uang" value="<?php echo $isi['val']; ?>" required class="form-control uang" onkeyup="$('#uang2').val($('#uang').val().replace(/\./g, ''))">
                            </div>
                            <input type="hidden" name="input[]" id="uang2" value="<?php echo $isi['val']; ?>">
                            <input type="hidden" name="tb[]" value="<?php echo $isi['name']; ?>">
                        </div>
                        <?php else: ?>
                        <?php include $komponen . '/Input.php';?>
                        <?php endif;?>
                        <?php endforeach;?>
                        <div class="modal-footer mt-4 d-flex justify-content-center col-12  py-1">
                            <input type="hidden" name="table" value="paket">
                            <?php if (!isset($Request->key)): ?>
                            <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-danger">Tambah</button>
                            <?php else: ?>
                            <input type="hidden" name="link" value="index.php?hal=Paket">
                            <input type="hidden" name="key" value="<?php echo $Request->key; ?>">
                            <input type="hidden" name="primary" value="idpaket">
                            <button type="submit" name="aksi" value="update" class="btn btn-sm  btn-info">Edit</button>


                            <button type="submit" name="aksi" value="delete" class="btn btn-sm  btn-warning">Hapus</button>
                            <?php endif;?>
                            <a href="?hal=Paket" class="btn btn-sm  btn-primary">Kembali</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>