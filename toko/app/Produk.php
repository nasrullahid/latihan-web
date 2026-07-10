<?php
namespace App;

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