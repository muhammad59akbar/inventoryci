<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>
<div class="main-content mt-5" id="mainContent">
    <h2 class="mt-2">List Product</h2>
    <hr>
    <?= $this->include('AddProduct'); ?>
    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start ">
        <div class="card m-2" style="width: 18rem;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhh7W3SdWTKhe1dpHaMCi7C_4J1dUajSspLevOjJBdlDuQHvI2CR0peusIp-hSmvb3958nODcxf9K9engP-2EIvtSk4BqMi1ovTjYxyQN2qZZeQ10uRI9ymeSH5hefKmnncoLwdcCVX0Q/s1600/Minyak+kelapa.jpg" class="card-img-top p-1" alt="..." style="height: 250px;">
            <div class="card-body">
                <h5 class="card-title" style="height: 50px;">Card title</h5>
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
                        <p class="card-text">: 80</p>
                    </div>
                </div>
                <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                <a href="#" class="btn btn-danger"><i class="bi bi-archive-fill"></i></i></a>
            </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh08zVtzsr125fJFiJ_hMdX8QoXZoPYe11gBooPHnTOQJCRCbizAmQK0oUmkLPe-_hC55HOmrPDsYc4oN30-R1QnTmB7hfow-2FH35m6n9SL6WIm6sykCbK2oMgkiKBzsckxh7G8Cx8Bg/s1600/irisan+sarang+semut+putih.jpg" class="card-img-top p-1" style="height: 250px;" alt="...">
            <div class="card-body">
                <h5 class="card-title" style="height: 50px;">Lorem ipsum dolor sit amet consectetur</h5>
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
                        <p class="card-text">: 80</p>
                    </div>
                </div>
                <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                <a href="#" class="btn btn-danger"><i class="bi bi-archive-fill"></i></i></a>
            </div>
        </div>



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