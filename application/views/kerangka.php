<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>
</head>
<body id="page-top">
	<!--navbar-->
	<div id="wrapper">
		<!--sidebar-->
		<div id="content-wrapper">
			<div class="container-fluid">
				<!--code here-->
				<?php $this->load->view('_partials/datatable.php'); ?>

			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-wrapper -->
	</div>
	<!-- /#wrapper -->
	
	<?php $this->load->view("_partials/js.php") ?>


</body>

</html>