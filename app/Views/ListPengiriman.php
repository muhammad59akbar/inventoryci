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

    <?php

    $Delivery = false;
    foreach ($listpngirim as $pengirim) {
        if ($pengirim['status'] === 'Delivery') {
            $Delivery = true;
            break;
        }
    }
    ?>
    <?php if (!empty($Delivery)) : ?>

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
                    <?php foreach ($listpngirim as $pengirim) : ?>
                        <?php if ($pengirim['status'] === 'Delivery') : ?>


                            <tr class="text-center">
                                <th><?= $no++ ?></th>
                                <td><?= $pengirim['no_resi'] ?></td>
                                <td><?= $pengirim['nama_pemesan'] ?></td>
                                <td><?= $pengirim['alamat_pemesanan'] ?></td>
                                <td><?= $pengirim['status'] ?></td>

                                <td>
                                    <?php if (in_groups(['Owner', 'Kurir'])) : ?>
                                        <?= view('DeliveryItem', ['pengirim' => $pengirim]); ?>
                                    <?php endif ?>
                                    <a href="<?= base_url('/DetailPengiriman/' . $pengirim['no_resi']) ?>" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                    <?php if (in_groups(['Owner', 'Staff Admin'])) : ?>
                                        <form class="d-inline" method="post" action="">

                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus Pengguna ini ???')"><i class="bi bi-archive-fill"></i></button>
                                        </form>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach; ?>


                </tbody>

            </table>
        <?php else : ?>
            <p class="mt-1">Data Pengiriman Tidak Tersedia !!!</p>
        <?php endif ?>
        </div>
</div>

<script>
    $(document).ready(function() {
        <?php if (session('errors')) : ?>
            var deliveryID = '<?= session('deliveryID') ?>';
            $('#delivery-items-' + deliveryID).modal('show');
        <?php endif; ?>
    });
</script>


<?= $this->endSection(); ?>