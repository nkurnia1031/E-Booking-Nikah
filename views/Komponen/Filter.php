<div class="col-lg-12 col-12">
    <div class="card" style="zoom:85%">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="form-grup col-lg-6 mb-3 border-dark border-right">
                        <label class="form-control-label">Pilih Set Laporan</label>
                        <div class="input-group mb-3 d-flex">
                            <span class="mx-2"><input required="" value="bulanan" type="radio" name="jenis"> Bulanan</span>
                            <span class="mx-2"><input required="" value="tahuanan" type="radio" name="jenis"> Tahunan</span>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="custom-select" name="tgl[]">
                                    <?php foreach (Fungsi::$bulan as $b => $e): ?>
                                    <option value="<?php echo $b; ?>">
                                        <?php echo $e; ?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <input autocomplete="off" type="number" value="2020" min="1970" required="" class="form-control form-control-line" name="tgl[]">
                            <div class="input-group-append">
                                <input type="hidden" name="hal" value="<?php echo $_REQUEST['hal']; ?>">
                                <button type="submit" class="btn btn-danger float-right">Proses</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-grup col-lg-6 mb-3 border-dark border-left">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Petunjuk</h4>
                            <p>untuk menampilkan preview Laporan:</p>
                            <ol>
                                <li>Silahkan pilih jenis laporan Bulanan/Tahunan</li>
                                <li>Pilih Bulan & Tahun periode data yang ingin di tampilkan</li>
                                <li> kemudian tekan tombol <button type="button" class="btn btn-danger ">Proses</button></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>