<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalus">
    <i class="bi bi-person-add"></i> New Users
</button>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success mt-2" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="modalus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/Admin/AddUser') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" id="email" aria-describedby="email" name="email" value="<?= old('email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>" id="username" aria-describedby="username" name="username" value="<?= old('username') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.username') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" id="password" aria-describedby="password" name="password">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="confpass" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control <?= session('errors.confpass') ? 'is-invalid' : '' ?>" id="confpass" aria-describedby="confpass" name="confpass">
                        <div class="invalid-feedback">
                            <?= session('errors.confpass') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="namalengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control <?= session('errors.namalengkap') ? 'is-invalid' : '' ?>" id="namalengkap" aria-describedby="namalengkap" name="namalengkap" value="<?= old('namalengkap') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.namalengkap') ?>
                        </div>

                    </div>
                    <div class="my-2">
                        <img class="img-thumbnail" src="<?= base_url('assets/images/addimage.png') ?>" alt="" width="250" height="250" id="prevImageKaryawan">

                    </div>
                    <div class="mb-2 ">
                        <label for="imgKaryawan" class="form-label">Foto</label>
                        <input class="form-control <?= session('errors.namalengkap') ? 'is-invalid' : '' ?>" type="file" id="imgKaryawan" name="imgKaryawan" onchange="changeImage(this, 'prevImageKaryawan')">
                        <div class="invalid-feedback">
                            <?= session('errors.imgKaryawan') ?>
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" aria-label="Default select example" name="role">
                            <option value="1">Owner</option>
                            <option value="2">Staff</option>
                            <option value="3">Sales</option>
                            <option value="4" selected>Kurir</option>
                        </select>

                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>