<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <div id="relative-caption" class="row justify-content-center " >
                    <?php foreach ($data['a'] as $v => $k): ?>
                        <?php $no = 1;?>
                    <?php foreach ($k as $k2): ?>
                    <a class="text-reset col-2 align-self-center mb-3" href="galeri/gallery<?php echo $Request->isi; ?>/<?php echo $v; ?>/<?php echo $k2; ?>" data-sub-html=".caption">
                        <img class="w-100 shadow rounded"  src="galeri/gallery<?php echo $Request->isi; ?>/<?php echo $v; ?>/<?php echo $k2; ?>" />
                        <div class="caption card mx-3" style="margin-top: -5%" >
                            <h4 class="h6 text-center">
                                <?php echo $v; ?> <?php echo sprintf('%02d', $no); ?>
                            </h4>
                        </div>
                    </a>
                    <?php $no++;endforeach;?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>