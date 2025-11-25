CREATE TABLE `data_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
