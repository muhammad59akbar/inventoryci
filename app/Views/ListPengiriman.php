<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>


<div class="main-content mt-5" id="mainContent">
    <h2 class="mt-2">List Pengiriman</h2>
    <hr>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success m-2" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>



    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col border-2">No</th>
                    <th scope="col">No Resi</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Alamat Pemesan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>



                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>


                <tr class="text-center">
                    <th><?= $no++ ?></th>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>

                    <td>




                        <a href="" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                        <form class="d-inline" method="post" action="">

                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus Pengguna ini ???')"><i class="bi bi-archive-fill"></i></button>
                        </form>
                    </td>
                </tr>


            </tbody>

        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        <?php if (session('errors')) : ?>
            var orderID = '<?= session('orderID') ?>';
            $('#approve-items-' + orderID).modal('show');

        <?php endif; ?>
    });
</script>


<?= $this->endSection(); ?>