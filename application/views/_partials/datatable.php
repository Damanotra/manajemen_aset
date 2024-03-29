<div class="container-fluid">
   <!-- DataTables -->
   <div class="card mb-3">
      <div class="card-header">
         <a href="<?php echo 'addAset'; ?>"><i class="fas fa-plus"></i> Add New</a>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <?php foreach ($columns as $col) :
                        if ($col=="jenis_id") {
                            # code...
                           echo "<th>Jenis";
                         } else {
                            # code...
                           echo "<th>".$col;
                         }
                          ?>
                     </th>
                     <?php endforeach;?>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($records as $row):
                     echo "<tr>";
                     foreach ($columns as $col): 
                        if($col=="jenis_id"): ?>
                  <td >
                     <a href="<?php echo site_url('dashboard/showJenisAsetById/'.$row[$col])?>">
                        <?php else: ?>
                  <td width="150">
                  <a>
                  <?php endif;?>
                  <?php echo $row[$col] ?>
                  </a>
                  </td>
                  <?php endforeach;?>
                  <td>
                     <a href="<?php echo '' ?>"
                        class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                     <a onclick=""
                        href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                     <?php if ($table == 'jenis aset') : ?>
                        <a href="<?php echo site_url('dashboard/showAsetByJenis/'.$row['id']) ?>"
                        class="btn btn-small text-primary"> List Aset</a>
                     <?php endif?>
                  </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>