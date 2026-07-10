<?php 
namespace App;

class Kategori {
  public $daftarProduk = [];
  public function __construct(public $nama){}

  public function tambahProduk(Produk $p){
    $this->daftarProduk[] = $p;
  }
  public function jumlahProduk(){
    //jumlah produk dalam $daftarProduk
    return count($this->daftarProduk);
  }
}