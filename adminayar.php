<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="Proje.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php

    $sunucu = "localhost";
    $kullanici = "root";
    $parola = "";
    $dbAd= "proje";
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

        $Kid=$_SESSION['id'];

        if(empty($_POST['ysifre'])){
            $Sorgu="UPDATE kisiler
            SET isim='$Kisim', soyisim='$Ksoyisim' WHERE id=$Kid";
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
                        SET isim='$Kisim', soyisim='$Ksoyisim', sifre='$Ksifre' WHERE id =".$_SESSION['id'];
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
        mysqli_close($bag);
    }
    else{
        echo '<style>
        #uyari, #uyari2{
            display: none;
        }
        </style>';
    }

    if ($_SESSION['tur']==1){
    }
    else{
        header("location:anasayfa.php");
    }
?>
<script>
 $(document).ready(function(){
     $('.uye').click(function(){
         $('.uye_islem').toggle("slow");
     });
     $('.uye_islem').hide();
     
 });
</script>

<body style="background-color: #B0C4DE">

<div class="ust_menu">
<h1 >ADMİN PANELİ</h1>
</div>  
<div>
    <div class="admin_menu">

        <ul class="liste">
        <li><a href="admin.php"><i class="fa fa-bars" aria-hidden="true"> Haberler</i></a></li>
        <li class="uye" ><a href="#"><i class="fa fa-users" aria-hidden="true"> Üye işlemleri</i></a>
            <ul class="uye_islem">
                <li><a href="uyesil.php"><i class="fa fa-user-times" aria-hidden="true"> Üye Sil</i></a></li>
                <li><a href="uyeyetki.php"><i class="fa fa-tags" aria-hidden="true"> Üye Yetkilendirme</i></a></li>
            </ul>
        </li>
        <li><a href="urunsil.php"><i class="fa fa-minus-square" aria-hidden="true"> Ürün Sil</i></a></li>
        <li><a href="adminayar.php"><i class="fa fa-cogs" aria-hidden="true"> Ayarlar</i></a></li>
        <li><a href="Kayit.php"><i class="fa fa-power-off" aria-hidden="true"> Çıkış</i></a></li>
        </ul>

    </div>

    <div class="uyelik">
    <h2 class="bas2" id="bas2">ADMİN BİLGİLERİ</h2>
    <div id="uyari"><i class="fa fa-times">  Mevcut Şifreniz Yeni Şifrenizle Aynı Olamaz.</i></div>
    <div id="uyari2"><i class="fa fa-times">  Şifre Hatalı</i></div>
    <div style="width: 35%; float: left; height: 15cm"></div>
    
    <div class="form-kayit">
        <form action="adminayar.php" method="Post">
        İsim: <br/>
        <input type="text" name="isim" id="isim" value="<?php echo $_SESSION['isim'];?>"/><br/>
        Soyisim: <br/>
        <input type="text" name="soyisim" id="soyisim" value="<?php echo $_SESSION['soyisim'];?>"/><br/>
        Şifre: <br/>
        <input type="password" name="sifre" id="sifre" ><br/>
        Yeni Şifre: <br/>
        <input type="password" name="ysifre" id="ysifre" /><br/><br/>
        <input type="submit" value="Değişiklikleri Kaydet" name="kayit" id="kayit"/>
         </form>
    </div>


</div>


    </div>
</div>

</body>
</html>

