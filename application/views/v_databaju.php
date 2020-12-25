<html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Sewa Baju Adat</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>assets/starter-template.css" rel="stylesheet">
</head>

<body>

    <main class="container">
        <div class="content-wrapper">
        <section class="content-header">
           <center> <h2>DATA BAJU ADAT DAERAH INDONESIA</h2> </center>
        </section>
        </div>
        <section class="content">
        <a class = "btn btn-outline-primary" href="<?= base_url();?>Beranda">Beranda</a>
        <a class = "btn btn-outline-primary" href="<?= base_url();?>Bajuadat/tambah">Tambah Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID BAJU</th>
                    <th>NAMA BAJU</th>
                    <th>DAERAH</th>
                    <th>STOK BAJU</th>
                    <th>HARGA SEWA</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    foreach ($bajuadat as $bju) :
                    ?>
                <tr>
                    <td><?= $bju['id']; ?></td>
                    <td><?= $bju['nama']; ?></td>
                    <td><?= $bju['daerah']; ?></td>
                    <td><?= $bju['stok']; ?></td>
                    <td><?= $bju['harga']; ?></td>
                    <td>
                    
                    <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>Bajuadat/ubah/<?php echo $bju['id']?>">Ubah</a>
                    <a class="btn btn-danger btn-sm" href="<?= base_url(); ?>Bajuadat/hapus/<?php echo $bju['id']?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                    </td>
                </tr>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </section>
    </main>
    <script src="<?= base_url(); ?>assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
