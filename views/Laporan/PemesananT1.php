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
                        <h4 class="text-center"><b><u >Laporan Pemesanan Tahunan</u></b></h4>
                        <br>
                        <br>
                        <br>


                            <table width="15%">

                                <tr>
                                    <td>Tahun</td>
                                    <td>:
                                        <?php echo $Request->tgl[1]; ?>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" class="text-wrap mb-0  table  table-bordered table-striped table-hover ">
                                <thead class="">
                                    <tr>
                                        <th class="w-1">#</th>
                                        <th>Bulan</th>
                                        <th class="w-1">Paket</th>
                                        <th class="w-1">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['pemesanan'] as $v => $k): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $k['bln']; ?>
                                        </td>
                                         <td>
                                            <?php echo $k['paket']; ?> Paket
                                        </td>
                                          <td>
                                            Rp.<?php echo number_format($k['total']); ?>
                                        </td>

                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <th colspan="3">Grand Total</th>
                                        <th colspan="">Rp.
                                            <?php echo number_format($data['pemesanan']->sum('total')); ?>
                                        </th>


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