<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<header>


<link rel="stylesheet" type="text/css" href="Proje.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
<?php
    
    $sunucu = "localhost";
    $kullanici = "root";
    $parola = "";
    $dbAd= "proje";
    
    // Bağlantı oluşturma
    $bag = mysqli_connect($sunucu, $kullanici, $parola, $dbAd);

    if($_SESSION){
        if ($_SESSION['tur']==2){
            
        }
        else{
            header("location:anasayfa.php");
        }
    }
    else header("location:anasayfa.php");

?>

</header>
<body style="background-color:tan">

<div class="BasDiv">
<a id="link" href="/anasayfa.php"><h2>YÖRESEL ÜRÜNLER PAZARI</h2></a> 

</div>

<div>
        <div class="icon-bar2">
            <div><a  href="/anasayfa.php"><i class="fa fa-home"> Anasayfa</i></a></div>
            <div><a href="iletisim.php"><i class="fa fa-envelope"> İletişim</i></a></div>
            <div><a href="hakkımızda.php"><i class="fa fa-globe"> Hakkımızda</i></a></div>
            <div><a id="urn" href="/urunler.php?sira=sira&bolge=0"><i class="fa fa-leaf"> Ürünler</i></a></div>
            <div><a class="active" id="profil" href="profil.php" ><i class="fa fa-user"> Profilim</i></a></div>
        </div>
        
</div>

<div class="orta">
    <div class="urunlerim">
    <?php
        $satıcı=$_SESSION['id'];
        $sss="SELECT * FROM urunler WHERE satıcı=".$satıcı;
        $ss=mysqli_query($bag, $sss);
        while($rr = mysqli_fetch_array($ss)){
         echo '<div class="deneme1" >
         <img src="data:image/jpeg;base64,'.base64_encode( $rr['resim'] ).'"></br>
         <p>'.$rr['isim'].'</p>
         <div class="kaldır"><a  href="kaldır.php?id='.$rr['id'].'" onclick="return uyari();"><i> Kaldır</i></a></div>
          </div>';
     }?>
    </div>

    <div class="secenekler">
        <a  id="urunekleme" href="UrunKayit.php"><div><i class="fa fa-plus"> Ürün Ekleme </i></div></a>
        <a id="siparis" href="siparisler.php"><div><i class="fa fa-bars" aria-hidden="true"> Siparisler</i></div></a>
        <a id="sifre" href="ayarlar.php" ><div><i class="fa fa-user">  Bilgi Güncelleme </i></div></a>
        <a id="cikis" name="cikis" href="Kayit.php"><div><i class="fa fa-power-off"> Çıkış</i></div></a>
    </div>
</div>
<script language="JavaScript">
            function uyari() {
            
            if (confirm("Bu işlemi yapmak istediğinize emin misiniz?"))
            return true;
            else 
            return false;
        }
        </script>


</body>
</html>
