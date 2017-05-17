<html>
<head>
<script src="jquery.min.js"></script>
<script>
$(document).ready(function(){
 $i = 1;
    $("#pesan").click(function(){
     var namaMenu = $("#menuPesanan").val();
     var jumlahMenu = $("#jumlahPesanan").val();
     var hargaMenu  = $("#menuPesanan").find("option:selected").data('harga');
     var totalItem = (hargaMenu * jumlahMenu);
     var inputMenu   = "<input type='hidden' name='menu["+$i+"][nama]' value='"+namaMenu+"'>";
     var inputHarga  = "<input type='hidden' name='menu["+$i+"][jumlahPesanan]' value='"+jumlahMenu+"'>";
        $("#keranjang").append("<li>"+" ( "+jumlahMenu+" ) "+namaMenu+" = Rp. "+hargaMenu+" => "+"Total PerItem = "+"Rp. "+totalItem+inputMenu+inputHarga+"</li>");
        $i++;
    });
});
</script>
</head>
<body>

<?php 
include('daftar_menu.php');
echo "<h1>Daftar Menu </h1>";
echo "===================================". "</br>";
echo "<h3>Menu Makanan dan Minuman</h3>";

foreach($daftarMenu as $data) {
echo "<table border=5 >";
echo "<tr>";
echo "<td>".$data['nama'];
echo "<td>"."Rp. ". $data['harga']."</td>";

echo "</tr>";
echo "</table>";
}

echo "</br>". "===================================";
echo "<b><h2>Data Pesanan</h2></b>";
?>

Nama Menu :
<select name="combobox1" id="menuPesanan">
  <option selected="selected">Pilih Satu</option>
  <?php
   foreach($daftarMenu as $data) {
   echo ("<option value='{$data['nama']}' data-harga='{$data['harga']}' >{$data['nama']}</option>");
    } ?>
    
</select><br> 

 Jumlah: <input type="text" value="" id = "jumlahPesanan">
 
<button id="pesan">Pesan</button>

<form action="cetak.php" method="post">
<ul id = "keranjang"></ul>
<input type="submit" name="ok" value="Cetak Struk"> 
</form>
 </body>
 </html>