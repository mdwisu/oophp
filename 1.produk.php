<?php 


class Produk 
{
    public $judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0;

    public function getLabel()
    {
        // return list($this->penulis, $this->penerbit);
        return "$this->penulis, $this->penerbit";
    }
}

// $produk1 = new Produk();
// $produk1->judul = "naruto";
// var_dump($produk1);

// $produk2 = new Produk();
// $produk2->judul = "naruto";
// $produk2-> tambahProperty = "hahaha";
// var_dump($produk2);

$produk3 = new Produk();
$produk3->judul = "naruto";
$produk3->penulis = "dwi";
$produk3->penerbit = "asu";
$produk3->harga = 300000;



$produk4 = new Produk();
$produk4->judul = "uncharted";
$produk4->penulis = "neil druchkann";
$produk4->penerbit = "sony computer";
$produk4->harga = 25000;

echo "komik :" , $produk3->getLabel();
echo "<br>";
echo "game :" . $produk4->getLabel();
?>