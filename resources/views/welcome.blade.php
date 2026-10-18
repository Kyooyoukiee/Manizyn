<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manizyn</title>
</head>
<body>
    <h1>Selamat datang di website Manizyn</h1>
    <p>Website untuk menganalisis seberapa ganteng dan kece kamu</p><br>
    <form action="/analisis" method="POST" novalidate>
        @csrf
        Masukkan nama kamu:
        <br><input type="text" name="nama" placeholder="Nama kamu"><br>
        @error('nama')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Masukkan umur kamu:
        <br><input type="text" name="umur" placeholder="Umur kamu"><br>
        @error('umur')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Pilih Hobi kamu: 
        <br><select name="hobi">
            <option value="" disabled selected>Pilih hobi kamu</option>
            <option value="membaca">Membaca</option>
            <option value="menulis">Menulis</option>
            <option value="bermain_game">Bermain Game</option>
            <option value="olahraga">Olahraga</option>
            <option value="musik">Musik</option>
            <option value="memasak">Memasak</option>
            <option value="programming">Programming</option>
            <option value="editing">Editing</option>
            <option value="desain">Desain</option>
            <option value="fotografi">Fotografi</option>
            <option value="videografi">Videografi</option>
        </select><br>
        @error('hobi')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Berapa jam kamu tidur dalam sehari: 
        <br><input type="text" name="jam_tidur" placeholder="Jam tidur"><br>
        @error('jam_tidur')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Berapa jam kamu bermain hp dalam sehari:
        <br><input type="text" name="jam_hp" placeholder="Jam bermain hp"><br>
        @error('jam_hp')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Sifat kamu: 
        <br><select name="sifat">
            <option value="" disabled selected>Pilih sifat kamu</option>
            <option value="baik">Baik</option>
            <option value="jahat">Jahat</option>
            <option value="pemalu">Pemalu</option>
            <option value="pemberani">Pemberani</option>
            <option value="cerdas">Cerdas</option>
            <option value="humoris">Humoris</option>
        </select><br>
        @error('sifat')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Apakah kamu suka olahraga:
        <br><input type="radio" name="suka_olahraga" value="ya"> Ya
        <input type="radio" name="suka_olahraga" value="tidak"> Tidak
        <input type="radio" name="suka_olahraga" value="jarang"> Jarang
        <br>
        @error('suka_olahraga')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <input type="submit" value="Analisis Sekarang">
    </form>
</body>
</html>




