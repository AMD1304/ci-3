<div class="container">

    <div class="row mt-3">
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">



                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                            <small class="form-text text-danger"><?= form_error('nama') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" class="form-control" id="nim">
                            <small class="form-text text-danger"><?= form_error('nim') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                            <small class="form-text text-danger"><?= form_error('email') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" id="jurusan" name="jurusan">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Teknik Komputer">Teknik Komputer</option>
                                <option value="Teknik Jaringan">Teknik Jaringan</option>

                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">
                            Tambah Data
                        </button>


                </div>
            </div>







            </form>
        </div>
    </div>