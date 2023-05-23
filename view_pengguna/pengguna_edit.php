<?php
session_start();
include "../templates/header.php";

$id = $_GET["id"];
$pengguna = query(
    "SELECT * FROM users
    INNER JOIN jabatan ON users.jabatan = jabatan.id_jabatan
    INNER JOIN user_role ON users.role_id = user_role.id_role
    WHERE id_user = $id"
)[0];
$jabatan = query("SELECT * FROM jabatan");

if (isset($_POST["edit_pengguna"])) {
    if (pengguna_edit($_POST) > 0) {
        echo "<script>
            alert('Data Berhasil Diubah!');
            document.location.href = 'pengguna.php';
          </script>";
    } else {
        echo "<script>
            alert('Data Gagal Diubah!');
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
                    <h4 class="card-title">Edit Pengguna (Karyawan)</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <center>
                                <img src="../assets/images/users/<?= $pengguna["gambar"]; ?>" class="rounded-circle"
                                    width="150" />
                                <h4 class="card-title m-t-10">
                                    <?= $pengguna["nama"]; ?>
                                </h4>
                                <h6 class="card-subtitle">
                                    <?= $pengguna["nama_jabatan"]; ?>
                                </h6>
                            </center>
                        </div>
                        <div class="col-lg-8">
                            <form class="form-horizontal form-material mx-2" action="" method="POST"
                                enctype="multipart/form-data">

                                <input type="hidden" value="<?= $pengguna["id_user"] ?>" name="id">
                                <input type="hidden" value="<?= $pengguna["gambar"]; ?>" name="gambar_lama">

                                <div class="form-group">
                                    <label class="col-md-12">Foto</label>
                                    <div class="col-md-12">
                                        <input type="file" value="<?= $pengguna["gambar"] ?>"
                                            class="form-control form-control-line" name="gambar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Nama Lengkap</label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?= $pengguna["nama"] ?>"
                                            class="form-control form-control-line" name="nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Jabatan</label>
                                    <div class="col-sm-12">
                                        <select class="form-select shadow-none form-control-line" name="jabatan">
                                            <option value="<?= $pengguna["id_jabatan"] ?>"><?= $pengguna["nama_jabatan"] ?></option>
                                            <?php foreach ($jabatan as $j): ?>
                                                <option value="<?= $j["id_jabatan"] ?>"><?= $j["nama_jabatan"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" value="<?= $pengguna["email"] ?>"
                                            class="form-control form-control-line" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?= $pengguna["username"] ?>"
                                            class="form-control form-control-line" name="username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password <span class="text-danger small">(Abaikan jika
                                            tidak ingin diubah)</span></label>
                                    <div class="col-md-12">
                                        <input type="password" value="<?= $pengguna["password"] ?>"
                                            class="form-control form-control-line" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Whatsapps</label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?= $pengguna["phone"] ?>"
                                            class="form-control form-control-line" name="phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success text-white" name="edit_pengguna">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>