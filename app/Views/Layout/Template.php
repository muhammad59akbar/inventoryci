<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/Me.css') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/ckeditor5/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    .ck-editor__editable {
        min-height: 200px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light  fixed-top" style="background-color: #929292;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-between w-100 align-items-center">

            <h4 class="mt-2 mx-3 "><a class="navbar-brand" href="<?= base_url('/') ?>">PT. PDOP</a></h4>
            <h6 class="p-2 mt-1 font-weight-light">Logged as : <span class="font-weight-bold"><?= user()->username; ?></span></h6>
        </div>

    </nav>

    <div class="sidebar" id="sidebar" style="z-index: 100;">
        <div class="p-3">

            <ul class="nav flex-column mt-5 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('/') ?>">Dashboard</a>
                </li>
                <?php if (in_groups(['Owner', 'Staff Admin'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/ListUser') ?>">List User</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/ListProduct') ?>">List Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/ListOrder') ?>">List Pesan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/ListPengiriman') ?>">List Pengiriman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>

    <?= $this->renderSection('content'); ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('.navbar-toggler').click(function() {
                $('#sidebar').toggleClass('active');
                $('#mainContent').toggleClass('active-content');
            });
        });
    </script>
</body>

</html>