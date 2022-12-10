<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id_reimburse = $_GET["id_reimburse"];

if (reimburse_delete($id_reimburse) > 0) {
    echo "
		<script>
			alert('Reimburse berhasil dihapus!');
			document.location.href = 'reimburse.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Reimburse gagal dihapus!');
			document.location.href = reimburse.php';
		</script>
	";
}
