<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<?php $this->load->view("_partials/head.php")?>
</head>
<body>
	<?php $this->load->view("_partials/navbar.php")?>
	
	<?php $this->load->view("_partials/modal.php")?>
	<div id="wrapper">

<style>
	#content-wrapper{
		margin: 20%;
	}

</style>
		<div id="content-wrapper">

		<div class="container-fluid text-center">
		<h1>Dashboard</h1>
		
		<?php var_dump($user["nama"]);
		exit(); ?>
			<p><?php echo  $user["nama"] ?></p>

		

	<h2>Assalamualaikum</h2>
		<?php echo anchor('login/logout','Logout') ?>
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