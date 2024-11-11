<?php if ($pengirim['status'] === 'Delivery') : ?>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#delivery-items-<?= $pengirim['id_pengiriman'] ?>">
        <i class="bi bi-pencil-square"></i>
    </button>

<?php endif ?>


<!-- Modal -->
<div class="modal" id="delivery-items-<?= $pengirim['id_pengiriman'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delivery Products</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formproduk" action="<?= base_url('/ApproveDelivery') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_pengiriman" value="<?= $pengirim['id_pengiriman'] ?>">
                <div class="modal-body">

                    <div class="d-flex flex-column text-start">
                        <label for="noresi" class="form-label">No Resi</label>
                        <input type="text" class="form-control" id="noresi" aria-describedby="noresi" name="noresi" value="<?= $pengirim['no_resi'] ?>" disabled>
                    </div>
                    <div class="d-flex flex-column text-start">
                        <label for="alamatresi" class="form-label">Alamat Resi</label>
                        <input type="text" class="form-control" id="alamatresi" aria-describedby="alamatresi" name="alamatresi" value="<?= $pengirim['alamat_pemesanan'] ?>" disabled>
                    </div>
                    <div class="d-flex flex-column text-start">
                        <label for="nama_penerima" class="form-label">Nama Penerima</label>
                        <input type="text" class="form-control <?= session('errors.nama_penerima') ? 'is-invalid' : '' ?>" id="nama_penerima" aria-describedby="nama_penerima" name="nama_penerima">
                        <div class="invalid-feedback">
                            <?= session('errors.nama_penerima') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column text-start">
                        <div class="my-2">
                            <img class="img-thumbnail" src="<?= base_url('assets/images/addimage.png') ?>" alt="" width="250" height="250" id="PrevFotoPenerima">
                        </div>
                        <label for="fotopenerima" class="form-label">Foto Bukti Diterima</label>
                        <input type="file" class="form-control <?= session('errors.fotopenerima') ? 'is-invalid' : '' ?>" id="fotopenerima" aria-describedby="fotopenerima" name="fotopenerima" onchange="changeImage(this, 'PrevFotoPenerima')">
                        <div class="invalid-feedback">
                            <?= session('errors.fotopenerima') ?>
                        </div>
                    </div>
                </div>

                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>

    </div>
</div>