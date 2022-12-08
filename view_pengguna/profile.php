<?php
session_start();

// if (!isset($_SESSION['login'])) {
//     header("Location: ../index.php");
//     exit;
// }

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
                <a href="../view_pengguna/pengguna_add.php" class="btn btn-primary text-white" target="_blank">Edit Profile</a>
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
                                <img src="../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                                <h4 class="card-title m-t-10">Nama Lengkap</h4>
                                <h6 class="card-subtitle">Jabatan</h6>
                            </center>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mt-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Email</div>
                                            <div class="col-lg-8 col-8">:</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Username</div>
                                            <div class="col-lg-8 col-8">:</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Aktif Sejak</div>
                                            <div class="col-lg-8 col-8">:</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Status</div>
                                            <div class="col-lg-8 col-8">:</div>
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