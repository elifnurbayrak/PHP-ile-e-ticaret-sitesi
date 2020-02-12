
<?php
    ob_start();

        foreach ($_COOKIE["sepet"] as $id => $adet) {
            setcookie('sepet['.$id.']', 0, time() -3600);
            header('Location:'.$_SERVER['HTTP_REFERER']);
        }
    session_start();
    session_destroy();
    header("location:anasayfa.php");
?>