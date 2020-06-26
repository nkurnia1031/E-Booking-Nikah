<div class="row align-items-center">
    <div class="mx-auto  col-8 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Form Register</h5>
            <div class=" card-body ">
                <form action="Action.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <?php foreach ($data['user.form'] as $isi): ?>
                                <?php if ($isi['name'] == 'jk'): ?>
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label">Jenis Kelamin</label>
                                    <select class="form-control multi" name="input[]">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="jk">
                                </div>
                                <?php else: ?>
                                <?php include $komponen . '/Input.php';?>
                                <?php endif;?>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <?php foreach ($data['user.form2'] as $isi): ?>
                                <?php if ($isi['name'] == 'jk'): ?>
                                <?php else: ?>
                                <?php include $komponen . '/Input.php';?>
                                <?php endif;?>
                                <?php endforeach;?>
                                <div class="modal-footer col-12  py-1">
                                    <input type="hidden" name="table" value="user">
                                    <input type="hidden" name="input[]" value="Pelanggan">
                                    <input type="hidden" name="tb[]" value="akses">
                                    <input type="hidden" name="link" value="index.php?hal=Login">
                                    <input type="hidden" name="pesan" value="Berhasil Daftar, Silahkan Login">
                                    <a href="?hal=Login" class="btn btn-sm btn-warning">Batal</a>
                                    <button type="submit" name="aksi" value="insert" class="btn btn-sm btn-danger">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>