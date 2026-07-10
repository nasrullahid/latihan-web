<?php

class Produk {
  public $nama;
  public $harga;
  public $stok;

  public function __construct($a, $b, $c=0) {
    $this->nama = $a;
    $this->harga = $b;
    $this->stok = $c; 
  }

  public function tampilkan() {
    return $this->nama." | Rp".$this->harga." | stok: ".$this->stok;
  }

  public function totalNilai(){
    return "Total nilai Rp".$this->harga * $this->stok;
  }

  public function tambhaStok($jumlah){
    return $this->stok = $this->stok + $jumlah;
    // return $this->stok += $jumlah;
  }

  public function kurangiStok($jumlah){
    return $this->stok -= $jumlah;
  }

  public function jual($jumlah){
    if($this->stok>=$jumlah) {
      $this->kurangiStok($jumlah);
      return "Berhasil menjual ".$jumlah." ".$this->nama;
    }
      else {
        return "Stok tidak cukup";
      }
  }
}

$produk = new Produk("Kopi Susu Konoha", 13000);  //c membuat object {}
$produk->stok = 50;
$produk->tambhaStok(10);
$produk->kurangiStok(5);
echo $produk->jual(17);
echo '<hr>';
echo $produk->tampilkan();
echo '<hr>';
echo $produk->totalNilai();

echo '<hr>';

// Kategori multi produk
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

$minuman = new Kategori('Minuman');
$minuman->tambahProduk(new Produk('Kopi Susu', 13000));
$minuman->tambahProduk(new Produk('Air', 5000));
echo "Jumlah produk: ".$minuman->jumlahProduk();
