<div class="row ">
    <div class=" col-4 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Form Paket Tambahan</h5>
            <div class=" card-body ">
                <form action="Action.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <?php foreach ($data['form'] as $isi): ?>

                        <?php include $komponen . '/Input.php';?>
                        <?php endforeach;?>
                        <div class="modal-footer mt-4 d-flex justify-content-center col-12  py-1">
                            <input type="hidden" name="table" value="paket_tambahan">
                            <?php if (!isset($Request->key)): ?>
                            <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-danger">Tambah</button>
                            <?php else: ?>
                            <input type="hidden" name="link" value="index.php?hal=PaketTambahan">
                            <input type="hidden" name="key" value="<?php echo $Request->key; ?>">
                            <input type="hidden" name="primary" value="idpt">
                            <button type="submit" name="aksi" value="update" class="btn btn-sm  btn-info">Edit</button>


                            <button type="submit" name="aksi" value="delete" class="btn btn-sm  btn-warning">Hapus</button>
                            <?php endif;?>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="  col-8 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Data Paket Tambahan</h5>
             <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                <thead class="">
                    <tr>
                        <th class="w-1">#</th>
                        <?php foreach ($data['form'] as $e): ?>
                        <?php if ($e['tb']): ?>
                        <th class="">
                            <?php echo $e['label']; ?>
                        </th>
                        <?php endif;?>
                        <?php endforeach;?>
                        <th data-priority="1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['paket_tambahan'] as $v => $k): ?>

                    <tr>
                        <td>
                            <?php echo $v + 1; ?>
                        </td>
                        <?php foreach ($data['form'] as $e1): ?>
                        <?php if ($e1['tb']): ?>
                        <td class="text-wrap">
                            <?php $b = $e1['name'];?>
                            <?php if ($b == 'harga'): ?>

                            Rp.<?php echo number_format($k->$b); ?>
                            <?php else: ?>
                            <?php echo $k->$b; ?>

                            <?php endif;?>

                        </td>
                        <?php endif;?>
                        <?php endforeach;?>
                        <td class="text-right ">
                            <a href="?hal=PaketTambahan&key=<?php echo $k->idpt; ?>" class="btn btn-warning btn-sm">kelola Paket</a>


                        </td>
                    </tr>
                    <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </div>
</div>