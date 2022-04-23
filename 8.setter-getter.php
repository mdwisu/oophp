<?php 

// class Produk

use Produk as GlobalProduk;

class Produk {
    private $judul, $penulis, $penerbit, $harga, $diskon = 0;
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

    // getInfoProduk menampilkan info produk
    public function getInfoProduk(){
        $str = "{$this->judul} | {$this->getLabel()}, (Rp. {$this->harga})";

        return $str;
    }
}

// class Komik extends Produk
class Komik extends Produk {
    public $jmlHalaman;
    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $jmlHalaman = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }
    public function getInfoProduk(){
        $str = "komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}
// class Game extend Produk
class Game extends Produk {
    public $waktuMain;
    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $waktuMain = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }
    public function getInfoProduk(){
        $str = "game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} jam.";
        return $str;   
    }
}
// class CetakInfoProduk
class CetakInfoProduk  {
    public function cetak(Produk $produk){
        $str = "{$produk->judul} | {$produk->getLabel()} Rp.{$produk->harga}";
        return $str;
    }
}

$produk1 = new Komik("naruto", "dwi", "asu", 300000, 100);
$produk2 = new Game("uncharted", "neil druchkann", "sony computer", 250000, 50);
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();
echo "<hr>";

$produk1->setJudul("judulBaru");
echo $produk1->getPenulis();



