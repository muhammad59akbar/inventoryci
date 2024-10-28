<?php if ($order['status'] === 'Pending') : ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#approve-items-<?= $order['id_approve'] ?>">
        <i class="bi bi-pencil-square"></i>
    </button>
<?php endif ?>

<!-- Modal -->
<div class="modal" id="approve-items-<?= $order['id_approve'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approve Products</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formproduk" action="<?= base_url('/ApproveOrder') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_approve" value="<?= $order['id_approve'] ?>">
                <div class="modal-body">
                    <div class="d-flex flex-column text-start">
                        <label for="nameproduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nameproduk" aria-describedby="nameproduk" name="namaproduct" value="<?= $order['nama_produk'] ?>" disabled>
                    </div>
                    <div class="d-flex flex-column text-start">
                        <label for="nama_psn" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control <?= session('errors.nama_psn') ? 'is-invalid' : '' ?>" id="nama_psn" aria-describedby="nama_psn" name="nama_psn" placeholder="Perusahaan/Perorangan" value="<?= $order['nama_pemesan'] ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.nama_psn') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column text-start">
                        <label for="alamat_psn" class="form-label ">Alamat Pemesan</label>
                        <input type="text" class="form-control <?= session('errors.alamat_psn') ? 'is-invalid' : '' ?>" id="alamat_psn" aria-describedby="alamat_psn" name="alamat_psn" placeholder="Alamat Perusahaan/Perorangan" value="<?= $order['alamat_pemesanan'] ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.alamat_psn') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column text-start">
                        <label for="jmlh_pesan" class="form-label">Jumlah Produk</label>
                        <input type="number" class="form-control" id="jmlh_pesan" aria-describedby="jmlh_pesan" name="jmlh_pesan" min="0" placeholder="0" value="<?= $order['jumlah_pesanan'] ?>" disabled>

                    </div>
                    <div class="d-flex flex-column text-start">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="text" class="form-control" id="total_harga" aria-describedby="total_harga" name="total_harga" placeholder="0" value="<?= number_format($order['total_harga'], 0, ',', '.') ?>" disabled>

                    </div>
                    <div class="d-flex flex-column text-start">
                        <label class="form-label">Nama Pengirim</label>
                        <?php

                        $randomKurir = array_rand($namaKurir);
                        ?>

                        <select class="form-select <?= session('errors.nama_kurir') ? 'is-invalid' : '' ?>" aria-label="Default select example" name="nama_kurir">
                            <?php foreach ($namaKurir as $index => $kurir): ?>
                                <option value="<?= $kurir['id']; ?>" <?= $index == $randomKurir ? 'selected' : ''; ?>>
                                    <?= $kurir['fullname']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <div class="invalid-feedback">
                            <?= session('errors.nama_kurir') ?>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Setujui</button>
                </div>
            </form>

        </div>
    </div>
</div>