<!DOCTYPE html>
<!--
Bu Proje open source olup tc no doğrulama için kullanılmıştır.
!! Ücretli Satılamaz !!
www.ebubekirbastama.com
-->
<html>
    <head>
        <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title>Siyah Muhafız Tc No Doğrulama</title>
    </head>
    <body>
    <div class="container">
        <form action="">
            <h2 style="text-align: center;" >Siyah Muhafız Tc No Kontrol Sistemi</h2>
            <div class="form-group">
                <label for="tcno">Tc No:</label>
                <input type="text" class="form-control" id="tcno" placeholder="Tc No Giriniz..." name="tcno">
            </div>

            <div class="form-group">
                <label for="pwd">Ad:</label>
                <input type="text" class="form-control" id="ad" placeholder="Ad Giriniz..." name="ad">
            </div>
            <div class="form-group">
                <label for="pwd">Soyad:</label>
                <input type="text" class="form-control" id="syd" placeholder="Soyad Giriniz..." name="syd">
            </div>

            <div class="form-group">
                <label for="pwd">Doğum Yılı:</label>
                <input type="text" class="form-control" id="dgmyl" placeholder="1990" name="dgmyl">
            </div>

            <button type="submit" class="btn btn-default">Kontrol Et</button>
        </form>
    </div>

    <?php
    $client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");

    try {

        if (@$_GET["tcno"] != "") {
            $sonuc = $client->TCKimlikNoDogrula([
                'TCKimlikNo' => $_GET["tcno"],
                'Ad' => $_GET["ad"],
                'Soyad' => $_GET["syd"],
                'DogumYili' => $_GET["dgmyl"]
            ]);

            if ($sonuc->TCKimlikNoDogrulaResult) {
                echo 'T.C. Kimlik No Doğru';
            } else {
                echo 'T.C. Kimlik No Hatalı';
            }
        }
    } catch (Exception $e) {
        echo $e->faultstring;
    }
    ?>
</body>
</html>
