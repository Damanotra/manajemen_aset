<style>
 thead{
   text-align: center;
 }

</style>
<div class="container-fluid">
   <!-- DataTables -->
   <div class="card mb-3">
      <div class="card-header">
         <a href="<?php echo '' ?>"><i class="fas fa-plus"></i> Add New</a>
      </div>
      <div class="card-body">
         <div class="table-responsive-sm table-hover">
            <table class="table table-hover table-bordered text-center" id="dataTable">
               <thead>
                  <tr>
                     <?php foreach ($columns as $col) :?>
                       <?php  if ($col=="jenis_id") :?>
                            
                            <th class="responsive">Jenis</th>
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
                  <td class="responsive">
                     <a href="<?php echo site_url('dashboard/showJenisAsetById/'.$row[$col])?>">
                        <?php else: ?>
                  <td class="responsive">
                  <a>
                  <?php endif;?>
                  <?php echo $row[$col] ?>
                  </a>
                  </td>
                  <?php endforeach;?>
                  <td class="responsive">
                     <a href="<?php echo '' ?>"
                        class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>|
                     <a onclick=""
                        href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>