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
	<?php $this->load->view("_partials/navbar_custom.php")?>
	<?php $this->load->view("_partials/modal.php")?>
	
	<div id="wrapper">
<?php $this->load->view("_partials/sidebar_custom")?>

<style>
	th{

		font-size: 100%;
	}
</style>
	 <div id="content-wrapper">
<?php $this->load->view("_partials/breadcrumb")?>


			<div class="container-fluid text-center ">
					<h3>Edit Akun</h3> 
			</div>
			<div class="container">
				<?php if ($this->session->flashdata('pesan')): ?>
                        <div class="alert alert-success" role="alert">
                               <?php echo $this->session->flashdata('pesan'); ?>
                        </div>
                 <?php endif; ?>
					<?php echo form_open('login/proses_edit') ?>
						  	
                        	<label> Nama </label><br>
                        	<input type="text" name="nama" class="text-center" placeholder="Masukkan Nama" required style="width: 200px; border-radius: 25px;">
                            <br><br>


                            <label> Email</label><br>
                            <input type="text" name="email" class="text-center" placeholder="Masukkan Email" required style="width: 200px; border-radius: 25px;">
                            <br><br>

                          
                        	
                        	<label>Password</label><br>
                        	<input type="password" class="text-center" name="password" placeholder="Masukkan Password" required style="width: 200px; border-radius: 25px;">
                        		<div style="color: red; margin-bottom:15px;">
                            			<?php if($this->session->flashdata('message')){
                            			echo $this->session->flashdata('message');
                            		}
                            		?>
                                
                                </div>
                                
                                <div class="card-footer" style="border-radius: 25px;">
                                    
                                    
                                        <button type="submit" class="btn btn-primary" style="opacity: 0.7; border-radius: 25px; width: 100px;">Edit</button>
                                    <?php echo form_close() ?>
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