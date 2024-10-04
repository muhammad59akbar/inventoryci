<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>
<div class="main-content mt-5" id="mainContent">
    <h2 class="mt-2">List User</h2>
    <hr>

    <?= $this->include('AddUser'); ?>


    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col border-2">No</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($userspdop as $users) : ?>
                <tr class="text-center">
                    <th><?= $no++ ?></th>
                    <td><?= $users['email'] ?></td>
                    <td><?= $users['fullname'] ?></td>
                    <td><?= $users['role'] ?></td>
                    <td>
                        <a href="<?= base_url() . $users['id'] ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        <form class="d-inline">
                            <input type="hidden">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-archive-fill"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>
</div>

<?= $this->endSection(); ?>