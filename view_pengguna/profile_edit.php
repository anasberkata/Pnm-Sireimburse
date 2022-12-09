<?php
session_start();
include "../templates/header.php";
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
            <h1 class="mb-0 fw-bold">Profile</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="../view_pengguna/profile_edit.php" class="btn btn-primary text-white">Edit Profile</a>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Saya</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <center>
                                <img src="../assets/images/users/<?= $user["gambar"]; ?>" class="rounded-circle" width="150" />
                                <h4 class="card-title m-t-10"><?= $user["nama"]; ?></h4>
                                <h6 class="card-subtitle"><?php
                                                            if ($user["jabatan"] == 1) {
                                                                echo "Admin";
                                                            } else {
                                                                echo "Karyawan";
                                                            }
                                                            ?></h6>
                            </center>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mt-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Email</div>
                                            <div class="col-lg-8 col-8">: <?= $user["email"]; ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Username</div>
                                            <div class="col-lg-8 col-8">: <?= $user["username"]; ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Aktif Sejak</div>
                                            <div class="col-lg-8 col-8">: <?= $user["date_created"]; ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Status</div>
                                            <div class="col-lg-8 col-8">: <?php
                                                                            if ($user["is_active"] == 1) {
                                                                                echo "Aktif";
                                                                            } else {
                                                                                echo "Tidak Aktif";
                                                                            }
                                                                            ?></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
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