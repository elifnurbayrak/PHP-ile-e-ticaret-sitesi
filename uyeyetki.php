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
    $qsorgu = "SELECT * FROM kisiler";
    $r1 = mysqli_query($bag, $qsorgu);
    $r2 = mysqli_query($bag, $qsorgu);

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

    <div class="icerik">
    <table>

<tr>
    <th>Ad Soyad</th>
    <th>Mail Adresi</th>
    <th>Yetki Durumu</th>
    <th>Değiştir</th>
    <th></th>
</tr>


<?php while($row1 = mysqli_fetch_array($r1)):; ?>
<tr id="<?php echo $row1['id'];?>">

       <?php if ($row1['tur']==3){?>
        <td><?php echo $row1['isim']." ".$row1['soyisim']?></td> 
        <td><?php echo $row1['mail'];?></td>
        <td><?php echo 'Müşteri';?></td>
        <td><a href="satıcı.php?id=<?php echo $row1['id'];?>" onclick="return uyari();">Satıcı Yap</a></td>
        <td><a href="adminyap.php?id=<?php echo $row1['id'];?>" onclick="return uyari();">Admin Yap</a></td>
        
        <?php } else if ($row1['tur']==2){ ?>

        <td><?php echo $row1['isim']." ".$row1['soyisim']?></td> 
        <td><?php echo $row1['mail'];?></td>
        <td><?php echo 'Satıcı';?></td>
        <td><a href="adminyap.php?id=<?php echo $row1['id'];?>" onclick="return uyari();">Admin Yap</a></td>
        <td><a href="musteri.php?id=<?php echo $row1['id'];?>" onclick="return uyari();">Müşteri Yap</a></td>

        <?php } else { ?>
        <td><?php echo $row1['isim']." ".$row1['soyisim']?></td> 
        <td><?php echo $row1['mail'];?></td>
        <td><?php echo 'Admin';?></td>
        <td><a href="satıcı.php?id=<?php echo $row1['id'];?>" onclick="return uyari();">Satıcı Yap</a></td>
        <td><a href="musteri.php?id=<?php echo $row1['id'];?>" onclick="return uyari();">Müşteri Yap</a></td>

<?php }?>

</tr>
<?php endwhile;?>


 </table>

        <script language="JavaScript">
            function uyari() {
            
            if (confirm("Bu işlemi yapmak istediğinize emin misiniz?"))
            return true;
            else 
            return false;
        }
        </script>

        
    </div>
</div>

</body>
</html>

