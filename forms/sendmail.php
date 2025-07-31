<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "sukardialamsyah7@gmail.com";
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";

    $body = "Nama: $name\nEmail: $email\n\nPesan:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Pesan berhasil dikirim.";
    } else {
        echo "Pesan gagal dikirim. Silakan coba lagi.";
    }
} else {
    echo "Metode pengiriman tidak valid.";
}
?>
