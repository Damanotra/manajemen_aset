<div class="form-group">
    <label for="jenis_id">Jenis Aset:</label>
    <select class="form-control" id="sel1" name="jenis_id">
    <?php foreach ($jenis as $jen) {
        if(isset($value)){
        	if($jen['id']==$value){
        		echo "<option selected='selected'>".$jen['id']."-".$jen['Nama Jenis']."</option>";
        	}
        	else{
        		echo "<option>".$jen['id']."-".$jen['Nama Jenis']."</option>";	
        	}
        }
        else{
           echo "<option>".$jen['id']."-".$jen['Nama Jenis']."</option>";	
        }
    } ?>
    </select>
</div>