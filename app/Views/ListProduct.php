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
        <?php foreach ($listprdk as $prdk) :  ?>
            <div class="card m-2" style="width: 18rem;">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhh7W3SdWTKhe1dpHaMCi7C_4J1dUajSspLevOjJBdlDuQHvI2CR0peusIp-hSmvb3958nODcxf9K9engP-2EIvtSk4BqMi1ovTjYxyQN2qZZeQ10uRI9ymeSH5hefKmnncoLwdcCVX0Q/s1600/Minyak+kelapa.jpg" class="card-img-top p-1" alt="..." style="height: 250px;">
                <div class="card-body">
                    <h5 class="card-title" style="height: 50px;"><?= $prdk['nama_produk'] ?></h5>
                    <div class="row mb-3">
                        <div class="col-4">
                            <p class="card-text">Harga</p>
                        </div>
                        <div class="col-8">
                            <p class="card-text">: Rp. 8.000/Pcs</p>
                        </div>

                        <div class="col-4">
                            <p class="card-text">Stock</p>
                        </div>
                        <div class="col-8">
                            <p class="card-text">: <?= $prdk['stock_prdk'] ?></p>
                        </div>
                    </div>
                    <a href="<?= base_url('/detailProduct/' . url_title($prdk['nama_produk'], '-', true)); ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                    <a href="#" class="btn btn-danger"><i class="bi bi-archive-fill"></i></i></a>



                </div>
            </div>
        <?php endforeach; ?>



    </div>
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