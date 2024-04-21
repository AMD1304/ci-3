 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


     <div class="row">
         <div class="col-lg-6">
             <?= $this->session->flashdata('message'); ?>
             <form action="<?= base_url(); ?>user/changepasswoard" method="post">

                 <div class="form-group">
                     <label for="current_passwoard">Passwoard Lama</label>
                     <input type="password" class="form-control" id="current_passwoard" name="current_passwoard" placeholder="Masukan Passwoard Lama"><?= form_error('current_passwoard', ' <small class="text-danger  pl-3">', '</small>'); ?>
                 </div>

                 <div class="form-group">
                     <label for="new_passwoard1">Passwoard Baru</label>
                     <input type="password" class="form-control" id="new_passwoard1" name="new_passwoard1" placeholder="Masukan Passwoard Baru"><?= form_error('new_passwoard1', ' <small class="text-danger  pl-3">', '</small>'); ?>
                 </div>

                 <div class="form-group">
                     <label for="new_passwoard2">Passwoard Konfirmasi</label>
                     <input type="password" class="form-control" id="new_passwoard2" name="new_passwoard2" placeholder="Konfirmasi Passwoard"><?= form_error('new_passwoard2', ' <small class="text-danger  pl-3">', '</small>'); ?>
                 </div>

                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">Ubah Passwoard</button>
                 </div>



             </form>

         </div>
     </div>



 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->