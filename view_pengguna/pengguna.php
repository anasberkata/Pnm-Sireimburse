<?php
session_start();

include "../templates/header.php";

if ($user["role_id"] == 2) {
    // header("Location: ../view_dashboard/dashboard_karyawan.php");
    // exit;
    echo "
        <div class='container-fluid'>
            <div class='row justify-content-center error-box'>
                <div class='col-6 error-body text-center'>
                    <h1 class='error-title text-danger'>404</h1>
                    <h3 class='text-uppercase error-subtitle'>MAAF !</h3>
                    <p class='text-muted m-t-30 m-b-30'>Anda dilarang mengakses halaman ini!</p>
                    <a href='../view_dashboard/dashboard_karyawan.php' class='btn btn-danger btn-rounded waves-effect waves-light m-b-40 text-white'>Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    ";
    die;
}

$users = query(
    "SELECT * FROM users
    INNER JOIN jabatan ON users.jabatan = jabatan.id_jabatan
    INNER JOIN user_role ON users.role_id = user_role.id_role
    WHERE NOT id_user = 1"
);
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
                <a href="pengguna_add.php" class="btn btn-primary text-white">Tambah Pengguna</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pengguna</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table1">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">No. Whatsapp</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $u): ?>
                                    <tr>
                                        <th class="align-middle" scope="row">
                                            <?= $i; ?>
                                        </th>
                                        <td class="align-middle">
                                            <img src="../assets/images/users/<?= $u["gambar"] ?>" alt="profile_pic"
                                                class="img-thumbnail">
                                        </td>
                                        <td class="align-middle">
                                            <?= $u["nama"] ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $u["nama_jabatan"] ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $u["email"] ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $u["username"] ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="https://wa.me/62<?= $u["phone"]; ?>" target="blank">+62<?= $u["phone"]; ?></a>
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <a href="pengguna_edit.php?id=<?= $u["id_user"] ?>"
                                                    class="btn btn-info text-white mt-1"><i class="mdi mdi-pencil"></i></a>
                                                <a href="pengguna_delete.php?id=<?= $u["id_user"] ?>"
                                                    class="btn btn-danger text-white mt-1"
                                                    onclick="return confirm('Yakin ingin menghapus <?= $u['nama']; ?>?');"><i
                                                        class="mdi mdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>