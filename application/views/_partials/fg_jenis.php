<div class="form-group">
    <label for="jenis_id">Jenis Aset:</label>
    <select class="form-control" id="sel1" name="jenis_id">
    <?php foreach ($jenis as $jen) {
        echo "<option>".$jen['id']."-".$jen['Nama']."</option>";
        } ?>
    </select>
</div>