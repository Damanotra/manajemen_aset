<!-- Sidebar -->


<ul class="sidebar  navbar-nav" style="background-color: navy;   border-radius: 0px 25px 25px 0px; opacity: 0.6;">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('dashboard') ?>" style="text-shadow: 2px 2px black;">
            <i class="far fa fa-tachometer-alt" style="text-shadow: 2px 2px black;"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" 
             style="text-shadow: 2px 2px black;">
            <i class="fab fa-wpforms" style="text-shadow: 2px 2px black;"></i>
            <span>Form</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" >
            <a class="dropdown-item" href="<?php echo site_url('dashboard/showJadwalByJenis/1') ?>">Jadwal Aset</a>
            <a class="dropdown-item" href="<?php echo site_url('dashboard/showJenisAll') ?>">Jenis Aset</a>
            <a class="dropdown-item" href="<?php echo site_url('form/formAset/1') ?>">Pengisian Form Aset</a>
        </div>
    </li> -->
   
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal" style="text-shadow: 2px 2px black;">
            <i class="fas fa-sign-out-alt" style="text-shadow: 2px 2px black;"></i>
            <span>Logout</span></a>
    </li>
</ul>
