<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
<div class="open-head">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<?php $this->load->view("_partials/head.php")?>
</div>

</head>
<body>
	<?php $this->load->view("_partials/navbar.php")?>
	<?php $this->load->view("_partials/modal.php")?>
	<?php $this->load->view("_partials/sidebar")?>
	<div id="wrapper">

<style>
	{
		
	}

	th{

		font-size: 100%;
	}
</style>
	 <div id="content-wrapper">

<div class="container-fluid text-center">
		<h1>Akun</h1>

</div>		
	</div>

		
</div>
</div>
<?php $this->load->view("_partials/js.php")?>
<?php $this->load->view("_partials/footer.php")?>



<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>