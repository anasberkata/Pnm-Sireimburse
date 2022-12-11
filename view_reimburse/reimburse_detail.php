<?php
session_start();
include "../templates/header.php";

$id_reimburse = $_GET["id_reimburse"];
$reimburse = query(
    "SELECT * FROM reimburse
    INNER JOIN users ON reimburse.id_karyawan = users.id_user
    INNER JOIN status ON reimburse.id_status = status.id_status
    WHERE id_reimburse = $id_reimburse
    "
)[0];
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
                    <h4 class="card-title">Detail Reimburse</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <center>
                                <img src="../assets/images/reimburse/<?= $reimburse["gambar_bukti"]; ?>" class="img-thumbnail" width="100%" />
                            </center>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mt-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Karyawan</div>
                                            <div class="col-lg-8 col-8">: <?= $reimburse["nama"]; ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Flat nomor kendaraan</div>
                                            <div class="col-lg-8 col-8">: <?= $reimburse["flat"]; ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Nominal (Rp.)</div>
                                            <div class="col-lg-8 col-8">: Rp. <?= number_format($reimburse["nominal"], 0, ',', '.'); ?>,-</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-4">Tanggal</div>
                                            <div class="col-lg-8 col-8">: <?= date('d F Y', strtotime($reimburse["tanggal"])); ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <?php if ($reimburse["id_status"] == 2) : ?>
                                                    <?php if ($user["role_id"] == 1) : ?>
                                                        <a href="reimburse_acc.php?id_reimburse=<?= $id_reimburse; ?>" class="btn btn-success text-white my-3" onclick="return confirm('Yakin untuk meng-approve reimburse ini?');">Approve</a>
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <p><i class="mdi mdi-check-circle text-success"> Sudah di Approve</i></p>
                                                <?php endif; ?>
                                            </div>
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