<?php if ($isi['up']): ?>
<?php

$name = $isi['name'];
$type = $isi['type'];
$label = $isi['label'];
$pnj = $isi['pnj'];
$val = $isi['val'];
$red = $isi['red'];
$max = $isi['max'];
$var = 'input[]';
$tb = 'tb[]';
?>
<?php if ($type == "textarea"): ?>
<div class="form-grup col-<?php echo $pnj; ?> mb-2 input-group-sm">
    <label class="form-control-label text-dark">
        <?php echo $label; ?></label>
    <textarea v-html="kd.<?php echo $name; ?>" maxlength="<?php echo $max; ?>" <?php echo $red; ?> autocomplete=off name="<?php echo $var; ?>" class="form-control"><?php echo $val; ?></textarea>
    <input type="hidden" name="<?php echo $tb; ?>" value="<?php echo $name; ?>">
</div>
<?php elseif ($type == "textarea2"): ?>
<div class="form-grup col-<?php echo $pnj; ?> mb-2 input-group-sm">
    <label class="form-control-label text-dark">
        <?php echo $label; ?></label>
    <textarea v-html="kd.<?php echo $name; ?>" maxlength="<?php echo $max; ?>" <?php echo $red; ?> autocomplete=off name="<?php echo $var; ?>" class="form-control summernote"><?php echo $val; ?></textarea>
    <input type="hidden" name="<?php echo $tb; ?>" value="<?php echo $name; ?>">
</div>
<?php else: ?>
<div class="form-grup col-<?php echo $pnj; ?> mb-2 input-group-sm">
    <label class="form-control-label text-dark">
        <?php echo $label; ?></label>
    <input :value="kd.<?php echo $name; ?>" max="<?php echo $max; ?>" maxlength="<?php echo $max; ?>" autocomplete=off type="<?php echo $type; ?>" <?php echo $red; ?> step="any" min="0"
    value="<?php echo $val; ?>"
    name="<?php echo $var; ?>" class="form-control">
    <input type="hidden" name="<?php echo $tb; ?>" value="<?php echo $name; ?>">
</div>
<?php endif;endif;?>