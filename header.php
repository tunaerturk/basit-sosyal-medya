<?php 
session_start();
if(isset($_SESSION["kullanici_adi"])) {
    $girisdurum = true;
    $kadi = $_SESSION["kullanici_adi"];
} else {
    $girisdurum = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>execc</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./">Basit Sosyal Medya Sitesi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
           <!-- <li class="nav-item">
                <a class="nav-link" href="#">Anasayfa</a>
            </li> -->
            <?php 
            if($girisdurum == true) {
                echo'<li class="nav-item">
                <a class="nav-link" href="#">'. $kadi .'</a>
            </li>';
            } else {
                echo '<div class="btn-group" role="group" aria-label="">
                <a href="rl.php"><button type="button" class="btn btn-warning">Giriş</button></a>
                <a href="rl.php"><button type="button" class="btn btn-success">Kayıt Ol</button></a>
</div>';
            }
            ?>
        </ul>
    </div>
</nav>