<?php 

// class Produk
class Produk {
    public $judul, $penulis, $penerbit;
    protected $diskon = 0;
    private $harga;
    // construct menerima inputan
    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
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
    // mengambil harga
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
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
    // diskon
    public function setDiskon($diskon){
        $this->diskon = $diskon;
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



