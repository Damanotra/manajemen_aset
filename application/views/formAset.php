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

        <script src="jquery.tabledit.min.js"></script>

        <?php $this->load->view("_partials/head.php")?>
    </div>

    <div class="style">
        <style>
            @font-face {
                font-family: test;
                src: url(font/Gotham-Bold.ttf);
            }
            
            h1 {
                font-family: 'test';
            }
            
            th {
                font-family: 'test';
            }
            
            td {
                font-family: 'test';
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
                                <div class="container-fluid text-center">

                                    <h1>Form Aset</h1>

                                    <?php $this->load->view("_partials/dropdown.php")?>
                                    <div class="card" style="border-radius: 25px 25px 25px 25px;">
                                        <div class="card-header"  style="background: rgba(31, 58, 147, 0.5); color:white; border-radius: 25px 25px 0px 0px; ">
                                        </div>
                                        <div class="card-body">
                                        <?php $this->load->view("_partials/form1.php")?>
                                    </div>
                                    <div class="card-footer" style="background: rgba(31, 58, 147, 0.5); border-radius: 0px 0px 25px 25px;">
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

<script type="text/javascript">
    $('body').on('click', '[data-editable]', function(){
  
  var $el = $(this).children('p');
  var $par = $(this).parent('tr');
              
  var $input = $('<input name="nilai" />').val( $el.text() );
  $el.replaceWith( $input );
  
  var save = function(){
    $.ajax({
        type:"POST",
        url:"<?php echo site_url('form/editKondisi'); ?>",
        data : {"nilai":$input.val(),
                "pemeriksaan":$el.attr('title'),
                "row_id":$par.attr('id')},
        success: function($result) { //we got the response
             alert("sukses");
        },
        error: function(jqxhr, status, exception) {
             console.log(exception);
         },
    });
    var $p = $el.text($input.val());
    $input.replaceWith( $p );
  };
  
  /**
    We're defining the callback with `one`, because we know that
    the element will be gone just after that, and we don't want 
    any callbacks leftovers take memory. 
    Next time `p` turns into `input` this single callback 
    will be applied again.
  */
  $input.one('blur', save).focus();
  
});
</script>

</html>