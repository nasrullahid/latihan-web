<?php
use App\Produk;

$p = new Produk('Air',5000,1);
echo 'Namespace produk: '. $p->tampilkan();