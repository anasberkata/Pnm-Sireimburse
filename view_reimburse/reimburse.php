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
            <h1 class="mb-0 fw-bold">Reimburse</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="../view_reimburse/reimburse_add.php" class="btn btn-primary text-white" target="_blank">Tambah Data</a>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Reimburse</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Flat Nomor Kendaraan</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Foto Bukti</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>
                                        <a href="../view_reimburse/reimburse_edit.php" class="btn btn-info text-white"><i class="mdi mdi-pencil"></i></a>
                                        <a href="../view_reimburse/reimburse_edit.php" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i></a>

                                        | <a href="../view_reimburse/reimburse_edit.php" class="btn btn-success text-white"><i class="mdi mdi-check"></i></a>
                                    </td>
                                </tr>
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