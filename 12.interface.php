<?php 

interface InfoProduk{
    public function getInfoProduk();
}

// class Produk


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

// class Komik extends Produk
class Komik extends Produk implements InfoProduk{
    public $jmlHalaman;
    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $jmlHalaman = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }
    public function getInfoProduk(){
        $str = "komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    } 
    public function getInfo(){
        $str = "{$this->judul} | {$this->getLabel()}, (Rp. {$this->harga})";

        return $str;
    }
}
// class Game extend Produk
class Game extends Produk implements InfoProduk{
    public $waktuMain;
    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $waktuMain = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }
    public function getInfoProduk(){
        $str = "game : " . $this->getInfo() . " ~ {$this->waktuMain} jam.";
        return $str;   
    }
    public function getInfo(){
        $str = "{$this->judul} | {$this->getLabel()}, (Rp. {$this->harga})";

        return $str;
    }
}
// class CetakInfoProduk
class CetakInfoProduk  {
    public $daftarProduk = [];

    public function tambahProduk(Produk $produk)
    {
        $this->daftarProduk[] = $produk;
    }
    public function cetak(){
        $str = "Daftar Produk : <br>";

        foreach ($this->daftarProduk as $key ) {
            $str .= "- {$key->getInfoProduk()} <br>";
        }

        return $str;
    }
}


$produk1 = new Komik("naruto", "masashi kishimoto", "shonen jump", 300000, 100);
$produk2 = new Game("uncharted", "neil druchkann", "sony computer", 250000, 50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
