
<?php
include('daftar_menu.php');

echo "<h1>". "Struk Pembayaran". "</h1>";
echo "===================================". "</br>";

function getHarga($daftarMenu, $menu) {
   $nilai = 0;
 foreach ($daftarMenu as $item) {
  if ($item["nama"] == $menu) {
  	$nilai = $item["harga"];
   break ;
  }
 }
 return $nilai; 
}

$keranjang = $_POST['menu'];

$hargaKeseluruhan = 0;

foreach ($keranjang as $pesanan) {
 $harga         = getHarga($daftarMenu, $pesanan["nama"]);
 $jumlahPesanan = $pesanan["jumlahPesanan"];
 $subtotal      = $harga * $jumlahPesanan;
 $hargaKeseluruhan += $subtotal;
 echo "</br> ( ". $jumlahPesanan. " ) ";
 echo $pesanan["nama"]. " ". $harga. " -> Total Peritem = Rp. ";
 echo $subtotal;
}

echo "</br>". "</br>"."===================================". "</br>". "</br>";
echo "Total Seluruhnya : Rp. ". $hargaKeseluruhan;

?>