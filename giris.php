<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<header>


<link rel="stylesheet" type="text/css" href="Proje.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 

<!-- Kullanıcı kayıdını kontrol edip kaydettiğim alan. !-->
<?php

    $sunucu = "localhost";
    $kullanici = "root";
    $parola = "";
    $dbAd= "proje";
    
    // Bağlantı oluşturma
    $bag = mysqli_connect($sunucu, $kullanici, $parola, $dbAd);
    if(isset($_POST['giris'])){
        $Kmail= $_POST['mail'];
        $Ksifre= $_POST['sifre'];
        if(empty($Kmail) or empty($Ksifre)){
           echo '<style>
           #uyari{
               display: block;
           }
           #uyari2{
               display: none;
           }
           </style>';
        }
        else {
            $Sorgu= "SELECT * FROM kisiler WHERE mail='$Kmail' AND sifre='$Ksifre' ORDER BY id LIMIT 1;";
            $sonuc=mysqli_query($bag,$Sorgu);
            $Say= mysqli_num_rows($sonuc);
            
            if($Say==1){
                //Session işlemi yaptığım blok.
                    $bul_isim="SELECT * FROM kisiler WHERE mail='$Kmail' AND sifre='$Ksifre' ORDER BY id LIMIT 1";
                    $_SESSION=(mysqli_query($bag,$bul_isim))->fetch_assoc();

                    echo '<script language="javascript" type="text/javascript">
                    $(document).ready(function(){
                        $(".bas2").text("Giriş Başarıyla Tamamlandı.");
                        
                    });
                    </script>';
                    echo '<style>
                    #uyari, #uyari2{
                        display: none;
                    }

                    .form-kayit{
                        display:none;
                    }
                    </style>';
                }
            else{
                echo '<style>
                #uyari2{
                    display: block;
                }
                #uyari{
                    display: none;
                }
                </style>';
            }
        }
    }
    else{
        echo '<style>
        #uyari, #uyari2{
            display: none;
        }
        </style>';
    }
    if ($_SESSION){
        if($_SESSION['tur']==1){
            header("location:admin.php");
        }
        else{
            header("location:anasayfa.php");
        }
    }

?>

</header>
<body style="background-image: url(arkaplan.jpg)">

<div class="BasDiv">
    <a id="link" href="/anasayfa.php"><h2>YÖRESEL ÜRÜNLER PAZARI</h2></a> 
    <a id="uye_link" href="/uyelik.php"><i class="fa fa-plus"> Üye Ol</i></a> 
    <a id="uye_link" href="/giris.php"><i class="fa fa-user"> Üye Girişi</i></a> 
</div>

<div>
    <div class="icon-bar">
        <div><a  href="/anasayfa.php"><i class="fa fa-home"> Anasayfa</i></a></div>
        <div><a href="iletisim.php"><i class="fa fa-envelope"> İletişim</i></a></div>
        <div><a href="hakkımızda.php"><i class="fa fa-globe"> Hakkımızda</i></a></div>
        <div><a id="urn" href="/urunler.php?sira=sira&bolge=0"><i class="fa fa-leaf"> Ürünler</i></a></div>
    </div>
</div>
<div class="giris">
    <h2 class="bas2" id="bas2">KULLANICI GİRİŞ BİLGİLERİ</h2>
    <div id="uyari"><i class="fa fa-times">  Lütfen Boş Alan Bırakmayınız...</i></div>
    <div id="uyari2"><i class="fa fa-times">  Mail ve Şifrenizi Kontrol Ediniz, Böyle Bir Kulanıcı Bulunamadı...</i></div>
    <div style="width: 35%; float: left; height: 15cm"></div>
    
    <div class="form-kayit">
        <form action="giris.php" method="Post">
        E-mail: <br/>
        <input type="text" name="mail" id="mail" /><br/>
        Şifre: <br/>
        <input type="password" name="sifre" id="sifre" ><br/>      
        <input type="submit" value="Giris" name="giris"/>
         </form>
    </div>
</div>



<footer style="clear:both">
<p>Copyright 2019 Elifnur Bayrak | Tüm haklar saklıdır.</p>
</footer>


</body>
</html>