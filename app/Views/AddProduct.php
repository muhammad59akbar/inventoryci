<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#productModal">
    <i class="bi bi-file-earmark-plus-fill"></i> New Product
</button>


<!-- Modal -->
<div class="modal" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/AddProduct') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control <?= session('errors.namaproduct') ? 'is-invalid' : '' ?>" id="name" aria-describedby="name" name="namaproduct" required value="<?= old('namaproduct') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.namaproduct') ?>
                        </div>

                    </div>
                    <div class="my-2">
                        <img class="img-thumbnail" src="<?= base_url('assets/images/addimage.png') ?>" alt="" width="250" height="250" id="prevImage">

                    </div>
                    <div class="mb-2 ">
                        <label for="imageprdk" class="form-label">Gambar Produk</label>
                        <input class="form-control" type="file" id="imageprdk" name="imageprdk" onclick="changeImage()">
                    </div>

                    <div class="mb-3 mt-4">
                        <label for="desc_prdk">Deskripsi Produk</label>
                        <textarea name="desc_prdk" class=" <?= session('errors.desc_prdk') ? 'is-invalid' : '' ?>" id="desc_prdk" style="display: none;"><?= old('jmlh_produk') ?></textarea>
                        <div class="invalid-feedback">
                            <?= session('errors.desc_prdk') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jmlh_produk" class="form-label">Jumlah Produk</label>
                        <input type="number" class="form-control <?= session('errors.jmlh_produk') ? 'is-invalid' : '' ?>" id="jmlh_produk" name="jmlh_produk" placeholder="0" min="0" value="<?= old('jmlh_produk') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.jmlh_produk') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Produk</label>
                        <input type="text" class="form-control <?= session('errors.hargaproduk') ? 'is-invalid' : '' ?>" id="harga" name="hargaproduk" placeholder="Masukkan harga" onfocus="changeInputRP()" value="<?= old('hargaproduk') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.hargaproduk') ?>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>