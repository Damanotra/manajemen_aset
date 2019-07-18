<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>
</head>


<body id="page-top">


	<div id="wrapper">


		<div id="content-wrapper">

			<div class="container-fluid">


				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo '' ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Barang</th>
										<th>Gambar</th>
										<th>Comment</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach (array(1,2,3,4,5) as $a): ?>
									<tr>
										<td width="150">
											<?php echo $a ?>
										</td>
										<td>
											<?php echo $a ?>
										</td>
										<td>
											<?php echo $a ?>
										</td>
										<td>
											
										</td>
										<td class="small">
											<?php echo substr($a, 0, 120) ?>...</td>
										<td width="250">
											<a href="<?php echo '' ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
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
			<!-- /.container-fluid -->

			

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->
	
	<?php $this->load->view("_partials/js.php") ?>


</body>

</html>