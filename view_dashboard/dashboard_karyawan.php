<?php
session_start();
include "../templates/header.php";

$id_user = $user["id_user"];
$reimburse = query("SELECT * FROM reimburse WHERE id_karyawan = $id_user");
$reimburse_not_acc = query("SELECT * FROM reimburse WHERE id_karyawan = $id_user AND id_status = 2");
$nominal = query("SELECT SUM(nominal) AS total_nominal FROM reimburse WHERE id_karyawan = $id_user AND id_status = 1")[0];

$total_reimburse = count($reimburse);
$total_reimburse_not_acc = count($reimburse_not_acc);
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
            <h1 class="mb-0 fw-bold">Dashboard</h1>
        </div>
        <!-- <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/" class="btn btn-primary text-white" target="_blank">Upgrade to Pro</a>
            </div>
        </div> -->
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="card-title text-white">Data Reimburse Anda</h4>
                </div>
                <div class="card-body">
                    <p class="card-subtitle">
                        Jumlah Data Reimburse Anda : <b><?= $total_reimburse; ?></b> Data.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-success">
                    <h4 class="card-title text-white">Reimburse Belum Acc</h4>
                </div>
                <div class="card-body">
                    <p class="card-subtitle">
                        Jumlah Data Reimburse Diapprove : <b><?= $total_reimburse_not_acc; ?></b> Data.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="card-title text-white">Nominal Terbayar</h4>
                </div>
                <div class="card-body">
                    <p class="card-subtitle">
                        Jumlah Nominal Terbayar : <b>Rp. <?= number_format($nominal["total_nominal"], 0, ',', '.'); ?>,-</b>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>