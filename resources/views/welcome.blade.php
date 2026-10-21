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
        <br><input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama kamu"><br>
        @error('nama')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Masukkan umur kamu:
        <br><input type="text" name="umur" value="{{ old('umur') }}" placeholder="Umur kamu"><br>
        @error('umur')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Pilih Hobi kamu: 
        <br><select name="hobi">
            <option value="" disabled @selected(! old('hobi'))>Pilih hobi kamu</option>
            <option value="membaca" @selected(old('hobi') === 'membaca')>Membaca</option>
            <option value="menulis" @selected(old('hobi') === 'menulis')>Menulis</option>
            <option value="bermain_game" @selected(old('hobi') === 'bermain_game')>Bermain Game</option>
            <option value="olahraga" @selected(old('hobi') === 'olahraga')>Olahraga</option>
            <option value="musik" @selected(old('hobi') === 'musik')>Musik</option>
            <option value="memasak" @selected(old('hobi') === 'memasak')>Memasak</option>
            <option value="programming" @selected(old('hobi') === 'programming')>Programming</option>
            <option value="editing" @selected(old('hobi') === 'editing')>Editing</option>
            <option value="desain" @selected(old('hobi') === 'desain')>Desain</option>
            <option value="fotografi" @selected(old('hobi') === 'fotografi')>Fotografi</option>
            <option value="videografi" @selected(old('hobi') === 'videografi')>Videografi</option>
        </select><br>
        @error('hobi')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Berapa jam kamu tidur dalam sehari: 
        <br><input type="text" name="jam_tidur" value="{{ old('jam_tidur') }}" placeholder="Jam tidur"><br>
        @error('jam_tidur')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Berapa jam kamu bermain hp dalam sehari:
        <br><input type="text" name="jam_hp" value="{{ old('jam_hp') }}" placeholder="Jam bermain hp"><br>
        @error('jam_hp')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Sifat kamu: 
        <br><select name="sifat">
            <option value="" disabled @selected(! old('sifat'))>Pilih sifat kamu</option>
            <option value="baik" @selected(old('sifat') === 'baik')>Baik</option>
            <option value="jahat" @selected(old('sifat') === 'jahat')>Jahat</option>
            <option value="pemalu" @selected(old('sifat') === 'pemalu')>Pemalu</option>
            <option value="pemberani" @selected(old('sifat') === 'pemberani')>Pemberani</option>
            <option value="cerdas" @selected(old('sifat') === 'cerdas')>Cerdas</option>
            <option value="humoris" @selected(old('sifat') === 'humoris')>Humoris</option>
        </select><br>
        @error('sifat')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        Apakah kamu suka olahraga:
        <br><input type="radio" name="suka_olahraga" value="ya" @checked(old('suka_olahraga') === 'ya')> Ya
        <input type="radio" name="suka_olahraga" value="tidak" @checked(old('suka_olahraga') === 'tidak')> Tidak
        <input type="radio" name="suka_olahraga" value="jarang" @checked(old('suka_olahraga') === 'jarang')> Jarang
        <br>
        @error('suka_olahraga')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <input type="submit" value="Analisis Sekarang">
    </form>
</body>
</html>



