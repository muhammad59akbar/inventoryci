<?php if ($prdk['stock_prdk'] != 0) : ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#orderModal-<?= $prdk['id_produk'] ?>">
        <i class="bi bi-cart-plus"></i>
    </button>
<?php endif ?>

<!-- Modal -->
<div class="modal" id="orderModal-<?= $prdk['id_produk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Products</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formproduk" action="<?= base_url('/OrderProduk') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_produk" value="<?= $prdk['id_produk'] ?>">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="nameproduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nameproduk" aria-describedby="nameproduk" name="namaproduct" value="<?= $prdk['nama_produk'] ?>" disabled>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="nama_psn" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control <?= session('errors.nama_psn') ? 'is-invalid' : '' ?>" id="nama_psn" aria-describedby="nama_psn" name="nama_psn" placeholder="Perusahaan/Perorangan">
                        <div class="invalid-feedback">
                            <?= session('errors.nama_psn') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="alamat_psn" class="form-label ">Alamat Pemesan</label>
                        <input type="text" class="form-control <?= session('errors.alamat_psn') ? 'is-invalid' : '' ?>" id="alamat_psn" aria-describedby="alamat_psn" name="alamat_psn" placeholder="Alamat Perusahaan/Perorangan">
                        <div class="invalid-feedback">
                            <?= session('errors.alamat_psn') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="jmlh_pesan" class="form-label">Jumlah Produk</label>
                        <input type="number" class="form-control <?= session('errors.jmlh_pesan') ? 'is-invalid' : '' ?>" id="jmlh_pesan" aria-describedby="jmlh_pesan" name="jmlh_pesan" min="0" placeholder="0">
                        <div class="invalid-feedback">
                            <?= session('errors.jmlh_pesan') ?>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Order</button>
                </div>
            </form>

        </div>
    </div>
</div>