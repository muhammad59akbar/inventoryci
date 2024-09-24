<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
    <i class="bi bi-file-earmark-plus-fill"></i> New Product
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name">

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
                        <textarea name="desc_prdk" id="desc_prdk" style="display: none;"></textarea>

                    </div>
                    <div class="mb-3">
                        <label for="jmlh_produk" class="form-label">Jumlah Produk</label>
                        <input type="number" class="form-control" id="jmlh_produk" name="jmlh_produk" placeholder="0" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Produk</label>
                        <input type="text" class="form-control" id="harga" placeholder="Masukkan harga" onfocus="changeInputRP()">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>