<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Siap untuk keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Klik "Logout" untuk keluar</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?php echo site_url('login/logout')?>">Logout</a>
      </div>
    </div>
  </div>
</div>


<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalUser">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

              <h3> Akun anda</h3>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
             </div>

            <div class="modal-body">
                 
                <p>Nama : <?php echo $_SESSION["nama"]?></p>
                <p>Username : <?php echo $_SESSION["username"]?></p>
                <p>Email : <?php echo $_SESSION["email"]?></p>
            </div>

            <div class="modal-footer">
                <form action="<?php echo 'login/edit'   ?>">
              <a class="btn btn-primary" href="<?php echo site_url('login/edit')?>"> Edit Akun</a>
                </form>
            </div>
        </div>
    </div>
</div>

