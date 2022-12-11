<?php
session_start();
include "../templates/header.php";

if (!isset($_POST["cari"])) {
    if ($user["role_id"] == 1) {
        $reimburse = query(
            "SELECT * FROM reimburse
            INNER JOIN users ON reimburse.id_karyawan = users.id_user
            INNER JOIN status ON reimburse.id_status = status.id_status
    "
        );
    } else {
        $id_user = $user["id_user"];
        $reimburse = query(
            "SELECT * FROM reimburse
            INNER JOIN users ON reimburse.id_karyawan = users.id_user
            INNER JOIN status ON reimburse.id_status = status.id_status
            WHERE id_user = $id_user
    "
        );
    }
} else {
    if ($user["role_id"] == 1) {
        $tanggal = $_POST["tanggal"];
        $reimburse = query(
            "SELECT * FROM reimburse
            INNER JOIN users ON reimburse.id_karyawan = users.id_user
            INNER JOIN status ON reimburse.id_status = status.id_status
            WHERE tanggal LIKE '%$tanggal%'
    "
        );
    } else {
        $tanggal = $_POST["tanggal"];
        $id_user = $user["id_user"];
        $reimburse = query(
            "SELECT * FROM reimburse
            INNER JOIN users ON reimburse.id_karyawan = users.id_user
            INNER JOIN status ON reimburse.id_status = status.id_status
            WHERE id_user = $id_user
            AND tanggal LIKE '%$tanggal%'
    "
        );
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
            <h1 class="mb-0 fw-bold">Reimburse</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="reimburse_add.php" class="btn btn-primary text-white">Tambah Data</a>
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
                    <form action="" method="POST">
                        <div class="row justify-content-end">
                            <div class="col-lg-8 col-12">
                                <div class="row">
                                    <label class="col-md-5">Cari Berdasarkan Tanggal</label>
                                    <div class="col-md-5">
                                        <input type="date" class="form-control form-control-line" name="tanggal">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary" name="cari">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="align-middle">No.</th>
                                    <th scope="col" class="align-middle">Nama</th>
                                    <th scope="col" class="align-middle">Flat Nomor Kendaraan</th>
                                    <th scope="col" class="align-middle text-center" width="150px">Nominal</th>
                                    <th scope="col" class="align-middle text-center" width="200px">Tanggal</th>
                                    <th scope="col" class="align-middle">Foto Bukti</th>
                                    <th scope="col" class="align-middle">Status</th>
                                    <th scope="col" class="align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($reimburse as $r) : ?>
                                    <tr class="small">
                                        <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                                        <td class="align-middle text-start"><?= $r["nama"]; ?></td>
                                        <td class="align-middle text-start"><?= $r["flat"]; ?></td>
                                        <td class="align-middle text-end">Rp. <?= number_format($r["nominal"], 0, ',', '.'); ?>,-</td>
                                        <td class="align-middle text-center"> <?= date('d F Y', strtotime($r["tanggal"])); ?></td>
                                        <td class="align-middle text-center">
                                            <a href="reimburse_detail.php?id_reimburse=<?= $r["id_reimburse"]; ?>">
                                                <img class="img-thumbnail" src="../assets/images/reimburse/<?= $r["gambar_bukti"] ?>">
                                            </a>
                                        </td>
                                        <td class="align-middle text-center"><i class="<?= $r["status"]; ?>"></i></td>
                                        <td class="align-middle text-start">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <a role="button" href="reimburse_edit.php?id_reimburse=<?= $r["id_reimburse"]; ?>" class="btn btn-info text-white"><i class="mdi mdi-pencil"></i></a>
                                                <a role="button" href="reimburse_delete.php?id_reimburse=<?= $r["id_reimburse"]; ?>" class="btn btn-danger text-white" onclick="return confirm('Yakin untuk menghapus reimburse ini?');"><i class="mdi mdi-delete"></i></a>
                                                <?php if ($user["role_id"] == 1) : ?>
                                                    <?php if ($r["id_status"] == 2) : ?>
                                                        <a role="button" href="reimburse_acc.php?id_reimburse=<?= $r["id_reimburse"]; ?>" class="btn btn-success text-white" onclick="return confirm('Yakin untuk meng-approve reimburse ini?');"><i class="mdi mdi-check"></i></a>
                                                    <?php else : ?>
                                                        <a role="button" href="reimburse_not_acc.php?id_reimburse=<?= $r["id_reimburse"]; ?>" class="btn btn-warning text-white" onclick="return confirm('Yakin untuk membatalkan approve reimburse ini?');"><i class="mdi mdi-close"></i></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
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