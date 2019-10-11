<div class="form-group">
    <label for="tipe">Tipe*</label>
    <select class="form-control" id="tipe" name="tipe">
    <?php if(isset($value)):
		if($value ==1): ?>
        <option selected="selected">1-String</option>
        <?php else:?>
        <option>1-String</option>
    	<?php endif?>
    <?php else:?>
    	<option>1-String</option>
    <?php endif?>
    <?php if(isset($value)):
		if($value ==2): ?>
        <option selected="selected">2-Angka</option>
        <?php else:?>
        <option>2-Angka</option>
    	<?php endif?>
    <?php else:?>
    	<option>2-Angka</option>
    <?php endif?>
    </select>
</div>