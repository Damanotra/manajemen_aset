<style>
  thead {
  text-align: center;
  }
  .dropdown-toggle-1::after {
  display: none;
  }
  .hide {
  color: white;
  }
  .hide1 {
  opacity: 0;
  }
</style>
<div class="container-fluid">
  <!-- DataTables -->
  <div class="card mb-3" style="border-radius: 25px; ">
    <div class="card-header" style="background: rgba(31, 58, 147, 0.5); color:white; border-radius: 25px 25px 0px 0px; ">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle-1 my-2" id="dropdownMenuAdd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="opacity: 1">
        <i class="fas fa-plus"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuAdd">
          <a class="dropdown-item" href="<?php echo site_url('dashboard/addJadwalAset'); ?>"> Tambah Jadwal Aset</a>
          <a class="dropdown-item" href="<?php echo site_url('dashboard/addAset'); ?>"> Tambah Aset</a>
          <a class="dropdown-item" href="<?php echo site_url('dashboard/addJenis'); ?>"> Tambah Jenis</a>
          <a class="dropdown-item" href="<?php echo site_url('dashboard/addAtribut'); ?>"> Daftarkan Atribut</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive-sm table-hover">
        <table class="table table-hover table-bordered text-center" id="dataTable">
          <?php if(isset($exception)) : ?>
          <p>
            <?php echo $exception; ?>
          </p>
          <?php else : ?>
          <thead>
            <tr>
              <?php foreach ($columns as $col) :?>
              <?php if($col=="id" or $col=='Kelompok' or $col=='jenis_id') : continue?> 
              <?php elseif($col=="pembuat_form") :?>
              <th class="responsive">Pembuat</th>
              <?php elseif($col=="penyetuju_form") :?>
              <th class="responsive">Penyetuju</th>
              <?php elseif($col=="waktu") :?>
              <th class="responsive">Waktu (d-m-y)</th>
              <?php elseif($col=="jenis_perawatan") :?>
              <th class="responsive">Perawatan</th>
              <?php elseif($col=="nama") :?>
              <th class="responsive">Jenis Aset</th>
              <?php elseif($col=="satuan") :?>
              <th class="responsive">Satuan</th>
              <?php elseif($col=="id"  and $table =="jenis aset") :?>
              <th class="responsive" width="5"><a class="hide1">test</a></th>
              <?php elseif($col=="merk") :?>
              <th class="responsive">Merk</th>
              <?php elseif($col=="kapasitas") :?>
              <th class="responsive">Kapasitas</th>
              <?php elseif($col=="lokasi") :?>
              <th class="responsive">Lokasi</th>
              <?php else : ?>
              <th class="responsive">
                <?php echo $col ?>
              </th>
              <?php endif; ?>
              <?php endforeach;?>
              <th class="responsive">Action</th>
            </tr>
          </thead>
          <!--------------------------------------------------------------------------------------------------->  
          <tbody>
            <?php foreach ($records as $row):?>
            <tr>
              <?php foreach ($columns as $col): ?>
              <?php  if($col=="Jenis"): ?>
              <td class="responsive" align="center">
                <a href="<?php echo site_url('dashboard/showJenisAsetById/'.$row['jenis_id'])?>">
              
              <?php elseif($col == "Nama Jenis"): ?>
              <td class="responsive" align="left">
                <a href="<?php echo site_url('dashboard/showJenisAsetById/'.$row['id'])?>">
              
              <?php  elseif($col=="Nama"): ?>
              <td class="responsive" align="left">
                <a href="<?php echo site_url('dashboard/showAsetById/'.$row['id'])?>">
              
              <?php elseif($col!='id' and $col!='Kelompok' and $col!='jenis_id'): ?>
              <td class="responsive" align="left">
                <a>
              <?php endif;?>

              <?php if($col!='id' and $col!='Kelompok' and $col!='jenis_id') echo $row[$col] ?>
                </a>
              </td>
              <?php endforeach;?>
              <td class="responsive">
                <?php if ($table=='aset') {
                  # code...
                  $link_edit = 'editAset';
                  $link_hapus = 'hapusAset';
                  }
                  elseif ($table=='jenis aset') {
                   # code...
                  $link_edit = 'editJenis';
                  $link_hapus = 'hapusJenis';
                  }
                  elseif ($table=='jadwal') {
                  # code...
                  $link_edit = 'editJadwal';
                  $link_hapus = 'hapusJadwal';
                  }
                  elseif ($table=='atribut'){
                  $link_edit = 'editAtribut';
                  $link_hapus = 'hapusAtribut';
                  }
                  elseif ($table=='pemeriksaan'){
                  $link_edit = 'editPemeriksaan';
                  $link_hapus = 'hapusPemeriksaan';
                  }
                  else{
                  $link_edit = '';
                  $link_hapus = '';
                  }
                  ?>
                <a href="<?php echo base_url('dashboard/'.$link_edit.'/'.$row['id']); ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                <a onclick="deleteConfirm('<?php echo base_url('dashboard/'.$link_hapus.'/'.$row['id']); ?>')" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                <?php if ($table == 'jenis aset') : ?>
                <a href="<?php echo base_url('dashboard/showAsetByJenis/'.$row['id']) ?>" class="btn btn-small text-primary"> List Aset</a>
                <?php elseif($table == "jadwal"): ?>
                <a href="<?php echo base_url('form/getByJadwal/'.$row['id']) ?>" class="btn btn-small text-primary">Buka Form</a>
                <?php endif?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <?php endif;?>
        </table>
      </div>
    </div>
  </div>
</div>