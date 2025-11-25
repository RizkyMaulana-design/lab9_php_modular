<?php
require_once __DIR__ . '/../../config/koneksi.php';

$id = (int) ($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: /lab9_php_modular/index.php?page=barang/list');
    exit;
}

$sql = "SELECT * FROM data_barang WHERE id_barang = {$id}";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);

if (!$data) {
    $_SESSION['flash'] = 'Data tidak ditemukan';
    header('Location: /lab9_php_modular/index.php?page=barang/list');
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $kategori = trim($_POST['kategori']);
    $harga_beli = (float) $_POST['harga_beli'];
    $harga_jual = (float) $_POST['harga_jual'];
    $stok = (int) $_POST['stok'];

    $gambar_path = '';

    if (!empty($_FILES['file_gambar']['name'])) {
        $file = $_FILES['file_gambar'];
        $filename = str_replace(' ', '_', basename($file['name']));
        $target = __DIR__.'/../../gambar/'.$filename;

        if (move_uploaded_file($file['tmp_name'], $target)) {
            $gambar_path = 'gambar/'.$filename;
        }
    }

    if ($nama === '') $errors[] = 'Nama wajib diisi';
    if ($kategori === '') $errors[] = 'Kategori wajib diisi';

    if (empty($errors)) {
        $update = "
            UPDATE data_barang SET
                nama='{$nama}',
                kategori='{$kategori}',
                harga_beli='{$harga_beli}',
                harga_jual='{$harga_jual}',
                stok='{$stok}'
        ";

        if (!empty($gambar_path)) {
            $update .= ", gambar='{$gambar_path}'";
        }

        $update .= " WHERE id_barang={$id}";

        mysqli_query($conn, $update);

        $_SESSION['flash'] = 'Data berhasil diupdate';
        header('Location: /lab9_php_modular/index.php?page=barang/list');
        exit;
    }
}

require_once __DIR__ . '/../../templates/header.php';
?>

<div class="content">
    <h2>Edit Barang</h2>

    <?php if (!empty($errors)): ?>
        <div class="error"><ul><?php foreach($errors as $e) echo "<li>$e</li>"; ?></ul></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label>Nama:<br>
            <input type="text" name="nama" value="<?= $data['nama'] ?>">
        </label><br>

        <label>Kategori:<br>
            <select name="kategori">
                <option value="Komputer"   <?= $data['kategori']=='Komputer'?'selected':'' ?>>Komputer</option>
                <option value="Elektronik" <?= $data['kategori']=='Elektronik'?'selected':'' ?>>Elektronik</option>
                <option value="Hand Phone" <?= $data['kategori']=='Hand Phone'?'selected':'' ?>>Hand Phone</option>
            </select>
        </label><br>

        <label>Harga Beli:<br>
            <input type="number" name="harga_beli" value="<?= $data['harga_beli'] ?>">
        </label><br>

        <label>Harga Jual:<br>
            <input type="number" name="harga_jual" value="<?= $data['harga_jual'] ?>">
        </label><br>

        <label>Stok:<br>
            <input type="number" name="stok" value="<?= $data['stok'] ?>">
        </label><br>

        <label>Gambar Lama:<br>
            <?php if (!empty($data['gambar']) && file_exists(__DIR__.'/../../'.$data['gambar'])): ?>
                <img src="/lab9_php_modular/<?= $data['gambar'] ?>" width="120">
            <?php else: ?>
                -
            <?php endif; ?>
        </label><br>

        <label>Ganti Gambar:<br>
            <input type="file" name="file_gambar">
        </label><br>

        <button class="btn" type="submit">Simpan</button>
    </form>
</div>

<?php require_once __DIR__ . '/../../templates/footer.php'; ?>
