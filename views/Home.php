<div class="row">
    <div class="col-12  mx-auto">
        <div id="carouselExampleControls"  class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($data['a'] as $v => $k): ?>
                <div class="carousel-item <?php if ($v == 0): ?> active <?php endif;?>">
                    <img src="foto/<?php echo $k; ?>" style="height: 70vh" class="d-block w-100" alt="...">
                </div>
                <?php endforeach;?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</div>
<div class="row" style="margin-top: -7vh">
	<div class="col-9  mx-auto">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="text-center display-4">Selamat Datang</h1>
                <p class="text-center">Kami akan selalu memberikan pelayanan terbaik untuk mewujudkan pernikahan impian anda :)</p>

               <p class="text-center"><i class="fa fa-clock text-danger"></i> <strong>Senin - Minggu</strong> : <strong>08.00 - 21.00</strong> <i class="fa fa-clock text-danger"></i></p>
            </div>
        </div>
    </div>
</div>