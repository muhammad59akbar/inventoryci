<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>


<div class="main-content mt-5" id="mainContent">
    <h2 class="mt-2">List Pesanan</h2>

    <hr>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>




    <?php if (!empty($listorder)) : ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col border-2">No</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah Pesanan</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status</th>

                        <th scope="col">Action</th>



                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($listorder as $order) : ?>

                        <tr class="text-center">
                            <th><?= $no++ ?></th>
                            <td><?= $order['nama_pemesan'] ?></td>
                            <td><?= $order['nama_produk'] ?></td>

                            <td><?= $order['jumlah_pesanan'] ?></td>
                            <td><?= number_format($order['total_harga'], 0, ',', '.') ?></td>
                            <td><?= $order['status'] ?></td>
                            <td>

                                <a href="<?= base_url('/DetailOrder/' . url_title($order['nama_pemesan'], '-', true)); ?>" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                <?php if (in_groups(['Owner', 'Staff Admin'])) : ?>
                                    <?= view('ApproveItems', ['order' => $order]); ?>


                                    <form class="d-inline" method="post" action="<?= base_url('/DeleteOrder/' . $order['id_approve']) ?>">

                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus Pengguna ini ???')"><i class="bi bi-archive-fill"></i></button>
                                    </form>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>


                </tbody>

            </table>
        </div>
    <?php else : ?>
        <p class="mt-1">Data Pesanan Tidak Tersedia !!!</p>
    <?php endif ?>
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