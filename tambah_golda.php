<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="index.php">DONOR DARAH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="golda.php">Data Golongan Darah</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="post" action="index.php">
                    <input class="form-control mr-sm-2" name="kata_kunci" type="search" placeholder="Cari nama pendonor" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> Cari</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <h4 class="mt-3 mb-3"><?= strtoupper($_GET['aksi']) ?></h4>
        <?php

        include 'koneksi.php';
        $data_golda = mysqli_query($koneksi, "SELECT * FROM tb_golda");

        $kd_golda = "";
        $nm_golda = "";
        $rhesus = "";
        $jml_unit = "";

        if ($_GET['aksi'] == 'edit') {

            $data_edit = mysqli_query($koneksi, "SELECT * FROM tb_golda WHERE  kd_golda = '" . $_GET['kode'] . "'");
            while ($e = mysqli_fetch_array($data_edit)) {
                $kd_golda = $e['kd_golda'];
                $kd_golda   = $e['kd_golda'];
                $nm_golda = $e['nm_golda'];
                $rhesus      = $e['rhesus'];
                $jml_unit     = $e['jml_unit'];
            }
        }

        ?>
        <form method="post" action="proses_golda.php?aksi=<?= $_GET['aksi'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label>Kode Golongan Darah</label>
                        <input type="text" name="kd_golda" value="<?= $kd_golda ?>" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label>Nama Golongan Darah</label>
                        <input type="text" name="nm_golda" value="<?= $nm_golda ?>" class="form-control">
                    </div>

                    <div class="form-group" class="mb-4">
                <label>Rhesus</label>
                <select name="rhesus" class="form-control" required>
                    <option value="">-Pilih-</option>
                    <option value="Positif (+)">Positif (+)</option>
                    <option value="Negatif (-)">Negatif (-)</option>
                </select>
            </div>



                    <div class="mb-4">
                        <label>Jumlah Unit</label>
                        <input type="text" name="jml_unit" value="<?= $jml_unit ?>" class="form-control">
                    </div>
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-save"></i>
                        Simpan
                    </button>
                    <a href="golda.php" class="btn btn-light pull-rigth ml-5">
                        <i class="fa fa-save"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>