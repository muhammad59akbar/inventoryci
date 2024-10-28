<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>

<div class="main-content mt-5" id="mainContent">
    <h1>Edit Produk</h1>
    <hr>
    <a href="<?= base_url('/ListProduct/') ?>" class="m-2">&laquo; Kembali</a>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success m-2" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>
    <form id="formproduk" action="<?= base_url('/EditProduct/' . $product['id_produk']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="container mt-3">
            <div class="d-flex flex-column">
                <input type="hidden" name="id_produk" value="<?= $product['id_produk'] ?>">
                <input type="hidden" name="imageproduklama" value="<?= $product['img_prdk'] ?>">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control <?= session('errors.namaproduct') ? 'is-invalid' : '' ?>" id="name" aria-describedby="name" name="namaproduct" required value="<?= $product['nama_produk'] ?>">
                <div class="invalid-feedback">
                    <?= session('errors.namaproduct') ?>
                </div>

            </div>
            <div class="my-2">
                <img class="img-thumbnail" src="<?= base_url('assets/images/product/') . $product['img_prdk'] ?>" alt="" width="250" height="250" id="prevImage">

            </div>
            <div class="mb-2 ">
                <label for="imageprdk" class="form-label">Gambar Produk</label>
                <input class="form-control" type="file" id="imageprdk" name="imageprdk" onchange="changeImage(this, 'prevImage')">
            </div>

            <div class="mb-3 mt-4">
                <label for="desc_prdk">Deskripsi Produk</label>
                <textarea name="desc_prdk" class=" <?= session('errors.desc_prdk') ? 'is-invalid' : '' ?>" id="desc_prdk" style="display: none;"><?= $product['deskrip_produk'] ?></textarea>
                <div class="invalid-feedback">
                    <?= session('errors.desc_prdk') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="jmlh_produk" class="form-label">Jumlah Produk</label>
                <input type="number" class="form-control <?= session('errors.jmlh_produk') ? 'is-invalid' : '' ?>" id="jmlh_produk" name="jmlh_produk" placeholder="0" min="0" value="<?= $product['stock_prdk'] ?>">
                <div class="invalid-feedback">
                    <?= session('errors.jmlh_produk') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Produk</label>
                <input type="text" class="form-control <?= session('errors.hargaproduk') ? 'is-invalid' : '' ?>" id="harga" name="hargaproduk" placeholder="Masukkan harga" onfocus="changeInputRP()" value="<?= number_format($product['hrg_prdk'], 0, ',', '.') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.hargaproduk') ?>
                </div>
            </div>



            <a href="<?= base_url('/ListProduct') ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>


    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof ClassicEditor !== 'undefined') {
            ClassicEditor
                .create(document.querySelector('#desc_prdk'))
                .catch(error => {
                    console.error(error);
                });
        } else {
            console.error("ClassicEditor is not defined");
        }
    });
</script>
<?= $this->endSection(); ?>