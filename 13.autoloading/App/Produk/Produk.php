<?php 

abstract class Produk {
    protected $judul, $penulis, $penerbit, $harga, $diskon = 0;
    // construct menerima inputan
    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    // setter dan getter
    public function setJudul($judul){
        $this->judul = $judul;
    }
    public function getJudul() {
        return $this->judul;
    }
    public function setPenulis($penulis){
        $this->penulis = $penulis;
    }
    public function getPenulis() {
        return $this->penulis;
    }
    public function setPenerbit($penerbit){
        $this->penerbit = $penerbit;
    }
    public function getpenerbit() {
        return $this->penerbit;
    }
    public function setDiskon($diskon){
        $this->diskon = $diskon;
    }
    public function getDiskon(){
        return $this->diskon;
    }
    public function setharga($harga){
        $this->harga = $harga;
    }
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
    // getLabel Menulis penulis dan penerbit
    public function getLabel(){
        // return list($this->penulis, $this->penerbit);
        return "$this->penulis, $this->penerbit";
    }

    abstract public function getInfo();
}