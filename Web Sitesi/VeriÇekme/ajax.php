<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formdan gelen verileri al
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $ogrenciNo = $_POST['ogrenciNo'];
    $bolum = $_POST['bolum'];
    $aciklama = $_POST['aciklama'];

    // Verileri birleştirerek bir metin oluştur
    $veriler = "<p>Ad: " . $ad . "</p>";
    $veriler .= "<p>Soyad: " . $soyad . "</p>";
    $veriler .= "<p>Öğrenci No: " . $ogrenciNo . "</p>";
    $veriler .= "<p>Bölüm: " . $bolum . "</p>";
    $veriler .= "<p>Açıklama: " . $aciklama . "</p>";

    // Resmi oku ve base64 formatına dönüştür
    $resimData = base64_encode(file_get_contents("UniLogo.png"));
    $resim = '<img src="data:image/png;base64,' . $resimData . '" alt="Logo">';

    // Verileri ve resmi birleştir
    $veriler .= $resim;

    // Verileri dosyaya kaydet
    file_put_contents("veriler.txt", $veriler);

    // Başarı durumunda bir yanıt gönder
    echo "Veriler başarıyla kaydedildi.";
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Kaydedilmiş verileri oku
    $veriler = file_get_contents("veriler.txt");

    // Eğer veri yoksa hata mesajı gönder
    if (empty($veriler)) {
        echo "Henüz veri kaydedilmemiş.";
    } else {
        // Kaydedilmiş verileri ekrana yazdır
        echo $veriler;
    }
}
?>
