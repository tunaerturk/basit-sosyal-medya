<?php
include("baglan.php");
include("header.php");
?>

<body>

    <!-- İçerik -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <!-- Sol Kenar Çubuğu -->
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($_POST["gonderipaylas"])) {
                            $sahip = $_SESSION["kullanici_adi"];
                            $icerik = $_POST["icerik"];

                            // Veritabanına veri eklemek için SQL sorgusu
                            $sql = "INSERT INTO paylasimlar (sahip, icerik) VALUES ('$sahip', '$icerik')";

                            // SQL sorgusunu çalıştırma
                            if ($conn->query($sql) === TRUE) {
                                header("location:./");
                            } else {
                                echo "Hata: " . $sql . "<br>" . $conn->error;
                            }

                        }

                        if (isset($_SESSION["kullanici_adi"])) {
                            echo '<form action="" method="POST">
                            <h5>Gönderi Paylaş</h5>
                            <textarea name="icerik" id="" cols="30" rows="10" placeholder="İstediğini yaz!"
                                class="form-control"></textarea> <br>
                            <input type="submit" value="Paylaş" name="gonderipaylas" class="btn btn-success">
                        </form>';
                        } else {
                            echo 'Paylaşım yapabilmek için kayıt olmalısın!';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Gönderiler -->
                <?php
                $sql = "SELECT * FROM paylasimlar ORDER BY id DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card"> <div class="card-body">' . "<h5>" . $row["sahip"] . "</h5> <br> <h4>" . $row["icerik"] . "</h4>" . '</div> </div> <br>';
                }
                ?>
            </div>
            <div class="col-md-3">
                <!-- Sağ Kenar Çubuğu -->
                <div class="card">
                    <div class="card-body">
                        Gündem
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS ve jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>