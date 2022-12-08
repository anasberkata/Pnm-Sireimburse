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
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="card-title text-white">Data Reimburse</h4>
                </div>
                <div class="card-body">
                    <p class="card-subtitle">
                        Jumlah Data Reimburse Terdata : <b>100</b> Data.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-success">
                    <h4 class="card-title text-white">Reimburse di Acc</h4>
                </div>
                <div class="card-body">
                    <p class="card-subtitle">
                        Jumlah Data Reimburse Diapprove : <b>80</b> Data.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="card-title text-white">Nominal Terbayar</h4>
                </div>
                <div class="card-body">
                    <p class="card-subtitle">
                        Jumlah Nominal Terbayar : <b>Rp. 80.000</b>.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-danger">
                    <h4 class="card-title text-white">Jumlah Karyawan</h4>
                </div>
                <div class="card-body">
                    <p class="card-subtitle">
                        Jumlah Karyawan Tedaftar : <b>66</b> Karyawan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>