<?php
session_start();
include "../templates/header.php";

$jabatan = query("SELECT * FROM jabatan");
$roles = query("SELECT * FROM user_role");

if (isset($_POST["add_pengguna"])) {
    if (pengguna_add($_POST) > 0) {
        echo "<script>
            alert('Pengguna berhasil ditambah!');
            document.location.href = 'pengguna.php';
          </script>";
    } else {
        echo "<script>
            alert('Pengguna gagal ditambah!');
            document.location.href = 'pengguna.php';
          </script>";
    }
}
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
            <h1 class="mb-0 fw-bold">Pengguna</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="pengguna.php" class="btn btn-primary text-white">Kembali</a>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Pengguna (Karyawan)</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-md-12">Nama Lengkap</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Jabatan</label>
                                    <div class="col-sm-12">
                                        <select class="form-select shadow-none form-control-line" name="jabatan">
                                            <?php foreach ($jabatan as $j) : ?>
                                                <option value="<?= $j["id_jabatan"] ?>"><?= $j["nama_jabatan"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Whatsapps</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-md-12">Foto</label>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control form-control-line" name="gambar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control form-control-line" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control form-control-line" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Role</label>
                                    <div class="col-sm-12">
                                        <select class="form-select shadow-none form-control-line" name="role">
                                            <?php foreach ($roles as $r) : ?>
                                                <option value="<?= $r["id_role"] ?>"><?= $r["nama_role"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success text-white" name="add_pengguna">Tambah</button>
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