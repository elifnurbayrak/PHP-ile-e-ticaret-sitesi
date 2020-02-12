<?php
 $silinecekID= $_GET['id'];
 $sunucu = "localhost";
 $kullanici = "root";
 $parola = "";
 $dbAd= "proje";
 


 echo $silinecekID;
 // Bağlantı oluşturma
 $bag = mysqli_connect($sunucu, $kullanici, $parola, $dbAd);

 $bul="SELECT tur FROM kisiler WHERE id=".$silinecekID;
 $tur=mysqli_query($bag,$bul);
 $son = mysqli_fetch_array($tur);
if($son['tur']==3){
    $sorgu="DELETE FROM siparisler WHERE alıcı=".$silinecekID;
    $siparis=mysqli_query($bag,$sorgu);
}
else if($son['tur']==2){
    $sorgu="DELETE FROM urunler WHERE satıcı=".$silinecekID;
    $siparis=mysqli_query($bag,$sorgu);
}

 $sil="DELETE FROM kisiler WHERE id=".$silinecekID;
 $sonuc=mysqli_query($bag,$sil);

 
if($sonuc>0){
    header("location:uyesil.php");
 }
else
echo "Bir sorun oluştu silinemedi";
 
