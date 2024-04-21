<div class="containe">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title"> Nama :<?= $mahasiswa['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $mahasiswa['nim']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $mahasiswa['email']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $mahasiswa['jurusan']; ?></h6>
                    <p class="card-text"></p>
                    <a href="<?= base_url() ?>mahasiswa" class="btn btn-primary">kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>