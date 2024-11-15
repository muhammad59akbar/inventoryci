<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>
<div class="main-content mt-5" id="mainContent">


    <div class="row mt-3">
        <?php if (in_groups('Owner')) : ?>
            <div class="col-md-3 mb-4">

                <div class="card shadow-sm text-center text-white" style="min-height: 200px; background:#d13f3f;">
                    <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <i class="bi bi-person-fill fs-1 "></i>
                        <div class="ms-3">
                            <h1 class="card-title mb-1 fs-5">Total Users</h1>
                            <p class="mb-0 fs-5"><?= $totalUser ?> Orang</p>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-3 mb-4">

                <div class="card shadow-sm text-center text-white" style="min-height: 200px; background:#d13f3f;">
                    <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <i class="bi bi-currency-dollar fs-1"></i>
                        <div class="ms-3">
                            <h1 class="card-title mb-1 fs-5">Total Penjualan</h1>
                            <p class="mb-0 fs-5">Rp. <?= number_format($totalKeuntungan->total_harga, 0, ',', '.') ?></p>
                        </div>

                    </div>
                </div>

            </div>
        <?php endif; ?>
        <?php if (in_groups(['Owner', 'Staff Admin', 'Sales'])) : ?>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center text-white" style="min-height: 200px; background:#e8971c;">
                    <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <i class="bi bi-box2-fill fs-1"></i>
                        <div class="ms-3">
                            <h1 class="card-title mb-1 fs-5">Total Produk</h1>
                            <p class="mb-0 fs-5"><?= $totalProduk ?> Produk</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center text-white" style="min-height: 200px; background:#e8971c;">
                    <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <i class="bi bi-cart-fill fs-1"></i>
                        <div class="ms-3">
                            <h1 class="card-title mb-1 fs-5">Total Pesanan</h1>
                            <p class="mb-0 fs-5"><?= $totalPesanan ?> Pesanan</p>
                        </div>

                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm text-center text-white" style="min-height: 200px; background: #2762e1;">
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <i class="bi bi-bar-chart-line-fill fs-1"></i>

                    <div class="ms-3">
                        <h1 class="card-title mb-1 fs-5">Total Pengiriman</h1>

                        <p class="mb-0 fs-5"><?= $totalPengiriman ?> Pengiriman</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm text-center text-white" style="min-height: 200px; background: #44ec12;">
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <i class="bi bi-clipboard-check-fill fs-1"></i>

                    <div class="ms-3">
                        <h1 class="card-title mb-1 fs-5">Pengiriman Selesai</h1>

                        <p class="mb-0 fs-5"><?= $totalSelesai ?> Selesai</p>
                    </div>

                </div>
            </div>
        </div>



    </div>


</div>

<?= $this->endSection(); ?>