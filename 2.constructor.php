<?php 


class Produk 
{
    public $judul, $penulis, $penerbit, $harga;

    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }


    public function getLabel()
    {
        // return list($this->penulis, $this->penerbit);
        return "$this->penulis, $this->penerbit";
    }
}

$produk1 = new Produk("naruto", "dwi", "asu", 300000);
$produk2 = new Produk("uncharted", "neil druchkann", "sony computer", 250000);
$produk3 = new Produk("dragon ball");

echo "komik :" , $produk1->getLabel();
echo "<br>";
echo "game :" . $produk2->getLabel();
echo "<br>";
echo "game :" . $produk3->getLabel();
?>