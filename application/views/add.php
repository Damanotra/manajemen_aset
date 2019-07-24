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
                                                <a href="<?php echo site_url('admin/activities/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                                            </div>
                                            <div class="card-body">

                                                <form action="<?php site_url('addAset') ?>" method="get" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="merk">Merk*</label>
                                                        <input class="form-control <?php echo form_error('merk') ? 'is-invalid':'' ?>" type="text" name="merk" placeholder="Aset Merk" />
                                                        <div class="invalid-feedback">
                                                            <?php echo form_error('name') ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="kapasitas">Kapasitas*</label>
                                                        <input class="form-control <?php echo form_error('kapasitas') ? 'is-invalid':'' ?>" type="text" name="kapasitas" min="0" placeholder="Aset kapasitas" />
                                                        <div class="invalid-feedback">
                                                            <?php echo form_error('kapasitas') ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="lokasi">Lokasi*</label>
                                                        <input class="form-control <?php echo form_error('lokasi') ? 'is-invalid':'' ?>" type="text" name="lokasi" placeholder="Aset lokasi" />
                                                        <div class="invalid-feedback">
                                                            <?php echo form_error('lokasi') ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="jenis_id">Jenis*</label>
                                                        <input class="form-control <?php echo form_error('jenis_id') ? 'is-invalid':'' ?>" type="text" name="jenis_id" placeholder="Aset jenis_id...">
                                                        <div class="invalid-feedback">
                                                            <?php echo form_error('jenis_id') ?>
                                                        </div>                                                    </div>

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