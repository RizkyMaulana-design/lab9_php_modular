<?php
// lab9_php_modular/index.php - Front controller / Router
session_start();

// simple whitelist routing
$page = $_GET['page'] ?? 'barang/list';
$page = trim($page);

$validPages = [
    'barang/list'   => 'pages/barang/list.php',
    'barang/create' => 'pages/barang/create.php',
    'barang/edit'   => 'pages/barang/edit.php',
    'barang/delete' => 'pages/barang/delete.php',
];

if (!array_key_exists($page, $validPages)) {
    http_response_code(404);
    echo '404 - Halaman tidak ditemukan';
    exit;
}

require_once $validPages[$page];
