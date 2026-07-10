<?php
require 'vendor/autoload.php';   
// cukup satu require, sisanya otomatis

use App\Produk;
use App\Kategori;

$p = new Produk('Kopi Susu', 13000,10);
echo $p->tampilkan();

// composer dump-autoload