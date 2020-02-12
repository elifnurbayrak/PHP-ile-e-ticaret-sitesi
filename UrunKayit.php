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
    
    if(isset($_POST['kaydet'])){
        $urun= $_POST['urunisim'];
        $yore= $_POST['yore'];
        $katagori=$_POST['katagori'];
        $fiyat=$_POST['fiyat'];
        $aciklama=$_POST['aciklama'];
        $dosya= addslashes(file_get_contents($_FILES['resim']['tmp_name']));
        
        if(empty($urun) or  empty($fiyat)){
           echo '<style>
           #uyari{
               display: block;
           }
           #uyari2, #uyari3{
               display: none;
           }
           </style>';
        }
        else {
            if (!is_numeric($fiyat)) {
                echo '<style>
                #uyari, #uyari2{
                    display: none;
                }

                #uyari3{
                    display:block;
                }
                </style>';  
                }
            else if(($resim_boyut=getimagesize($_FILES['resim']['tmp_name']))==false){
                echo '<style>
                    #uyari, #uyari3{
                        display: none;
                    }

                    #uyari2{
                        display:block;
                    }
                    </style>';
            }
            else {
                $satıcı= $_SESSION['id'];
                $kayit="INSERT INTO urunler(isim, resim, fiyat, yore, katagori, aciklama, satıcı) 
                VALUES ('$urun','$dosya', '$fiyat', '$yore', '$katagori', '$aciklama', '$satıcı')";

                if (mysqli_query($bag,$kayit)) {
                    echo '<script language="javascript" type="text/javascript">
                    $(document).ready(function(){
                        $(".bas2").text("Ürün Başarıyla Kaydedildi.");
                        
                    });
                    </script>';
                    echo '<style>
                    #uyari, #uyari2, #uyari3{
                        display: none;
                    }
    
                    .form-kayit{
                        display:none;
                    }
                    </style>';

                }
            }
        }
    }
    else{
        echo '<style>
        #uyari, #uyari2, #uyari3{
            display: none;
        }
        </style>';
    }

    if($_SESSION){
        if ($_SESSION['tur']==2){
            
        }
        else{
            header("location:anasayfa.php");
        }
    }
    else header("location:anasayfa.php");
    

    $qsorgu = "SELECT * FROM katagoriler";
    $r1 = mysqli_query($bag, $qsorgu);
    $qsorgu = "SELECT * FROM sehirler";
    $r2 = mysqli_query($bag, $qsorgu);

?>

</header>
<body style="background-image: url(arkaplan.jpg)">

<div class="BasDiv">
    <a id="link" href="/anasayfa.php"><h2>YÖRESEL ÜRÜNLER PAZARI</h2></a> 
</div>

<div>
    <div class="icon-bar2">    
        <div><a  href="/anasayfa.php"><i class="fa fa-home"> Anasayfa</i></a></div>
        <div><a href="iletisim.php"><i class="fa fa-envelope"> İletişim</i></a></div>
        <div><a href="hakkımıda.php"><i class="fa fa-globe"> Hakkımızda</i></a></div>
        <div><a id="urn" href="/urunler.php?sira=sira&bolge=0"><i class="fa fa-leaf"> Ürünler</i></a></div>
        <div><a id="profil" href="/profil.php" ><i class="fa fa-user"> Profilim</i></a></div>
     </div> 
</div>

<div class="orta">
    <div class="uyelik">
        <h2 class="bas2" id="bas2">ÜRÜN KAYIT BİLGİLERİ</h2>
        <div id="uyari"><i class="fa fa-times">  Lütfen Boş Alan Bırakmayınız...</i></div>
        <div id="uyari2"><i class="fa fa-times">  Lütfen Sadece resim seçiniz. Başka dosya türü Seçmeyiniz...</i></div>
        <div id="uyari3"><i class="fa fa-times">  Lütfen Fiyat Bölümüne Sadece Sayı giriniz</i></div>
        <div style="width: 35%; float: left; height: 15cm"></div>
        
        <div class="form-kayit">
            <form action="UrunKayit.php" method="Post" enctype="multipart/form-data">
                <input type="file" name="resim"><br/>
                Ürün Adı: <br/>
                <input type="text" name="urunisim" id="urunisim" /><br/>
                Açıklama: <br/>
                <input type="textarea" name="aciklama" id="aciklama" /><br/>
                Fiyat: <br/>
                <input type="text" name="fiyat" id="fiyat" ><br/> 
                Yöre: <br/>
                <select name= 'yore' id="yore">
                <?php while($row1 = mysqli_fetch_array($r2)):;?>
                <option value="<?php echo $row1[0];?>"><?php echo $row1[0].' - '.$row1[1];?></option>
                <?php endwhile;?>
                </select><br/>
                Katogori: <br/>
                <select id="katagori" name=katagori>
                <?php while($row1 = mysqli_fetch_array($r1)):;?>
                <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                <?php endwhile;?>
                </select><br/>
                <input type="submit" value="KAYDET" name="kaydet"/>
            </form>
        </div>
    </div>
    <div class="secenekler">
        <a id="urunekleme" href="UrunKayit.php"><div class="active"><i class="fa fa-plus"> Ürün Ekleme </i></div></a>
        <a id="siparis" href="siparisler.php"><div><i class="fa fa-bars" aria-hidden="true"> Siparisler</i></div></a>
        <a id="sifre" href="ayarlar.php" ><div><i class="fa fa-user"> Bilgi Güncelleme </i></div></a>
        <a id="cikis" name="cikis" href="Kayit.php"><div><i class="fa fa-power-off"> Çıkış</i></div></a>
    </div>
</div>

</body>
</html>