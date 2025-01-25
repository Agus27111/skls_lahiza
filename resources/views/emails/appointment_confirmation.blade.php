<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pendaftaran</title>
</head>
<body>
    <h1>Halo, {{ $userData['name'] }}!</h1>
    <p>Terima kasih telah mendaftar.</p>
    <p>Berikut adalah detail data yang telah Anda kirimkan:</p>

    <ul>
        <li><strong>Nama:</strong> {{ $userData['name'] }}</li>
        <li><strong>Nomor Telepon:</strong> {{ $userData['phone_number'] }}</li>
        <li><strong>Jenis Kelamin:</strong> {{ $userData['gender'] }}</li>
        <li><strong>Tanggal Lahir:</strong> {{ $userData['date_of_birth'] }}</li>
        <li><strong>Tempat Lahir:</strong> {{ $userData['birth_place'] }}</li>
        <li><strong>Alamat:</strong> {{ $userData['address'] }}</li>
        <li><strong>Nama Ayah:</strong> {{ $userData['father'] }}</li>
        <li><strong>Nama Ibu:</strong> {{ $userData['mother'] }}</li>
        <li><strong>Email:</strong> {{ $userData['email'] }}</li>
        <li><strong>Produk yang Dipilih:</strong> {{ $userData['product_name'] }}</li>
    </ul>

    <p>Jika ada kesalahan pada data ini, silakan hubungi kami.</p>
    <p>Salam,</p>
    <p><strong>Tim Kami</strong></p>
</body>
</html>
