
<style>
.navbar-custom {
    background-color: #1E90FF;
    border-radius: 0px 0px 25px 0px;
    opacity: 0.7
}
/* change the brand and text color */
.navbar-custom .navbar-brand,
.navbar-custom .navbar-text {
    color: rgba(255,255,255,.8);
}
/* change the link color */
.navbar-custom .navbar-nav .nav-link {
    color: rgba(255,255,255,.5);
}
/* change the color of active or hovered links */
.navbar-custom .nav-item.active .nav-link,
.navbar-custom .nav-item:hover .nav-link {
    color: #ffffff;
}
</style>


<nav class="navbar navbar-expand navbar-custom static-top">

    <a class="navbar-brand mr-1" href="<?php echo site_url('login/logout') ?>"><?php echo SITE_NAME ?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a href="<?php echo site_url('login') ?>" class="nav-link" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-home"> Home</i>
            </a>
            
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
               <i class="fas fa-users"></i> About Us
                <span class="badge badge-danger">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>Account
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalUser"><?php echo $_SESSION["nama"] ?></a>
                <a class="dropdown-item" href="<?php echo site_url('login/edit')   ?>">Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>

<div class="modal fade" id="modalUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h3> Akun anda</h3>
             </div>

            <div class="modal-body">
                 
                <p>Nama : <?php echo $pengguna["nama"]?></p>
                <p>Username : <?php echo $pengguna["username"]?></p>
                <p>Email : <?php echo $pengguna["email"]?></p>
            </div>

            <div class="modal-footer">
                <form action="<?php echo 'login/edit'   ?>">
              <a class="btn btn-primary" href="<?php echo site_url('login/edit')?>"> Edit Akun</a>
                </form>
            </div>
        </div>
    </div>
</div>
