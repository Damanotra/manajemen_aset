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

<div class="style">
<style>
@font-face{
	font-family: test;
	src:url(font/GothamBold.ttf);
}
h1 {
	font-family: 'test';
	color: navy;
	opacity: 0.5;
}
h2 {
	font-family: 'test';
	
}

p
	{
		font-family: 'test';
		font-size: 18px;
	}

 </style>
</div>

</head>
<body>
	<?php $this->load->view("_partials/navbar_custom.php")?>
	<?php $this->load->view("_partials/modal.php")?>
	
	<div id="wrapper">
<?php $this->load->view("_partials/sidebar_custom")?>

	 	<div id="content-wrapper">
<?php $this->load->view("_partials/breadcrumb")?>
<div class="container">
			<div class="container-fluid text-center mt-5">
					<h1>About Us</h1>
				</div>
	<div class="container mt-4"style="border-radius: 25px;">
								<div class="row mt-2">
		<div class="col-sm-6">
			<div class="card" style="border-radius: 25px;">
				<div class="card-header text-center" style="background-color: navy; opacity: 0.4; color:white; border-radius: 25px; ">
			<h2> Tentang website kami </h2>
				</div>
				<div class="card-body" style="border-radius: 25px;">
			<p>"Manajemen Aset" adalah sebuah website yang dibuat pada bulan Juli 2019. Website ini digunakan sebagai media untuk mendata aset-aset perusahaan. Website ini juga memudahkan penggunanya untuk mendata dan mengisi form secara dinamis. </p>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
		</div>
							 
								</div>
	<hr class="mt-4" style="border: 1px solid navy; opacity: 0.2">
								<div class="row mt-5">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
			<div class="card" style="border-radius: 25px;">
				<div class="card-header text-center" style="background-color: navy; opacity: 0.4; color:white; border-radius: 25px; ">
			<h2> Cara Penggunaan </h2>
				</div>
				<div class="card-body" style="border-radius: 25px;">
			<p>Untuk dapat mengakses website ini, diharuskan untuk melakukan login.</p>
			<p><strong>1. </strong> Masuk ke halaman website dengan melakukan Login.</p>
			<a href="../images/login.png" target="_blank"><img src="../images/login.png" width="100"></a>
				<i class="fas fa-arrow-right mx-2"></i>
			<a href="../images/after_login.png" target="_blank"><img src="../images/after_login.png" width="100"></a>
				
			<p><strong>2. </strong> Berikut adalah menu-menu yang dapat diakses oleh pengguna. </p>
			<a href="../images/sidebar.png" target="_blank"><img src="../images/sidebar.png" width="100"></a><i class="fas fa-arrow-right mx-2"></i>
			<a href="../images/sidebar1.png" target="_blank"><img src="../images/sidebar1.png" width="100"></a>
			<p><strong>3. </strong> Tabel yang menampilkan isi dari form yang telah diisi. </p>
			<a href="../images/form.png" target="_blank"><img src="../images/form.png" width="150"></a>
			<p><strong>4. </strong> Isi data form melalui form berikut. </p>
			<a href="../images/form1.png" target="_blank"><img src="../images/form1.png" width="150"></a>
				
				</div>
			</div>
		</div>
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
