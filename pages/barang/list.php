<?php
require_once __DIR__ . '/../../config/koneksi.php';
require_once __DIR__ . '/../../templates/header.php';

$sql = "SELECT * FROM data_barang ORDER BY id_barang DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="content">
    <h2>Daftar Barang</h2>
    <?php if (isset($_SESSION['flash'])): ?>
        <div class="flash"><?= htmlspecialchars($_SESSION['flash']) ?></div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <p><a class="btn" href="/lab9_php_modular/index.php?page=barang/create">Tambah Barang</a></p>

    <table class="table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td>
                            <?php if (!empty($row['gambar']) && file_exists(__DIR__ . '/../../' . $row['gambar'])): ?>
                                <img src="/lab9_php_modular/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama']) ?>" style="max-width:100px;">
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['kategori']) ?></td>
                        <td><?= number_format($row['harga_beli'],0,',','.') ?></td>
                        <td><?= number_format($row['harga_jual'],0,',','.') ?></td>
                        <td><?= htmlspecialchars($row['stok']) ?></td>
                        <td>
                            <a class="btn" href="/lab9_php_modular/index.php?page=barang/edit&id=<?= $row['id_barang'] ?>">Edit</a>
                            <a class="btn danger" href="/lab9_php_modular/index.php?page=barang/delete&id=<?= $row['id_barang'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7">Belum ada data</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../../templates/footer.php'; ?>
