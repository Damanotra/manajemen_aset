<div class="form-group">
    <label for="minggu">Minggu*</label>
    <select class="form-control" id="minggu" name="minggu">
    <?php  $array = array(1,2,3,4) ?>
    <?php if(isset($value)):
    	foreach($array as $arr):
    		if($value ==$arr): ?>
        		<option selected="selected"><?php echo $arr;?></option>
        	<?php else:?>
        		<option><?php echo $arr;?></option>
    		<?php endif?>
    	<?php  endforeach; ?>
    <?php else:?>
    	<option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
    <?php endif?>
    </select>
</div>