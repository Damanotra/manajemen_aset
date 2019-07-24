<!-- Sidebar -->

<ul class="sidebar  navbar-nav" style="text-shadow: 2px 2px black; background-color: navy;   border-radius: 0px 25px 15px 0px; opacity: 0.7;">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('login') ?>">
            <i class="far fa fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fab fa-wpforms"></i>
            <span>Form</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('dashboard/showJadwalByJenis/1') ?>">Jadwal Aset</a>
            <a class="dropdown-item" href="<?php echo 'showJenisAll' ?>">Jenis Aset</a>
            <a class="dropdown-item" href="<?php echo '' ?>">Pengisian Form Aset</a>
            <a class="dropdown-item" href="<?php echo '' ?>">Pengisian Form Aset</a>
        </div>
    </li>
   
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('login/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
</ul>
