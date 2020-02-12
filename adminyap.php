<?php
 $degistirID= $_GET['id'];
 $sunucu = "localhost";
 $kullanici = "root";
 $parola = "";
 $dbAd= "proje";
 


 // Bağlantı oluşturma
 $bag = mysqli_connect($sunucu, $kullanici, $parola, $dbAd);
 $sil="UPDATE kisiler SET tur=1  WHERE id=".$degistirID;
 $sonuc=mysqli_query($bag,$sil);

 
if($sonuc>0){
    header("location:uyeyetki.php");
 }
else
echo "Bir sorun oluştu ve yetkilendirme yapılamadı.";
 
?>