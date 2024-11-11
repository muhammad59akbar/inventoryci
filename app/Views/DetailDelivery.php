<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>

<div class="main-content mt-5" id="mainContent">
    <h2 class="mt-3">Detail Pengiriman</h2>

    <a href="<?= base_url('/ListPengiriman/') ?>" class="m-2">&laquo; Kembali</a>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h5>No Resi Pengiriman</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $detailpengirim['no_resi'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h5>Nama Pemesan</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $detailpengirim['nama_pemesan'] ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <h5>Alamat Pemesanan</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $detailpengirim['alamat_pemesanan'] ?></p>
            </div>
        </div>
        <?php if (in_groups(['Owner', 'Staff Admin', 'Sales'])) : ?>
            <div class="row">
                <div class="col-lg-4">
                    <h5>Nama Produk</h5>
                </div>
                <div class="col-lg-5">
                    <p>: <?= $detailpengirim['nama_produk'] ?></p>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4">
                    <h5>Jumlah Pesanan</h5>
                </div>
                <div class="col-lg-5">
                    <p>: <?= $detailpengirim['jumlah_pesanan'] ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_groups(['Owner', 'Staff Admin'])) : ?>
            <div class="row">
                <div class="col-lg-4">
                    <h5>Total Harga</h5>
                </div>
                <div class="col-lg-5">
                    <p>: <?= number_format($detailpengirim['total_harga'], 0, ',', '.') ?></p>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-4">
                <h5>Status</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $detailpengirim['status'] ?></p>
            </div>
        </div>
        <?php if (in_groups(['Owner', 'Staff Admin', 'Sales'])) : ?>
            <div class="row">
                <div class="col-lg-4">
                    <h5>Di Order Oleh</h5>
                </div>
                <div class="col-lg-5">
                    <p>: <?= $detailpengirim['orderby'] ?></p>
                </div>
            </div>
        <?php endif; ?>
        <?php if (in_groups(['Owner', 'Staff Admin'])) : ?>
            <div class="row">
                <div class="col-lg-4">
                    <h5>Di Setujui Oleh</h5>
                </div>
                <div class="col-lg-5">
                    <p>: <?= $detailpengirim['approveby'] ?></p>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-4">
                <h5>Di Kirim Oleh</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $detailpengirim['nama_kurir'] ?></p>
            </div>
        </div>

        <hr>



    </div>


</div>

<?= $this->endSection(); ?>