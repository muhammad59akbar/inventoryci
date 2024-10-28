<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>
<div class="main-content mt-5" id="mainContent">
    <h2 class="mt-2">List Product</h2>
    <hr>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success mt-2" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <?= $this->include('AddProduct'); ?>
    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start ">
        <?php if (!empty($listprdk)) : ?>
            <?php foreach ($listprdk as  $prdk) :  ?>

                <div class="card m-2" style="width: 18rem;">
                    <img src="<?= base_url('assets/images/product/') . $prdk['img_prdk'] ?>" class="card-img-top p-1" alt="..." style="height: 250px;">
                    <div class="card-body">
                        <h5 class="card-title" style="height: 50px;"><?= $prdk['nama_produk'] ?></h5>
                        <div class="row mb-3">
                            <div class="col-4">
                                <p class="card-text">Harga</p>
                            </div>
                            <div class="col-8">
                                <p class="card-text">: Rp. <?= number_format($prdk['hrg_prdk'], 0, ',', '.') ?>/Pcs</p>
                            </div>

                            <div class="col-4">
                                <p class="card-text">Stock</p>
                            </div>
                            <div class="col-8">
                                <?php if ($prdk['stock_prdk'] === 0) : ?>
                                    <p class="card-text">: Stock Tak Tersedia</p>
                                <?php else : ?>
                                    <p class="card-text">: <?= number_format($prdk['stock_prdk'], 0, ',', '.') ?></p>
                                <?php endif ?>
                            </div>
                        </div>

                        <?= view('AddChart', ['prdk' => $prdk]) ?>



                        <?php if (in_groups(['Owner', 'Staff Admin'])) : ?>
                            <a href="<?= base_url('/detailProduct/' . url_title($prdk['nama_produk'], '-', true)); ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>




                            <form class="d-inline" method="post" action="<?= base_url('/DeleteProduk/' . $prdk['id_produk']) ?>">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus produk ini ???')"><i class="bi bi-archive-fill"></i></i></button>
                            </form>
                        <?php endif; ?>






                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="mt-1">Data Produk Tidak Tersedia !!!</p>
        <?php endif ?>



    </div>
</div>



<script>
    // $(document).ready(function() {
    //     <?php if (session('errors')) : ?>
    //         $('#productModal').modal('show');





    //     <?php endif; ?>
    // });

    $(document).ready(function() {
        <?php if (session('errors')) : ?>
            <?php if (session('modal') == 'product') : ?>
                $('#productModal').modal('show');
            <?php elseif (session('modal') == 'order') : ?>
                var productId = '<?= session('product_id') ?>'; // Ambil ID produk dari session
                $('#orderModal-' + productId).modal('show');
            <?php endif; ?>
        <?php endif; ?>
    });

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