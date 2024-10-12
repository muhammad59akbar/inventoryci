<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>
<div class="main-content mt-5" id="mainContent">
    <h2 class="mt-2">Edit User</h2>

    <hr>
    <a href="<?= base_url('/ListUser') ?>" class="m-2">&laquo; Kembali</a>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success m-2" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/EditUser/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="hidden" name="fotoOld" value="<?= $user['image_name'] ?>">

        <div class="container mt-3">
            <div class="d-flex flex-column flex-lg-row mb-3">
                <div class="col-lg-5">

                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" id="email" aria-describedby="email" name="email" required value="<?= $user['email'] ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.email') ?>
                    </div>
                </div>
                <div class="col-lg-5 mx-0 mx-lg-5">

                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>" id="username" aria-describedby="username" name="username" value="<?= $user['username'] ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.username') ?>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-lg-row mb-3 align-items-center ">
                <div class="col-lg-4">
                    <img class="img-thumbnail" src="<?= base_url('assets/images/karyawan/') . $user['image_name'] ?>" alt="" width="250" height="250" id="prevImageKaryawan">

                </div>
                <div class="col-lg-5">
                    <label for="imagekaryawan">Gambar Karyawan</label>
                    <input type="file" class="form-control <?= session('errors.imagekaryawan') ? 'is-invalid' : '' ?>" id="imagekaryawan" aria-describedby="imagekaryawan" name="imagekaryawan" onchange="changeImage(this, 'prevImageKaryawan')">
                    <div class="invalid-feedback">
                        <?= session('errors.imagekaryawan') ?>
                    </div>
                </div>
            </div>
            <div class=" col-lg-5 mb-3">
                <label for="namalengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control <?= session('errors.namalengkap') ? 'is-invalid' : '' ?>" id="namalengkap" aria-describedby="namalengkap" name="namalengkap" value="<?= $user['fullname'] ?>">
                <div class="invalid-feedback">
                    <?= session('errors.namalengkap') ?>
                </div>
            </div>
            <div class=" col-lg-5 mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" aria-describedby="password" name="password">
                <span class="text-danger" style="font-size: 12px">*Isi Password Jika Diubah</span>
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Role</label>
                <select class="form-select" name="role" id="role">
                    <?php foreach ($roles as $role): ?>

                        <option value="<?= $role->id ?>" <?= $role->id == $user['role'] ? 'selected' : '' ?>>
                            <?= $role->name ?>
                        </option>
                    <?php endforeach; ?>
                </select>



            </div>







            <a href="<?= base_url('/ListUser') ?>" class="btn btn-secondary ">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>



    </form>
</div>

<?= $this->endSection(); ?>