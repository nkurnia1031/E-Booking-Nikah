<!DOCTYPE html>
<html>
<?php include 'head.php';?>

<body class="bg-full">
    <div class="container">
        <div class="row align-items-center">
            <div class="col  ">
                <div class="card rounded shadow  animate__slideInUp wow border-1" data-wow-duration="2s" data-wow-delay=".1s">
                    <div class=" con-blur">
                        <div class=" bg-full blur">
                        </div>
                        <div class="atas ">
                            <h1 class="text-center p-5 " style="font-family: 'Parisienne', cursive;zoom:120%"><strong>
                                    <i class="text-danger fa fa-heart"></i>
                                    Bunda Tini Gallery Pengantin <i class="text-danger  fa fa-heart"></i></strong></h1>
                        </div>
                    </div>
                    <?php include 'nav.php';?>
                    <div class="row  ">
                        <div class="col-12 ">
                            <div class="card-body con-blur">
                                <div class="bg-full blur"></div>
                                <div class="atas  ">
                                    <?php if ($data['link'] != 'Login' && $data['link'] != 'Register'): ?>
                                    <div class="d-flex justify-content-between">
                                        <span>
                                            <h4 class="text-dark ml-2 mt-1  pt-1">
                                                <i class="text-danger fa <?php echo $data['icon']; ?>"></i>
                                                <?php echo $data['judul']; ?>
                                            </h4>
                                        </span>
                                        <?php if ($data['link'] == 'Paket'): ?>
                                            <?php if (isset($Session['admin'])): ?>

                                        <?php if ($Session['admin']->akses == 'Owner'): ?>
                                        <span><a href="?hal=KPaket" class="btn btn-danger"><i class="fa fa-plus"></i> Paket</a></span>
                                        <?php endif;?>
                                            <?php endif;?>

                                        <?php endif;?>
                                    </div>
                                    <hr class="mb-3">
                                    <?php endif;?>
                                    <div>
                                        <?php include $data['path'] . '.php';?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-4 mt-auto text-center">Copyright © 2020 Rahmaini.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'js.php';?>
</body>

</html>