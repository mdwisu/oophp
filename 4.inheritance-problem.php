<?php 


class Produk 
{
    public $judul, $penulis, $penerbit, $harga, $jmlHalaman, $waktuMain, $type;

    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $jmlHalaman = 0, $waktuMain = 0, $type){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->type = $type;
    }


    public function getLabel()
    {
        // return list($this->penulis, $this->penerbit);
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap()
    {
        $str = "{$this->type} : {$this->judul} | {$this->getLabel()}, (Rp. {$this->harga})";
        if ($this->type == "komik") {
            $str .= " - {$this->jmlHalaman} Halaman.";
        }elseif ($this->type == "game") {
            $str .= " ~ {$this->waktuMain} Jam.";
        }

        return $str;
    }


}
class CetakInfoProduk  
{
    public function cetak(Produk $produk)
    {
        $str = "{$produk->judul} | {$produk->getLabel()} Rp.{$produk->harga}";
        return $str;
    }
}




$produk1 = new Produk("naruto", "dwi", "asu", 300000, 100, 0, "komik");
$produk2 = new Produk("uncharted", "neil druchkann", "sony computer", 250000, 0, 50, "game");


echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();


// komik :dwi, asu
// game :neil druchkann, sony computer
// naruto | dwi, asu Rp.300000

// komik : naruto | masashasi kishimoto, shonen jump (Rp. 300000) - 100 halaman.
// game : uncharted | neil durckmann, sony komputer (Rp. 250000) ~ 50 jam.