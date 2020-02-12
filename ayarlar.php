<?php
    session_start();
    ob_start();

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
   
    
    if(isset($_POST['kayit'])){
        if(empty($_POST['isim'])){
            $Kisim= $_SESSION['isim'];
        }
        else{
            $Kisim= $_POST['isim'];

        }
        if(empty($_POST['soyisim'])){
            $Kisim= $_SESSION['soyisim'];
        }
        else{
             $Ksoyisim= $_POST['soyisim'];

        }
        if(empty($_POST['adres'])){
            $Kadres= $_SESSION['adres'];
        }
        else{ 
            $Kadres=$_POST['adres'];
        }
        $Kid=$_SESSION['id'];

        if(empty($_POST['ysifre'])){
            $Sorgu="UPDATE kisiler
            SET isim='$Kisim', soyisim='$Ksoyisim', adres='$Kadres' WHERE id=$Kid";
            $sonuc=mysqli_query($bag,$Sorgu);
     

           if ($sonuc)
            {    
                $bul="SELECT * FROM kisiler WHERE id=".$_SESSION['id'];
                $_SESSION=mysqli_query($bag,$bul)->fetch_assoc();
                echo '<script language="javascript" type="text/javascript">
                $(document).ready(function(){
                    $(".bas2").text("Bilgiler Başarıyla Güncellendi.");
                    
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

        }
            else{
                if($_SESSION['sifre']==$_POST['sifre']){
                    if($_POST['ysifre']==$_POST['sifre']){
                        echo '<style>
                        #uyari{
                            display: block;
                        }
                        #uyari2{
                            display: none;
                        }
                        </style>';

                     }
                    else{
                        $Ksifre= $_POST['ysifre'];
                        $Sorgu="UPDATE kisiler
                        SET isim='$Kisim', soyisim='$Ksoyisim', sifre='$Ksifre', adres='$Kadres' WHERE id =".$_SESSION['id'];
                        $sonuc=mysqli_query($bag,$Sorgu);
                        
                        if ($sonuc){
                            
                            $bul="SELECT * FROM kisiler WHERE id=".$_SESSION['id'];
                            $_SESSION=mysqli_query($bag,$bul)->fetch_assoc();
                            
                            echo '<script language="javascript" type="text/javascript">
                            $(document).ready(function(){
                            $(".bas2").text("Bilgiler Başarıyla Güncellendi.");
                                
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

                    }
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
        //ob_end_flush();   //ob_start komutu kullandığımızda kullanıcı tarafında yapılan işlemleri göstermemizi sağlar
        mysqli_close($bag);
    }
    else{
        echo '<style>
        #uyari, #uyari2{
            display: none;
        }
        </style>';
    }

    if ($_SESSION){
        echo '<style>
        #cikis, #siparis{
            display: block;
        }
    
        </style>';
    
        if ($_SESSION['tur']==2){
            echo '<style>
            #profil{
                display: block;
            }
            #sepet{
                display: none;
            }
            </style>';
        }
        else if ($_SESSION['tur']==3){
            echo '<style>
            #sepet{
                display: block;
            }
            #profil{
                display: none;
            }
            </style>';
        }
        else{

            header("location:anasayfa.php");
    
        }
    
    }
    
    else{

        header("location:anasayfa.php");

    }
?>

</header>
<body style="background-image: url(arkaplan.jpg)">

<div class="BasDiv">
    <a id="link" href="/anasayfa.php"><h2>YÖRESEL ÜRÜNLER PAZARI</h2></a> 
    <a id="cikis" name="cikis" href="Kayit.php"><i class="fa fa-power-off"> Çıkış</i></a>
    <a id="cikis" name="cikis" href="ayarlar.php"><i class="fa fa-cogs"> Ayarlar</i></a>

</div>
<div class="BasDiv2">
    <a id="siparis" href="siparisler.php"><i class="fa fa-bars" aria-hidden="true"></i> Siparisler</a>
    <a id="profil" href="/profil.php" ><i class="fa fa-user"> Profilim</i></a>
    <a id="sepet" href="sepet.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Sepetim</a>
</div>

<div>
    <div class="icon-bar">
        <div><a  href="/anasayfa.php"><i class="fa fa-home"> Anasayfa</i></a></div>
        <div><a href="iletisim.php"><i class="fa fa-envelope"> İletişim</i></a></div>
        <div><a href="hakkımıda.php"><i class="fa fa-globe"> Hakkımızda</i></a></div>
        <div><a id="urn" href="/urunler.php?sira=sira&bolge=0"><i class="fa fa-leaf"> Ürünler</i></a></div>
    </div>
</div>



<div class="uyelik">
    <h2 class="bas2" id="bas2">KULLANICI KAYIT BİLGİLERİ</h2>
    <div id="uyari"><i class="fa fa-times">  Mevcut Şifreniz Yeni Şifrenizle Aynı Olamaz.</i></div>
    <div id="uyari2"><i class="fa fa-times">  Şifre Hatalı</i></div>
    <div style="width: 35%; float: left; height: 15cm"></div>
    <div class="form-kayit">
        <form action="ayarlar.php" method="Post">
        İsim: <br/>
        <input type="text" name="isim" id="isim" value="<?php echo $_SESSION['isim'];?>"/><br/>
        Soyisim: <br/>
        <input type="text" name="soyisim" id="soyisim" value="<?php echo $_SESSION['soyisim'];?>"/><br/>
        Şifre: <br/>
        <input type="password" name="sifre" id="sifre" ><br/>
        Yeni Şifre: <br/>
        <input type="text" name="ysifre" id="ysifre" /><br/>
        Adres: <br/>
        <textarea name="adres" id="adres" ><?php echo $_SESSION['adres'];?></textarea><br/>
        <input type="submit" value="Değişiklikleri Kaydet" name="kayit" id="kayit"/>
         </form>
    </div>
</div>

<footer style="clear:both">
<p>Copyright 2019 Elifnur Bayrak | Tüm haklar saklıdır.</p>
</footer>

</body>
</html>