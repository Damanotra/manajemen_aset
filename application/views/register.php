<!DOCTYPE html>
<html>
<head>
    <title>REGISTER</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    
    #mid{
        margin: 10%;
    }

</style>
<body>

	<div class="container-responsive text-center" id="mid">
        <div class="d-flex justify-content-center">

                <div class="card" style="width: 250px; border-radius: 25px;">
                    <div class="card-header" style="border-radius: 25px;">
                        <h1 style="color: grey;"><i class="fas fa-user-alt"></i></h1>
                    </div>
            
                        <?php echo form_open('login/daftar') ?>
                        	<label> Nama </label><br>
                        	<input type="text" name="nama" class="text-center" placeholder="Masukkan Nama" required  oninvalid="this.setCustomValidity('Masukkan Nama')" style="width: 200px; border-radius: 25px;">
                            <br><br>

                            <label> Email</label><br>
                            <input type="text" name="email" class="text-center" placeholder="Masukkan Email" required oninvalid="this.setCustomValidity('Masukkan Email')" style="width: 200px; border-radius: 25px;">
                            <br><br>

                            <label> Username</label><br>
                        	<input type="text" name="username" class="text-center" placeholder="Masukkan Username" required  oninvalid="this.setCustomValidity('Masukkan Username')" style="width: 200px; border-radius: 25px;">
                            <br><br>
                        	
                        	<label>Password</label><br>
                        	<input type="password" class="text-center" name="password" placeholder="Masukkan Password" required  oninvalid="this.setCustomValidity('Masukkan Password')" style="width: 200px; border-radius: 25px;">
                        		<div style="color: red; margin-bottom:15px;">
                            			<?php if($this->session->flashdata('message')){
                            			echo $this->session->flashdata('message');
                            		}
                            		?>
                                
                                </div>
                                
                                <div class="card-footer" style="border-radius: 25px;">
                                    
                                    
                                        <button type="submit" class="btn btn-primary" style="opacity: 0.7; border-radius: 25px;">Register</button>
                                    <?php echo form_close() ?>
                                    
                                        <a class="btn btn-warning" href="<?php echo base_url()?>login" style="opacity: 0.7; color: white; border-radius: 25px;">Kembali</a>
                               
                            </div>
                      
                </div>
            </div>

</body>
</html>