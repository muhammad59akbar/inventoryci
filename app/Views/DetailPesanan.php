<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>

<div class="main-content mt-5" id="mainContent">
    <h2 class="mt-3">Detail Pesanan</h2>

    <a href="<?= base_url('/ListOrder/') ?>" class="m-2">&laquo; Kembali</a>

    <hr>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h5>Nama Produk</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $DetailItem['nama_produk'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h5>Nama Pemesan</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $DetailItem['nama_pemesan'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h5>Alamat Pemesanan</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $DetailItem['alamat_pemesanan'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h5>Jumlah Pesanan</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $DetailItem['jumlah_pesanan'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h5>Total Harga</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= number_format($DetailItem['total_harga'], 0, ',', '.') ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h5>Status</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $DetailItem['status'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h5>Di Order Oleh</h5>
            </div>
            <div class="col-lg-5">
                <p>: <?= $DetailItem['nama_pengorder'] ?></p>
            </div>
        </div>
        <?php if ($DetailItem['status'] === 'Approved'): ?>
            <div class="row">
                <div class="col-lg-4">
                    <h5>Disetujui Oleh</h5>
                </div>
                <div class="col-lg-5">
                    <p>: <?= $DetailItem['nama_approve'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <h5>Dikirim Oleh</h5>
                </div>
                <div class="col-lg-5">
                    <p>: <?= $DetailItem['nama_kurir'] ?></p>
                </div>
            </div>
        <?php endif; ?>

    </div>


</div>

<?= $this->endSection(); ?>