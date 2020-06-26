<div class="row align-items-center">
    <div class="mx-auto  col-12 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Data Pelanggan</h5>
             <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                <thead class="">
                    <tr>
                        <th class="w-1">#</th>
                        <?php foreach ($data['user.form'] as $e): ?>
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
                   <?php foreach ($data['pelanggan'] as $v => $k): ?>

                    <tr>
                        <td>
                            <?php echo $v + 1; ?>
                        </td>
                        <?php foreach ($data['user.form'] as $e1): ?>
                        <?php if ($e1['tb']): ?>
                        <td class="text-wrap">
                            <?php $b = $e1['name'];?>
                            <?php echo $k->$b; ?>
                        </td>
                        <?php endif;?>
                        <?php endforeach;?>
                        <td class="text-right ">
                            <a href="?hal=RPesanan&key=<?php echo $k->iduser; ?>" class="btn btn-warning btn-sm">Riwayat Pesanan</a>

                        </td>
                    </tr>
                   <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </div>
</div>