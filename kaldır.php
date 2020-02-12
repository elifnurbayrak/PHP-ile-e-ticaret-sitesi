<?php
 $silinecekID= $_GET['id'];
 $sunucu = "localhost";
 $kullanici = "root";
 $parola = "";
 $dbAd= "proje";
 


 echo $silinecekID;
 // Bağlantı oluşturma
 $bag = mysqli_connect($sunucu, $kullanici, $parola, $dbAd);
 $sil="DELETE FROM urunler WHERE id=".$silinecekID;
 $sonuc=mysqli_query($bag,$sil);

 
if($sonuc>0){
    header("location:profil.php");
 }
else
echo "Bir sorun oluştu silinemedi";
?>