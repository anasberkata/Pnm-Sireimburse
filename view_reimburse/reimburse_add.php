<?php
session_start();
include "../templates/header.php";

if (isset($_POST["add_reimburse"])) {
    if (reimburse_add($_POST) > 0) {
        echo "<script>
            alert('Reimburse berhasil ditambah!');
            document.location.href = 'reimburse.php';
          </script>";
    } else {
        echo "<script>
            alert('Reimburse gagal ditambah!');
            document.location.href = 'reimburse.php';
          </script>";
    }
}

$karyawan = query("SELECT * FROM users WHERE NOT id_user = 1");
?>

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav> -->
            <h1 class="mb-0 fw-bold">Reimburse</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="reimburse.php" class="btn btn-primary text-white">Kembali</a>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Reimburse</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-12">Nama Karyawan</label>
                                    <div class="col-sm-12">
                                        <select class="form-select shadow-none form-control-line" name="nama">
                                            <?php foreach ($karyawan as $k) : ?>
                                                <option value="<?= $k["id_user"] ?>"><?= $k["nama"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Flat Nomor Kendaraan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control form-control-line" name="flat">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-md-12">Nominal (Rp. )</label>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control form-control-line" name="nominal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Foto</label>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control form-control-line" name="gambar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Tanggal</label>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control form-control-line" name="tanggal">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success text-white" name="add_reimburse">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>