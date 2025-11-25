Siap, berikut versi **lebih profesional + diberi variasi + efek visual (emoji, highlight, penekanan, tipografi halus)** tanpa mengubah isi atau makna teks sama sekali.

Kamu bisa langsung copy-paste ke laporan — tetap formal, tapi tampil jauh lebih menarik dan modern.

---

# 🌐 **Laporan Praktikum 9 — PHP Modular dan Routing**

**👤 Nama**  : *Rizky Maulana*
**🏫 Kelas** : *TI.24.A.3*
**🆔 NIM**   : *312410430*

---

# 🎯 **1. Tujuan Praktikum**

Praktikum ini bertujuan untuk:

1. Memahami konsep **modularisasi program PHP**.
2. Mengimplementasikan **fungsi**, **template**, dan **pemecahan file** (header, footer).
3. Membuat **struktur folder modular** pada aplikasi web.
4. Menggunakan **routing** agar project lebih rapi dan mudah dikelola.
5. Menerapkan modularisasi pada **project CRUD** dari Praktikum 8.

---

# 🛠️ **2. Langkah Kerja Praktikum**

Langkah pengerjaan mengacu pada instruksi dalam modul.

---

## 📁 **• Pembuatan Struktur Folder Project**

Folder utama dibuat pada:

```
htdocs/lab9_php_modular/
```

Struktur lengkap:

```
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
```

✨ *Struktur ini mengikuti pedoman resmi dari modul Praktikum 9.*

---

# 🧩 **3. Implementasi Modularisasi**

Modularisasi memecah komponen halaman menjadi beberapa bagian agar:

* Kode lebih **rapi**
* File lebih **ringkas**
* Proses perawatan lebih **mudah**
* Pengembangan lebih **terstruktur**

---

## 🔹 **A. `header.php`**

Berisi struktur *header*, judul, dan navigasi utama.

## 🔹 **B. `footer.php`**

Menutup struktur HTML serta memuat copyright.

## 🔹 **C. `database.php`**

Berisi konfigurasi koneksi database untuk seluruh halaman.

---

# 🔀 **4. Routing Menggunakan `index.php?page=`**

Routing memungkinkan setiap halaman dipanggil menggunakan parameter URL.

**Contoh:**

```
index.php?page=user/list
index.php?page=user/tambah
index.php?page=about
```

📌 *`index.php` akan membaca parameter `page` lalu me-load file yang sesuai.*

Routing membuat aplikasi:

* Lebih **modular**
* Lebih **rapi**
* Mudah **dikembangkan**

---

# 📄 **5. Implementasi CRUD ke Struktur Modular**

CRUD dari Praktikum 8 ditempatkan pada folder `user/`:

* **list.php** → Menampilkan daftar user
* **tambah.php** → Menambah user
* **edit.php** → Mengedit data user
* **hapus.php** → Menghapus user

Semua halaman otomatis melewati:

✔ header
✔ footer
✔ routing

Lewat `index.php`.

---

# 🖼️ **6. Screenshot Hasil Praktikum**

> *(Tambahkan screenshot tampilan halaman Home, About, List, Form Tambah, Form Edit, dan lainnya.)*
> *(Gunakan border atau efek glow agar makin rapi.)*

---

# 🏁 **7. Kesimpulan**

Pada praktikum ini, mahasiswa telah mempelajari:

* Penerapan **modularisasi** menggunakan `require()`.
* Cara membuat **routing** agar file tidak berantakan.
* Pemecahan kode menjadi bagian kecil untuk menghindari duplikasi.
* Konsep dasar modularisasi web untuk project PHP.

Hasil akhirnya membuat project menjadi:

✨ Lebih **profesional**
✨ Lebih **rapi**
✨ Lebih **mudah dipelihara**
✨ Lebih **siap dikembangkan**

---
