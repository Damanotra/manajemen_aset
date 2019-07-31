<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>

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
            @font-face {
                font-family: test;
                src: url(font/Gotham-Bold.ttf);
            }
            
            h1, th, td {
                font-family: 'test';
                font-size: 50px;
            }
a:link {
  color: navy;
  text-decoration: none;
}

/* visited link */
a:visited {
  color: #0A81F0;
  opacity: 0.7;
}

/* mouse over link */
a:hover {
  color: lightblue;
}

/* selected link */
a:active {
  color: navy;
} 
#basic {
    color: black;
}
        </style>
    </div>

</head>

<body style="background: url(../../images/sigma1.jpg);">
      <button type="button" class="close" style="color: grey"> <a id="basic" href="<?php echo base_url('login/logout')?>">x</a></button>
            <div id="wrapper">
          
                    <div id="content-wrapper">

                            <div class="container text-center" style="border: 1px solid grey; border-radius: 0.5; background-color: white; margin-top: 20%;  opacity: 0.7">
                            <h1><br></h1>
                            <h1> <a href="<?php echo base_url('dashboard') ?>">-Selamat Datang-</a></h1>
                            <h1><br></h1>
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