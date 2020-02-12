<?php
    session_start();
    ob_start();

    $Sira=$_GET['sira'];
    $bolge=$_GET['bolge'];
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
    #cikis, .BasDiv2{
        display: block;
    }

    </style>';

    if ($_SESSION['tur']==2){
        echo '<style>
        #profil, #siparis{
            display: block;
        }
        #sepet{
            display: none;
        }
        </style>';
    }
    else if ($_SESSION['tur']==3){
        echo '<style>
        #sepet, #siparis{
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

<body style="background-color:tan">


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
            <div><a href="hakkımızda.php"><i class="fa fa-globe"> Hakkımızda</i></a></div>
            <div><a class="active" id="urn" href="/urunler.php?sira=sira&bolge=0"><i class="fa fa-leaf"> Ürünler</i></a></div>

        </div>
        
</div>

<div class="deneme2">
    <div class="divsira">
        <select class="sira" onchange="document.location.href=this.value">
                <option value="urunler.php?sira=sira&bolge=<?php echo $bolge; ?>">Tarih Sıralaması</option>
                <option <?php if ($Sira=="artan"){?> selected <?php }?> value="urunler.php?sira=artan&bolge=<?php echo $bolge; ?>">Artan Fiyat</option>
                <option <?php if ($Sira=="azalan"){?> selected <?php }?> value="urunler.php?sira=azalan&bolge=<?php echo $bolge; ?>">Azalan Fiyat</option> 
        </select>
    </div>

    <?php
        if($Sira=="artan"){
            if($bolge>0){
                $sss="SELECT * FROM urunler WHERE yore=$bolge ORDER BY fiyat";
                $toplam="SELECT count(*) as toplam from urunler where yore=".$bolge;
            }
            else{$sss="SELECT * FROM urunler ORDER BY fiyat";
                $toplam="SELECT count(*) as toplam from urunler";
            }
        }
        else if($Sira=="azalan"){
            if($bolge>0){
                $sss="SELECT * FROM urunler WHERE yore=$bolge ORDER BY fiyat DESC";
                $toplam="SELECT count(*) as toplam from urunler where yore=".$bolge;

            }
            else{$sss="SELECT * FROM urunler ORDER BY fiyat DESC";
                $toplam="SELECT count(*) as toplam from urunler";
            }
        }
        else{
            if($bolge>0){
                $sss="SELECT * FROM urunler WHERE yore=$bolge ORDER BY id DESC";
                $toplam="SELECT count(*) as toplam from urunler where yore=".$bolge;

            }
            else{$sss="SELECT * FROM urunler ORDER BY id DESC";
                $toplam="SELECT count(*) as toplam from urunler";
            }
        }

        $ss=mysqli_query($bag, $sss);
        $stoplam=mysqli_query($bag, $toplam);
        $ttoplam=mysqli_fetch_array($stoplam);
        if($ttoplam['toplam']==0) 
        {
            echo '<h1>Aranan Bölge İçin Ürün Bulnamadı</h1>';
        }
        else {
            echo '<h1 id="toplam">'.$ttoplam['toplam'].' ürün bulundu</h1>';
        }

        while($rr = mysqli_fetch_array($ss)){
         echo '<div class="deneme1" ><a href="?detay='.$rr['id'].'&sira=sira">
         <img src="data:image/jpeg;base64,'.base64_encode( $rr['resim'] ).'"></a></br>
         <a href="?detay='.$rr['id'].'&sira=sira&bolge=0">'.$rr['isim'].'</a></br>
         <a href="?detay='.$rr['id'].'&sira=sira&bolge=0">'.$rr['fiyat'].' TL</a></br>';
         if($_SESSION)
         if($_SESSION['tur']==3){
             echo '<div class="kaldır"><a href="?ekle='.$rr['id'].'"><i> Sepete Ekle</i></a></div>
          </div>';
         }
         else{echo '</div>';}
         else{echo '</div>';}

     }?>
    
    
    <?php  //Sepete Ürün Ekleme
    if (isset ($_GET['ekle'])){
        $eklenecek=$_GET['ekle'];
        $adet=$_COOKIE['sepet'][$eklenecek]+1;
        setcookie('sepet['.$eklenecek.']', $adet, time() + 3600);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    if (isset($_GET['detay'])){
        echo '<style>
        .deneme1, .sira, #toplam{
            display: none;
        }
        body{
            background-image: url(arkaplan.jpg);
        }
        </style>';
        $göster=$_GET['detay'];
        $sss="SELECT urunler.id, urunler.isim, urunler.resim, urunler.fiyat,
        sehirler.sehir, urunler.aciklama,
        katagoriler.tür FROM urunler
        INNER JOIN katagoriler 
        ON urunler.katagori=katagoriler.id
        INNER JOIN sehirler
        ON urunler.yore=sehirler.id
        WHERE urunler.id=".$göster;
        $ss=mysqli_query($bag, $sss);
        $rr = mysqli_fetch_array($ss);
        echo '<div class="detaylı">
            <div class="baslık"><h2>ÜRÜN BİLGİLERİ</h2></div>
            <div class="detayresim"><img src="data:image/jpeg;base64,'.base64_encode( $rr['resim'] ).'"></br></div>
            <div class="detay_bilgi">
                <h3>'.$rr['isim'].'</h3>
                <p>Fiyat= '.$rr['fiyat'].'</p>
                <p>Yore= '.$rr['sehir'].'</p>
                <p>Katagori= '.$rr['tür'].'</p>';
                if($rr['aciklama']){
                   echo '<p>Açıklama= '.$rr['aciklama'].'</p>';

                }
                if($_SESSION){
                    if($_SESSION['tur']==3){
                        echo '<a  href="?ekle='.$rr['id'].'"><button class="ekle"> Sepete Ekle</button></a>';
                }
                }
           echo '</div></div>'; }?>

</div>


<div style="width: 100%, position: absolute;">


    <div class="YanMenu" id="box">

        <ul class="mm">
        <li class="bolge1" ><a href="#">Marmara</a>
            <ul class="sehir1">
                <li><a href="?sira=<?php $Sira?>&bolge=34">İstanbul</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=59">Tekirdağ</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=17">Çanakkale</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=10">Balıkesir</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=16">Bursa</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=77">Yalova</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=41">Kocaeli</a></li>

                <li><a href="?sira=<?php $Sira?>&bolge=54">Sakarya</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=11">Bilecik</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=39">Kırklareli</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=11">Bilecik</a></li>
            </ul>
        </li>
        <li class="bolge2" ><a href="#">Ege</a>
            <ul class="sehir2">
                <li><a href="?sira=<?php $Sira?>&bolge=35">İzmir</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=45">Manisa</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=9">Aydın</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=20">Denizli</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=48">Muğla</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=3">Afyonkarahisar</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=43">Kütahya</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=64">Uşak</a></li>
            </ul>
        </li>
        <li class="bolge3" ><a href="#">Akdeniz</a>
            <ul class="sehir3">
                <li><a href="?sira=<?php $Sira?>&bolge=1">Adana</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=7">Antalya</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=15">Burdur</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=31">Hatay</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=32">Isparta</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=33">Mersin</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=80">Osmaniye</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=46">Kahramanmaraş</a></li>
            </ul>
        </li>
        <li class="bolge4" ><a href="#">İç Anadolu</a>
            <ul class="sehir4">
                <li><a href="?sira=<?php $Sira?>&bolge=68">Aksaray</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=38">Kayseri</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=71">Kırıkkale</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=40">Kırşehir</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=42">Konya</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=50">Neşehir</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=51">Niğde</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=66">Yozgat</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=26">Eskişehir</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=58">Sivas</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=70">Karaman</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=18">Çankırı</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=6">Ankara</a></li>
            </ul>
        </li>
        <li class="bolge5" ><a href="#">Karadeniz</a>
            <ul class="sehir5">
                <li><a href="?sira=<?php $Sira?>&bolge=8">Artiv</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=53">Rize</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=61">Trabzon</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=69">Bayburt</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=29">Gümüşhane</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=28">Giresun</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=52">Ordu</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=60">Tokat</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=5">Amasya</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=55">Samsun</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=57">Sinop</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=19">Çorum</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=37">Kastamonu</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=74">Bartın</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=78">Karabük</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=67">Zonguldak</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=14">Bolu</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=81">Düzce</a></li>
            </ul>
        </li>
        <li class="bolge6" ><a href="#">Doğu Anadolu</a>
            <ul class="sehir6">
                <li><a href="?sira=<?php $Sira?>&bolge=4">Ağrı</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=75">Ardahan</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=13">Bitlis</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=12">Bingöl</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=23">Elazığ</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=24">Erzincan</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=25">Erzurum</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=30">Hakkari</a></li>
            </ul>
        </li>
        <li class="bolge7" ><a href="#">Güneydoğu Anadolu</a>
            <ul class="sehir7">
                <li><a href="?sira=<?php $Sira?>&bolge=27">Gaziantep</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=21">Diyarbakır</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=63">Şanlıurfa</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=72">Batman</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=2">Adıyaman</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=56">Siirt</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=47">Mardin</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=79">Kilis</a></li>
                <li><a href="?sira=<?php $Sira?>&bolge=73">Şırnak</a></li>
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