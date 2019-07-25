<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="style">
<style>
@font-face{
    font-family: test;
    src:url(font/Gotham-Bold.ttf);
}
.btn-success {
    font-family: 'test';
    
}
.btn-primary
    {
        font-family: 'test';
        background-color: navy;
        opacity: 0.7;
    }
label
    {
        font-family: 'test';
    }
#mid {
    margin-top: 10%;
}

 </style>
</div>
</head>



<body>
 

	<div class="container-responsive text-center" id="mid">
        <div class="d-flex justify-content-center">

                <div class="card" style="width: 250px; border-radius: 25px;">
                    <div class="card-header"  style="border-radius: 25px;">
                        <h1 style="color: grey;"><i class="fas fa-user-alt"></i></h1>
                    </div>
            
                        <?php echo form_open('login/login_proccess') ?>
                        	
                            <label> Username</label><br>
                        	<input type="text" class="text-center" name="username" placeholder="Username" required oninvalid="this.setCustomValidity('Masukkan Username dengan benar')" style="border-radius: 25px;">
                            <br><br>
                        
                        	<label>Password</label><br>
                            
                        	       <input type="password" class="form-password text-center" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Masukkan Password dengan benar')" style="border-radius: 25px;"><br><input type="checkbox" class="form-checkbox" value="Show password"> 
                        	
                                <div style="color: red; margin-bottom:15px;">
                            			<?php if($this->session->flashdata('message')){
                            			echo $this->session->flashdata('message');
                            		}
                            		?>
                                
                                </div>
                                
                                <div class="card-footer" style="border-radius: 25px;">
                                    
                                    
                                        <button type="submit" class="btn btn-primary" style="opacity: 0.7; border-radius: 25px;">Login</button>
                                    <?php echo form_close() ?>
                                    
                                        <a class="btn btn-success" href="<?php echo base_url()?>login/daftar" style="opacity: 0.7; border-radius: 25px;">Register</a>
                               
                            </div>
                      
                </div>
            </div>
</div>
</body>

<script type="text/javascript">
    
$(document).ready(function(){       
        $('.form-checkbox').click(function(){
            if($(this).is(':checked')){
                $('.form-password').attr('type','text');
            }else{
                $('.form-password').attr('type','password');
            }
        });
    });

</script>
</html>