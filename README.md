# Laporan Praktikum 9 — PHP Modular dan Routing

Nama    : Rizky Maulana

Kelas   : TI.24.A.3

Nim     : 312410430

# 1. Tujuan Praktikum

Praktikum ini bertujuan untuk:

1. Memahami konsep modularisasi program PHP.

2. Mengimplementasikan fungsi dan pemecahan file (header, footer, template).

3. Membuat struktur folder modular pada aplikasi web.

4. Menggunakan routing agar project lebih rapi dan mudah dikelola.

5. Menerapkan modularisasi pada project CRUD database dari Praktikum 8.


# 2. Langkah Kerja Praktikum

Berikut adalah langkah pengerjaan berdasarkan modul:

# - Membuat Struktur Folder Project

Buat folder utama di dalam `htdocs` dengan nama:

lab9_php_modular/

Kemudian buat struktur folder sebagai berikut:


lab9_php_modular/
│ index.php
│ README.md
│ schema.sql
│
├── config/
│   └── koneksi.php
│
├── templates/
│   ├── header.php
│   └── footer.php
│
├── pages/
│   └── barang/
│       ├── list.php
│       ├── create.php
│       ├── edit.php
│       └── delete.php
│
├── assets/
│   └── style.css
│
└── gambar/

Struktur ini mengikuti instruksi dari modul Praktikum 9.


# 3. Implementasi Modularisasi

Modularisasi dilakukan dengan memisahkan bagian halaman yang digunakan berulang, seperti:

* Header

* Footer

* Navigasi Menu

* Koneksi database

Modularisasi membuat kode lebih rapi, efisien, dan mudah dipelihara.

# A. File header.php

Digunakan untuk menampilkan header dan navigasi pada seluruh halaman.

# B. File footer.php

Digunakan untuk menutup struktur HTML dan menampilkan copyright.

# C. File database.php

Berisi konfigurasi koneksi database agar dapat digunakan di seluruh halaman.

# 4. Routing Menggunakan index.php?page

Routing digunakan agar seluruh halaman hanya diakses melalui *index.php*.

Contoh URL:

index.php?page=user/list

index.php?page=user/tambah

index.php?page=about

Saat URL diakses, `index.php` akan membaca parameter `page` dan memanggil file yang sesuai.

Routing membuat project menjadi lebih modular dan mudah diperluas.


# 5. Implementasi CRUD (Dari Praktikum 8) ke Dalam Struktur Modular

CRUD dari praktikum sebelumnya ditempatkan ke folder `user/`, yang berisi file:

* list.php → Menampilkan daftar user

* tambah.php → Menambah user baru

* edit.php → Mengedit user yang sudah ada

* hapus.php → Menghapus user dari database

Semua file ini otomatis menggunakan header dan footer melalui `index.php`.


# 6. Screenshot Hasil Praktikum

> *(Tambahkan screenshot sesuai hasil project: tampilan home, about, user list, form tambah, form edit, dll)*


# 7. Kesimpulan

Pada praktikum ini, mahasiswa belajar:

* Mengubah project CRUD menjadi struktur *modular* menggunakan `require()`.

* Menggunakan *routing* agar project lebih terstruktur dan mudah dipelihara.

* Memecah kode menjadi file yang lebih kecil sehingga tidak terjadi duplikasi kode.

* Memahami konsep dasar modularisasi dalam pengembangan web.

Dengan modularisasi, project menjadi lebih profesional, rapi, dan mudah dikembangkan lebih lanjut.
