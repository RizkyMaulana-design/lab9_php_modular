<?php
require_once __DIR__ . '/../../config/koneksi.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $kategori = trim($_POST['kategori'] ?? '');
    $harga_jual = (float)($_POST['harga_jual'] ?? 0);
    $harga_beli = (float)($_POST['harga_beli'] ?? 0);
    $stok = (int)($_POST['stok'] ?? 0);

    $gambar_path = '';

    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] === 0) {
        $file = $_FILES['file_gambar'];
        $filename = str_replace(' ', '_', basename($file['name']));
        $target_dir = __DIR__ . '/../../gambar/';
        if (!is_dir($target_dir)) mkdir($target_dir, 0755, true);
        $destination = $target_dir . $filename;
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $gambar_path = 'gambar/' . $filename;
        }
    }

    if ($nama === '') $errors[] = 'Nama wajib diisi';
    if ($kategori === '') $errors[] = 'Kategori wajib diisi';

    if (empty($errors)) {
        $sql = "INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok) 
                VALUES ('{$kategori}', '{$nama}', '{$gambar_path}', '{$harga_beli}', '{$harga_jual}', '{$stok}')";
        mysqli_query($conn, $sql);

        $_SESSION['flash'] = 'Data berhasil disimpan';
        header('Location: /lab9_php_modular/index.php?page=barang/list');
        exit;
    }
}

require_once __DIR__ . '/../../templates/header.php';
?>

<div class="content">
    <h2>Tambah Barang</h2>

    <?php if (!empty($errors)): ?>
        <div class="error"><ul><?php foreach($errors as $e) echo "<li>$e</li>"; ?></ul></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label>Nama:<br><input type="text" name="nama"></label><br>
        <label>Kategori:<br>
            <select name="kategori">
                <option value="Komputer">Komputer</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Hand Phone">Hand Phone</option>
            </select>
        </label><br>
        <label>Harga Beli:<br><input type="number" name="harga_beli"></label><br>
        <label>Harga Jual:<br><input type="number" name="harga_jual"></label><br>
        <label>Stok:<br><input type="number" name="stok"></label><br>
        <label>Gambar:<br><input type="file" name="file_gambar"></label><br>
        <button class="btn" type="submit">Simpan</button>
    </form>
</div>

<?php require_once __DIR__ . '/../../templates/footer.php'; ?>
