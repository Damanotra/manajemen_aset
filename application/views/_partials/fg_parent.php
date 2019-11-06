<div class="form-group">
    <label for="parent">Kelompok Jenis:</label>
    <select class="form-control" id="sel1" name="parent">
    	<option>-</option>
    <?php foreach ($parent as $par) {
        echo "<option>".$par['id']."-".$par['Nama Jenis']."</option>";
        } ?>
    </select>
</div>