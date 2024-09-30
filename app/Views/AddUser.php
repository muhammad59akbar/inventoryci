<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
    <i class="bi bi-person-add"></i> New Users
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name">

                    </div>
                    <div class="d-flex flex-column">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name">

                    </div>
                    <div class="d-flex flex-column">
                        <label for="name" class="form-label">Password</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name">

                    </div>
                    <div class="d-flex flex-column">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name">

                    </div>
                    <div class="my-2">
                        <img class="img-thumbnail" src="<?= base_url('assets/images/addimage.png') ?>" alt="" width="250" height="250" id="prevImage">

                    </div>
                    <div class="mb-2 ">
                        <label for="imageprdk" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="imageprdk" name="imageprdk" onclick="changeImage()">
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Jabatan</label>
                        <select class="form-select" aria-label="Default select example" name="jabatan">
                            <option value="1">Direktur</option>
                            <option value="2">Admin</option>
                            <option value="3">Mandor</option>
                            <option value="4" selected>Teknisi</option>
                        </select>

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