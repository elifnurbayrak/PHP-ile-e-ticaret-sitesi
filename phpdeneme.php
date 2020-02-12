<!DOCTYPE html>
<html>
<header>
<style type="text/css">
    h4{color:Orange;
    font-size: 35px;}
   </style>

<?php

if(isset($_POST['gonder'])){
          $_isim=$_POST['isim'];
          $_soyisim=$_POST['soyisim'];
                  echo "Hoşgeldin $_isim $_soyisim";
          echo "<style type='text/css'>
                    #form_kutusu{
                        display:none;
                    }
                   </style>";
}

?>
</header>
<body>

    <h4>BAŞLIK</h4>
<div id="form_kutusu">
       <form action="phpdeneme.php" method="POST">
             <p>İsim</p><input type="text" name="isim" /><br />
            <p>Soyisim</p><input type="text" name="soyisim" />
            <p><input type="submit" name="gonder" value="Gönder" /></p>
      </form>
</div>

<div>
    <form action="phpdeneme.php" method="POST">
        <p>Vize</p><input type="text" name="vize"/><br/>
        <p>Final</p><input type="text" name="final"/><br/>
        <input type="submit" name="hesapla" value="Hesapla"/>
    </form>
</div>

<?php
if(isset($_POST['hesapla'])){
    $_vize=$_POST['vize'];
    $_final=$_POST['final'];
    $_ort=$_vize*0.4+$_final*0.6;

    if($_ort<=50){
        echo "Ortalamanız : ".$_ort."<br/> Kaldınız.";
    }
    else{
        echo "Ortalamanız : ".$_ort."<br/> Geçtiniz.";
    }
    
}

?>
<?php
  $sunucu = "localhost";
  $kullanici = "root";
  $parola = "";

  // Bağlantı oluşturma
  $bag = mysqli_connect($sunucu, $kullanici, $parola);
  $conn = new mysqli($sunucu, $kullanici, $parola);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

  // Bağlantı kontrolü											
  if (!$bag) {
      die("Bağlantı hatası: " . mysqli_connect_error());
  }
  echo "Bağlantı sağlandı!";
  mysqli_close($bag);
?>




<?php if(empty($_POST["id"])) { ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="number" data-required="yes" name="id" placeholder="Kullanıcı ID" size="40">
<button type="submit" formmethod="post" formaction="<?php echo $_SERVER['PHP_SELF']; ?>">Devam</button>
</form>
<?php } else {
echo $_POST["id"]; ?> numaralı ID adına işlem yapıyorsunuz.
<?php } ?>

</body>
</html>


/*$resim_isim=$_FILES['resim']['name'];
                $isim = "resimler/".basename($resim_isim);
                if (move_uploaded_file($_FILES['resim']['tmp_name'], $isim)) {
                    echo "Image uploaded successfully";
                }else{
                    echo "Failed to upload image";
                }*/


                /*$Sorgu= "SELECT * FROM kisiler WHERE mail='$Kmail' AND sifre='$Ksifre' ORDER BY id LIMIT 1;";
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
            }*/
            
            //$conn = new mysqli($sunucu, $kullanici, $parola, $dbAd);

/*if ($bag->connect_error) {
    die("Connection failed: " . $bag->connect_error);
} 
echo "Connected successfully";*/ 
// Veri Bağlantısını kontrol etmek için yazdığım kodlar

/* DOĞRU ÇALIŞAN KOD BLOĞU      
           if ($bag->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $bag->error;
        }
           */


          <div id="k2"></div>
            <div id="k3"></div>
            <div id="k4"></div>