<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Item</title>
        <div class="open-head">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <style>
                th {
                font-size: 100%;
                }
            </style>
            <?php $this->load->view("_partials/head.php")?>
        </div>
    </head>
    <body id="page-top">
        <?php $this->load->view("_partials/navbar_custom.php")?>
        <?php $this->load->view("_partials/modal.php")?>
        <div id="wrapper">
        <?php $this->load->view("_partials/sidebar_custom")?>
        <div id="content-wrapper">
            <?php $this->load->view("_partials/breadcrumb")?>
            <div class="container-fluid">
                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('dashboard') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php site_url('addPemeriksaan') ?>" method="post" enctype="multipart/form-data">
                            <?php $this->load->view('_partials/form_group', $data = array('nama_atribut'=>'Hal yang diperiksa', 'nama_tanpa_spasi'=>'pemeriksaan'));?>
                            <?php $this->load->view('_partials/fg_jenis'); ?>
                            <?php $this->load->view('_partials/form_group', $data = array('nama_atribut'=>'Deskripsi', 'nama_tanpa_spasi'=>'deskripsi'));?>
                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                        </form>
                    </div>
                    <div class="card-footer small text-muted">
                        * required fields
                    </div>
                </div>
                <!-- /.container-fluid -->
                <!-- Sticky Footer -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php $this->load->view("_partials/js.php")?>
        <?php $this->load->view("_partials/footer.php")?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    </body>
</html>