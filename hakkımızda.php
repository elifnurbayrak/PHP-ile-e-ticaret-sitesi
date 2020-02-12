<?php
    session_start();
    ob_start();


    $sunucu = "localhost";
    $kullanici = "root";
    $parola = "";
    $dbAd= "proje";
    
    // Bağlantı oluşturma
    $bag = mysqli_connect($sunucu, $kullanici, $parola, $dbAd);


    
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="Proje.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>


    $(document).ready(function(){
  
  $(".bolge1").hover(function(){
    $(".sehir1").slideDown();
    }, function(){
    $(".sehir1").slideUp();
  });

  $(".bolge2").hover(function(){
    $(".sehir2").slideDown();
    }, function(){
    $(".sehir2").slideUp();
  });

  $(".bolge3").hover(function(){
    $(".sehir3").slideDown();
    }, function(){
    $(".sehir3").slideUp();
  });

  $(".bolge4").hover(function(){
    $(".sehir4").slideDown();
    }, function(){
    $(".sehir4").slideUp();
  });

  $(".bolge5").hover(function(){
    $(".sehir5").slideDown();
    }, function(){
    $(".sehir5").slideUp();
  });

  $(".bolge6").hover(function(){
    $(".sehir6").slideDown();
    }, function(){
    $(".sehir6").slideUp();
  });

  $(".bolge7").hover(function(){
    $(".sehir7").slideDown();
    }, function(){
    $(".sehir7").slideUp();
  });

});

</script>
<?php
if ($_SESSION){
    echo '<style>
    #uye_link{
        display: none;
    }
    #cikis, #siparis{
        display: block;
    }

    </style>';

    if ($_SESSION['tur']==2){
        echo '<style>
        #profil, .BasDiv2{
            display: block;
        }
        #sepet{
            display: none;
        }
        </style>';
    }
    else if ($_SESSION['tur']==3){
        echo '<style>
        #sepet, .BasDiv2{
            display: block;
        }
        #profil{
            display: none;
        }
        </style>';
    }
    else echo '<style>
    #profil, #sepet, #siparis, .BasDiv2{
        display: none;
    }
    </style>';

}

else{
    echo '<style>
    #uye_link{
        display: block;
    }
    #cikis{
        display: none;
    }
    #profil, #sepet, #siparis, .BasDiv2{
        display: none;
    }
    </style>';

}

?>

<body style="background-image: url(arkaplan.jpg)">


<div class="BasDiv">
    <a id="link" href="/anasayfa.php"><h2>YÖRESEL ÜRÜNLER PAZARI</h2></a> 
    <a id="uye_link" href="/uyelik.php"><i class="fa fa-plus"> Üye Ol</i></a> 
    <a id="uye_link" href="/giris.php"><i class="fa fa-user"> Üye Girişi</i></a>
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
            <div><a href="/anasayfa.php"><i class="fa fa-home"> Anasayfa</i></a></div>
            <div><a href="iletisim.php"><i class="fa fa-envelope"> İletişim</i></a></div>
            <div><a class="active" href="hakkımızda.php"><i class="fa fa-globe"> Hakkımızda</i></a></div>
            <div><a id="urn" href="/urunler.php?sira=sira&bolge=0"><i class="fa fa-leaf"> Ürünler</i></a></div>

        </div>
        
</div>
<div class="iletisim">
    <h2>Hakkımızda</h2>
    <p>Doğal ve katkısız lezzetleri, dünya genelinde bilinen eşsiz tatlarını,
     en iyi hizmet kalitesi ve anlayışıyla müşterilerine sunmayı hedefleyen 
     Yöresel Ürünler Pazarı 2019 yılında yayın hayatına başladı.</p>
    <p>Amacımız : ‘’Yöresel ürünlerin lezzeti bir başka olur ‘’ 
    diyerek en kaliteli en güvenilir yöresel ürünleri tam yerinden ve taze taze 
    getirerek sofralarınıza sunmak ve aynı zamanda lezzet meraklılarının belkide
    hiç duymadıkları bir çok yöresel çeşitlerle tanıştırabilmektir.</p>
    <p>Yöresel Ürünler Pazarı olarak; tüketicilerimize daima en iyi 
    ürünleri ve hizmeti sunmanın bilinci ve sorumluluğu içindeyiz.
    Firmamız gerek misyonu, gerekse çalışma prensibi olarak doğrudan kaliteye önem vermektedir.
    Ürünlerimizin tamamını doğal ve katkısız olarak mevsiminde temin ediyor ve sizlere sunuyoruz.</p>
</div>

<div style="width: 100%, position: absolute;">
    <div class="YanMenu" id="box">

        <ul class="mm">
        <li class="bolge1" ><a href="#">Marmara</a>
            <ul class="sehir1">
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=34">İstanbul</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=59">Tekirdağ</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=17">Çanakkale</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=10">Balıkesir</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=16">Bursa</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=77">Yalova</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=41">Kocaeli</a></li>

                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=54">Sakarya</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=11">Bilecik</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=39">Kırklareli</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=11">Bilecik</a></li>
            </ul>
        </li>
        <li class="bolge2" ><a href="#">Ege</a>
            <ul class="sehir2">
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=35">İzmir</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=45">Manisa</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=9">Aydın</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=20">Denizli</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=48">Muğla</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=3">Afyonkarahisar</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=43">Kütahya</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=64">Uşak</a></li>
            </ul>
        </li>
        <li class="bolge3" ><a href="#">Akdeniz</a>
            <ul class="sehir3">
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=1">Adana</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=7">Antalya</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=15">Burdur</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=31">Hatay</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=32">Isparta</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=33">Mersin</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=80">Osmaniye</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=46">Kahramanmaraş</a></li>
            </ul>
        </li>
        <li class="bolge4" ><a href="#">İç Anadolu</a>
            <ul class="sehir4">
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=68">Aksaray</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=38">Kayseri</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=71">Kırıkkale</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=40">Kırşehir</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=42">Konya</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=50">Neşehir</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=51">Niğde</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=66">Yozgat</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=26">Eskişehir</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=58">Sivas</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=70">Karaman</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=18">Çankırı</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=6">Ankara</a></li>
            </ul>
        </li>
        <li class="bolge5" ><a href="#">Karadeniz</a>
            <ul class="sehir5">
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=8">Artiv</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=53">Rize</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=61">Trabzon</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=69">Bayburt</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=29">Gümüşhane</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=28">Giresun</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=52">Ordu</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=60">Tokat</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=5">Amasya</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=55">Samsun</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=57">Sinop</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=19">Çorum</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=37">Kastamonu</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=74">Bartın</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=78">Karabük</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=67">Zonguldak</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=14">Bolu</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=81">Düzce</a></li>
            </ul>
        </li>
        <li class="bolge6" ><a href="#">Doğu Anadolu</a>
            <ul class="sehir6">
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=4">Ağrı</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=75">Ardahan</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=13">Bitlis</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=12">Bingöl</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=23">Elazığ</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=24">Erzincan</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=25">Erzurum</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=30">Hakkari</a></li>
            </ul>
        </li>
        <li class="bolge7" ><a href="#">Güneydoğu Anadolu</a>
            <ul class="sehir7">
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=27">Gaziantep</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=21">Diyarbakır</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=63">Şanlıurfa</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=72">Batman</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=2">Adıyaman</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=56">Siirt</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=47">Mardin</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=79">Kilis</a></li>
                <li><a href="urunler.php?sira=<?php $Sira?>&bolge=73">Şırnak</a></li>
            </ul>
        </li>
        </ul>

    </div>
</div>

<footer style="clear:both">
<p>Copyright 2019 Elifnur Bayrak | Tüm haklar saklıdır.</p>
</footer>

</body>
</html> 