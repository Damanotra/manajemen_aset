<style>
 thead{
   text-align: center;
 }
.dropdown-toggle-1::after {
    display:none;
}
</style>
<div class="container-fluid">
   <!-- DataTables -->
   <div class="card mb-3" style="border-radius: 25px; ">
      <div class="card-header" style="background: rgba(31, 58, 147, 0.5); color:white; border-radius: 25px 25px 0px 0px; ">
             <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle-1 my-2"  id="dropdownMenuAdd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="opacity: 0.6">
                        <i class="fas fa-plus"></i>   
                    </button>
                 
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuAdd">
                  <a class="dropdown-item" href="<?php echo site_url('dashboard/addJadwalAset'); ?>"> Tambah Jadwal Aset</a>
                  <a class="dropdown-item" href="<?php echo site_url('dashboard/addAset'); ?>"> Tambah Aset</a>
                 </div>
                 
               </div>
      </div>
    
      <div class="card-body">
         <div class="table-responsive-sm table-hover">
            <table class="table table-hover table-bordered text-center" id="dataTable">
               <thead>
                  <tr>
                     <?php foreach ($columns as $col) :?>

                        <?php  if ($col=="jenis_id") :?>
                           <th class="responsive">Jenis</th>

                        <?php elseif($col=="pembuat_form") :?>
                           <th class="responsive">Pembuat</th>

                        <?php elseif($col=="penyetuju_form") :?>
                           <th class="responsive">Penyetuju</th>

                        <?php elseif($col=="waktu") :?>
                           <th class="responsive">Waktu (d-m-y)</th>

                        <?php elseif($col=="jenis_perawatan") :?>
                           <th class="responsive">Perawatan</th>

                        <?php elseif($col=="id") :?>
                          <th class="responsive">No</th>

                        <?php elseif($col=="merk") :?>
                           <th class="responsive">Merk</th>

                        <?php elseif($col=="kapasitas") :?>
                           <th class="responsive">Kapasitas</th>

                        <?php elseif($col=="lokasi") :?>
                           <th class="responsive">Lokasi</th>

                        <?php else : ?>
                           <th class="responsive"><?php echo $col ?></th>
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
                      <?php  if($col=="jenis_id"): ?>
                  <td class="responsive" align="left">
                     <a href="<?php echo site_url('dashboard/showJenisAsetById/'.$row[$col])?>">
                      <?php elseif($col == "nama" and $table == "jenis aset" and isset($row['parent'])): ?>
                        <td class="responsive">
                      <?php else: ?>
                  <td class="responsive" align="center">
                  <a>
                  <?php endif;?>
                  <?php echo $row[$col] ?>
                  </a>
                  </td>
                  <?php endforeach;?>
                  <td class="responsive">
                     <a href="<?php echo 'editAset' ?>"
                        class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>|
                     <a onclick=""
                      href="#" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
