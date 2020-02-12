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
   
    
    if(isset($_POST['kayit'])){
        $Kisim= $_POST['isim'];
        $Ksoyisim= $_POST['soyisim'];
        $Kmail= $_POST['mail'];
        $Ksifre= $_POST['sifre'];
        $Kadres= $_POST['adres'];
        if(empty($Kisim) or empty($Ksoyisim) or empty($Kmail) or empty($Ksifre) or empty($Kadres)){
           echo '<style>
           #uyari{
               display: block;
           }
           #uyari2, #uyari3, #uyari4{
               display: none;
           }
           </style>';
        }
        else if(strlen($Ksifre) < 4 || strlen($Ksifre) > 12){
            echo '<style>
            #uyari4{
                display: block;
            }
            #uyari, #uyari3, #uyari2{
                display: none;
            }
            </style>';
        }
        else if ( filter_var($Kmail, FILTER_VALIDATE_EMAIL)){
            $Sorgu= "SELECT * FROM kisiler WHERE mail='$Kmail' ORDER BY id LIMIT 1;";
            $sonuc=mysqli_query($bag,$Sorgu);
            $Say= mysqli_num_rows($sonuc);
            if($Say==0){
                $sql = "INSERT INTO kisiler(isim,soyisim,sifre,mail,adres) VALUES ('$Kisim','$Ksoyisim','$Ksifre','$Kmail','$Kadres')";
                if (mysqli_query($bag,$sql))
                {   echo '<script language="javascript" type="text/javascript">
                    $(document).ready(function(){
                        $(".bas2").text("Kayıt Başarıyla Tamamlandı.");
                    });
                    </script>';
                    echo '<style>
                    #uyari, #uyari2, #uyari3, #uyari4{
                        display: none;
                    }
                    .form-kayit{
                        display:none;
                    }
                    </style>';
                }
             }
            else{
                echo '<style>
                #uyari2{
                    display: block;
                }
                #uyari, #uyari3, #uyari4{
                    display: none;
                }
                </style>';
                }
        }
        else {
            echo '<style>
            #uyari3{
                display: block;
            }
            #uyari, #uyari2, #uyari4{
                display: none;
            }
            </style>'; 
        }
        mysqli_close($bag);
    }
    else{
        echo '<style>
        #uyari, #uyari2, #uyari3, #uyari4{
            display: none;
        }
        </style>';
    }
    if ($_SESSION){
        header("location:anasayfa.php");
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
<div class="uyelik">
    <h2 class="bas2" id="bas2">KULLANICI KAYIT BİLGİLERİ</h2>
    <div id="uyari"><i class="fa fa-times">  Lütfen Boş Alan Bırakmayınız...</i></div>
    <div id="uyari2"><i class="fa fa-times">  Bu maille bir kullanıcı zaten bulunuyor...</i></div>
    <div id="uyari3"><i class="fa fa-times">  Lütfen Geçerli Bir Mail Adresi Giriniz.</i></div>
    <div id="uyari4"><i class="fa fa-times">  Şifreniz En Az 5 Karakterden Oluşmalı.</i></div>
    <div style="width: 35%; float: left; height: 15cm"></div>
    <div class="form-kayit">
        <form action="uyelik.php" method="Post">
        İsim: <br/>
        <input type="text" name="isim" id="isim" /><br/>
        Soyisim: <br/>
        <input type="text" name="soyisim" id="soyisim"/><br/>
        E-mail: <br/>
        <input type="text" name="mail" id="mail" /><br/>
        Şifre: <br/>
        <input type="password" name="sifre" id="sifre" ><br/>
        Adres: <br/>
        <textarea name="adres" id="adres"></textarea><br/>
        <input type="submit" value="Kaydol" name="kayit"/>
         </form>
    </div>
</div>


<footer style="clear:both">
<p>Copyright 2019 Elifnur Bayrak | Tüm haklar saklıdır.</p>
</footer>



</body>
</html>