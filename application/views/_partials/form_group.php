<?php if(!isset($nilai_atribut)) {
	# code...
	$nilai_atribut = "";
} ?>
<div class="form-group">
    <label for="<?php echo $nama_tanpa_spasi; ?>"><?php echo $nama_atribut; ?>*</label>
    <input class="form-control <?php echo form_error($nama_tanpa_spasi) ? 'is-invalid':'' ?>" type="text" name="<?php echo $nama_tanpa_spasi; ?>" placeholder="<?php echo $nama_atribut; ?>" value="<?php echo $nilai_atribut; ?>" />
    <div class="invalid-feedback">
        <?php echo form_error('<?php echo $nama_tanpa_spasi; ?>') ?>
    </div>
</div>