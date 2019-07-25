<style>
 thead{
   text-align: center;
 }

</style>
<div class="container-fluid">
   <!-- DataTables -->
   <div class="card mb-3">
      <div class="card-header">
         <a href="<?php echo site_url('dashboard/addAset'); ?>"><i class="fas fa-plus"></i> Add New</a>
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
                  <td class="responsive" align="left">
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
                        href="<?php echo '' ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>