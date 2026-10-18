<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Analisa</title>
</head>
<body>
    <h1>Hasil Analisa</h1>
    <p>Yoo haloo {{ $data['nama'] }}</p>
    <hr>

    <h2>Kesimpulan yang diambil oleh sistem adalah</h2>
    <p>{{ $kesimpulan }}</p>
    <hr>

    <h2>Skor yang didapatkan</h2>
    <p>Skor Kece: {{ $skorKece }}</p>
    <p>Skor Ganteng: {{ $skorGanteng }}</p>
    <p>Skor Sehat: {{ $skorSehat }}</p>
    <p>Skor Produktif: {{ $skorProduktif }}</p>
    <p>Skor Rebahan: {{ $skorRebahan }}</p>
    <p>Skor Sosial: {{ $skorSosial }}</p>
    <hr>

    <h2>Kategori yang didapatkan</h2>
    <p>{{ $kategori }}</p>
    <hr>

    <h2>Komentar dari sistem</h2>
    <ul>
        @foreach ($komentar as $komentarItem)
            <li>{{ $komentarItem }}</li>
        @endforeach
    </ul>
    <br>
    <a href="/">Analisa ulang</a>
</body>
</html>