<?php
include("baglan.php");
include("header.php");

if(isset($_POST["kayitbtn"])) {
    $kullaniciadi = $_POST["kullaniciadi"];
    $kullanicisifre = $_POST["kullanicisifre"];

     // Aynı kullanıcı adının veritabanında kontrolü
     $sql = "SELECT * FROM kullanicilar WHERE kullanici_adi='$kullaniciadi'";
     $result = $conn->query($sql);
 
     if ($result->num_rows > 0) {
         echo "Bu kullanıcı adı zaten kullanımda!";
     } else {
         // Kullanıcıyı veritabanına ekleme
         $insertSql = "INSERT INTO kullanicilar (kullanici_adi, kullanici_sifre) VALUES ('$kullaniciadi', '$kullanicisifre')";
         if ($conn->query($insertSql) === TRUE) {
             echo "Kayıt başarılı!";
             $_SESSION["kullanici_adi"] = $kullaniciadi;
             header("location:./");
         } else {
             echo "Kayıt sırasında hata oluştu: " . $conn->error;
         }
     }
} else if (isset($_POST["girisbtn"])) {
    $kullaniciadi = $_POST["kullaniciadi"];
    $kullanicisifre = $_POST["kullanicisifre"];

    // Kullanıcının varlığını kontrol etme
    $sql = "SELECT * FROM kullanicilar WHERE kullanici_adi='$kullaniciadi'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($kullanicisifre = $row["kullanici_sifre"]) {
            echo "Giriş başarılı!";
            $_SESSION["kullanici_adi"] = $kullaniciadi;
            header("location:./");
        } else {
            echo "Yanlış şifre!";
        }
    } else {
        echo "Bu kullanıcı adıyla kayıtlı bir kullanıcı bulunamadı!";
    }
}
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <form method="post">
                        <h5>Kayıt</h5> <br>
                        <input type="text" name="kullaniciadi" class="form-control" placeholder="Kullanıcı Adı"> <br>
                        <input type="password" name="kullanicisifre" class="form-control" placeholder="Şifre"> <br>
                        <input type="submit" value="Kayıt Ol" class="btn btn-success" name="kayitbtn">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <form method="post">
                        <h5>Giriş</h5> <br>
                        <input type="text" name="kullaniciadi" class="form-control" placeholder="Kullanıcı Adı"> <br>
                        <input type="password" name="kullanicisifre" class="form-control" placeholder="Şifre"> <br>
                        <input type="submit" value="Giriş Yap" class="btn btn-warning" name="girisbtn">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>