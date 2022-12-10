<?php

// KONEKSI DATABASE =====================================================
$conn = mysqli_connect("localhost", "root", "", "skripsi_sireimburse");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// REIMBURSE
function reimburse_add($data)
{
    global $conn;

    $nama = $data["nama"];
    $flat = $data["flat"];
    $nominal = $data["nominal"];
    $gambar_bukti = upload_bukti();
    $tanggal = $data["tanggal"];
    $id_status = 2;
    $date_created = date("Y-m-d");
    $is_active = 1;

    $query = "INSERT INTO reimburse
				VALUES
			(NULL, '$nama', '$flat', '$nominal', '$gambar_bukti', '$tanggal', '$id_status', '$date_created', '$is_active')
			";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function reimburse_edit($data)
{
    global $conn;

    $id_reimburse = $data["id_reimburse"];
    $nama = $data["nama"];
    $flat = $data["flat"];
    $nominal = $data["nominal"];
    $gambar_lama = $data["gambar_lama"];
    $tanggal = $data["tanggal"];

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambar_lama;
    } else {
        $gambar = upload_bukti();
    }

    $query = "UPDATE reimburse SET
			id_karyawan = '$nama',
			flat = '$flat',
			nominal = '$nominal',
			gambar_bukti = '$gambar',
			tanggal = '$tanggal'

            WHERE id_reimburse = $id_reimburse
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function reimburse_delete($id_reimburse)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM reimburse WHERE id_reimburse = $id_reimburse");
    return mysqli_affected_rows($conn);
}

function reimburse_acc($id_reimburse)
{
    global $conn;

    $id_status = 1;

    $query = "UPDATE reimburse SET
			id_status = '$id_status'

            WHERE id_reimburse = $id_reimburse
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function reimburse_not_acc($id_reimburse)
{
    global $conn;

    $id_status = 2;

    $query = "UPDATE reimburse SET
			id_status = '$id_status'

            WHERE id_reimburse = $id_reimburse
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

// USERS / KARYAWAN
function pengguna_add($data)
{
    global $conn;

    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];
    $jabatan = $data["jabatan"];
    $phone = $data["phone"];
    $email = $data["email"];
    $role = $data["role"];

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = "default.jpg";
    } else {
        $gambar = upload();
    }

    $date_created = date("Y-m-d");
    $is_active = 1;

    $cek_username = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    $cek_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    // Cek Username Mahasiswa Sudah Ada Atau Belum
    if (mysqli_fetch_assoc($cek_username)) {
        echo "<script>
            alert('Username Sudah Terdaftar!');
            document.location.href = 'pengguna_add.php';
            </script>";
    } else if (mysqli_fetch_assoc($cek_email)) {
        echo "<script>
            alert('Email Sudah Terdaftar!');
            document.location.href = 'pengguna_add.php';
            </script>";
    } else {
        $query = "INSERT INTO users
				VALUES
			(NULL, '$nama', '$email', '$username', '$password', '$jabatan', '$gambar', '$phone', '$role', '$date_created', '$is_active')
			";

        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function pengguna_edit($data)
{
    global $conn;

    $id = $data["id"];
    $gambar_lama = $data["gambar_lama"];
    $nama = $data["nama"];
    $jabatan = $data["jabatan"];
    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];
    $phone = $data["phone"];
    $role = $data["jabatan"];

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambar_lama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE users SET
			nama = '$nama',
			email = '$email',
			username = '$username',
			password = '$password',
			jabatan = '$jabatan',
			gambar = '$gambar',
			phone = '$phone',
			role_id = '$role'

            WHERE id_user = $id
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function pengguna_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id_user = $id");
    return mysqli_affected_rows($conn);
}

// PROFILE
// EDIT PROFILE
function profile_edit($data)
{
    global $conn;

    $id = $data["id"];
    $gambar_lama = $data["gambar_lama"];
    $nama = $data["nama"];
    $jabatan = $data["jabatan"];
    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];
    $phone = $data["phone"];

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambar_lama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE users SET
			nama = '$nama',
			email = '$email',
			username = '$username',
			password = '$password',
			jabatan = '$jabatan',
			gambar = '$gambar',
			phone = '$phone'

            WHERE id_user = $id
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    if ($error === 4) {
        echo "<script>
                alert('Foto wajib diupload!');
            </script>";

        return false;
    }

    $ekstensiFileValid = ["jpg"];
    $ekstensiFile = explode(".", $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "<script>
                alert('Gambar yang diupload bukan .jpg!');
            </script>";

        return false;
    }

    // max 10mb
    if ($ukuranFile > 20000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar, Maksimal 20mb!');
            </script>";

        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    move_uploaded_file($tmpName, "../assets/images/users/" . $namaFileBaru);

    return $namaFileBaru;
}

function upload_bukti()
{
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    if ($error === 4) {
        echo "<script>
                alert('Foto wajib diupload!');
            </script>";

        return false;
    }

    $ekstensiFileValid = ["jpg"];
    $ekstensiFile = explode(".", $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "<script>
                alert('Gambar yang diupload bukan .jpg!');
            </script>";

        return false;
    }

    // max 10mb
    if ($ukuranFile > 20000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar, Maksimal 20mb!');
            </script>";

        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    move_uploaded_file($tmpName, "../assets/images/reimburse/" . $namaFileBaru);

    return $namaFileBaru;
}
