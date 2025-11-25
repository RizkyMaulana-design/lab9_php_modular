<?php
require_once __DIR__ . '/../../config/koneksi.php';

$id = (int) ($_GET['id'] ?? 0);
if ($id > 0) {

    // delete gambar
    $res = mysqli_query($conn, "SELECT gambar FROM data_barang WHERE id_barang = {$id}");
    $row = mysqli_fetch_assoc($res);
    if (!empty($row['gambar']) && file_exists(__DIR__ . '/../../' . $row['gambar'])) {
        unlink(__DIR__ . '/../../' . $row['gambar']);
    }

    mysqli_query($conn, "DELETE FROM data_barang WHERE id_barang={$id}");
    $_SESSION['flash'] = 'Data berhasil dihapus';
}

header('Location: /lab9_php_modular/index.php?page=barang/list');
exit;
