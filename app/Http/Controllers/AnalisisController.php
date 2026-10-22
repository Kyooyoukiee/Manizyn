<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    public function analisis(Request $request)
    {
        //1. Validasi input
        $data = $request->validate([
            'nama' => ['required', 'regex:/^[\pL\s]+$/u', 'max:255'],
            'umur' => 'required|integer|min:1',
            'hobi' => 'required',
            'jam_tidur' => 'required|integer|min:1|max:24',
            'jam_hp' => 'required|integer|min:1|max:24',
            'sifat' => 'required',
            'suka_olahraga' => 'required|in:ya,tidak,jarang',
        ],
        [
            'nama.required' => 'Eits, namanya jangan dikosongin dong bro.',
            'nama.regex' => 'Namanya huruf doang ya, jangan pake angka atau simbol aneh-aneh.',
            'nama.max' => 'Buset, namanya panjang amat, maksimal 255 karakter ya.',
            'umur.required' => 'Umurnya diisi dulu dong, jangan malu-malu.',
            'umur.integer' => 'Umur itu angka bro, bukan huruf.',
            'umur.min' => 'Umur segitu mah belum lahir dong, minimal 1 ya.',
            'hobi.required' => 'Hobinya pilih dulu dong, masa gak punya hobi.',
            'jam_tidur.required' => 'Jam tidurnya isi dulu dong, jangan dikosongin.',
            'jam_tidur.integer' => 'Jam tidur itu angka ya, bukan huruf.',
            'jam_tidur.min' => 'Masa gak tidur sama sekali, minimal 1 jam lah.',
            'jam_tidur.max' => 'Sehari cuma 24 jam bro, jangan ngadi-ngadi.',
            'jam_hp.required' => 'Jam main HP-nya isi dulu dong, jujur aja gapapa.',
            'jam_hp.integer' => 'Jam main HP itu angka ya, bukan huruf.',
            'jam_hp.min' => 'Masa gak pernah pegang HP, minimal 1 jam lah.',
            'jam_hp.max' => 'Sehari cuma 24 jam bro, jangan ngadi-ngadi.',
            'sifat.required' => 'Sifatnya pilih dulu dong.',
            'suka_olahraga.required' => 'Suka olahraga gak nih? Pilih salah satu dulu ya.',
            'suka_olahraga.in' => 'Pilihan olahraganya gak valid nih, pilih yang tersedia aja ya.',
        ]
        );

        //2. Membuat nilai awal
        $skorKece = 50;
        $skorGanteng = 50;
        $skorSehat = 50;
        $skorProduktif = 50;
        $skorRebahan = 30;
        $skorSosial = 50;

        $komentar = [];

        //3. Menganalisa data sehat
        if ($data['jam_tidur'] >= 7 && $data['jam_tidur'] <= 9) {
            $skorSehat += 20;
            $komentar[] = "Jam tidurnya pas banget nih, badan fit mukapun glowing.";
        } elseif ($data['jam_tidur'] < 7) {
            $skorSehat -= 20;
            $komentar[] = "Kurang tidur nih bro, awas mata panda sama badan tumbang.";
        } else {
            $skorSehat -= 20;
            $komentar[] = "Tidurnya kebanyakan, bro. Hibernasi ya? Bangun dong, dunia nungguin.";
        }

        if ($data['suka_olahraga'] == 'ya') {
            $skorSehat += 20;
            $skorKece += 10;
            $skorGanteng += 10;
            $komentar[] = "Anak olahraga nih, badan sehat auto makin kece.";
        } elseif ($data['suka_olahraga'] == 'jarang') {
            $skorSehat -= 5;
            $skorRebahan += 5;
            $komentar[] = "Olahraganya jarang-jarang nih, yuk mulai rutin biar badan gak gampang loyo.";
        } else {
            $skorSehat -= 10;
            $skorRebahan += 10;
            $komentar[] = "Anti olahraga nih? Hati-hati, badan bisa protes lho.";
        }

        //4. Menganalisa bermain hp
        if ($data['jam_hp'] >= 12) {
            $skorProduktif -= 20;
            $skorRebahan += 20;
            $komentar[] = "Gila, HP-an seharian! Jempol gak pegel tuh? Awas jadi mager akut.";
        } elseif ($data['jam_hp'] >= 6) {
            $skorProduktif -= 10;
            $skorRebahan += 10;
            $komentar[] = "HP-annya lumayan lama nih, tapi masih aman lah, asal bisa ngerem.";
        } else {
            $skorProduktif += 10;
            $skorRebahan -= 10;
            $komentar[] = "Main HP-nya santai aja, mantap! Waktunya kepake buat hal yang lebih berguna.";
        }

        //5. Menganalisa hobi
        if ($data['hobi'] == 'membaca') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif += 20;
            $komentar[] = "Hobi baca buku, wawasannya luas pasti. Anak pintar nih.";
        } elseif ($data['hobi'] == 'menulis') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif += 20;
            $komentar[] = "Suka nulis nih, calon penulis terkenal? Jangan lupa kasih tanda tangan ya.";
        } elseif ($data['hobi'] == 'bermain_game') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif -= 10;
            $skorRebahan += 10;
            $skorSosial += 5;
            $komentar[] = "Gamers sejati nih. Seru sih, tapi jangan sampai lupa makan sama tidur ya.";
        } elseif ($data['hobi'] == 'olahraga') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorSehat += 20;
            $skorProduktif += 20;
            $komentar[] = "Hobinya olahraga, keren abis! Jangan lupa jaga pola makan juga biar makin kece.";
        } elseif ($data['hobi'] == 'musik') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif += 20;
            $komentar[] = "Widih, anak musik nih! Kapan bikin konser bro?";
        } elseif ($data['hobi'] == 'memasak') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif += 30;
            $komentar[] = "Jago masak nih, boleh dong dibawain bekal. Cocok banget ikut MasterChef!";
        } elseif ($data['hobi'] == 'programming') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif += 10;
            $skorRebahan += 5;
            $komentar[] = "Anak coding nih! Bikin project apa? Jangan lupa bagi-bagi cuan ya.";
        } elseif ($data['hobi'] == 'editing') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorRebahan += 10;
            $skorProduktif += 15;
            $komentar[] = "Editor handal nih! Ngedit foto atau video? Open jasa gak nih?";
        } elseif ($data['hobi'] == 'desain') {
            $skorGanteng += 10;
            $skorKece += 10;
            $skorProduktif += 20;
            $skorRebahan += 10;
            $komentar[] = "Jiwa seni tinggi nih, desainnya pasti estetik. Boleh minta dibikinin logo?";
        } elseif ($data['hobi'] == 'fotografi') {
            $skorGanteng += 10;
            $skorKece += 10;
            $skorProduktif += 10;
            $skorSosial += 15;
            $skorRebahan -= 15;
            $skorSehat += 5;
            $komentar[] = "Tukang foto nih! Hasil jepretannya pasti kece. Boleh dong dipamerin.";
        } elseif ($data['hobi'] == 'videografi') {
            $skorGanteng += 10;
            $skorKece += 10;
            $skorProduktif += 10;
            $skorSosial += 15;
            $skorRebahan -= 15;
            $skorSehat += 5;
            $komentar[] = "Videografer nih! Mau bikin film pendek atau konten sinematik? Gaspol bro.";
        }

        //6. Kombinasi
        if ($data['hobi'] == 'bermain_game' && $data['jam_hp'] >= 8) {
            $skorRebahan += 30;
            $skorGanteng += 10;
            $skorKece += 10;
            $skorProduktif -= 10;
            $skorSosial += 10;
            $komentar[] = "Wih mainnya lama amat! Udah rank apa nih? Jangan-jangan udah mythic glory.";
        }

        if ($data['hobi'] == 'programming' && $data['jam_tidur'] <= 5) {
            $skorProduktif += 20;
            $skorSehat -= 10;
            $skorKece += 5;
            $skorGanteng += 5;
            $komentar[] = "Ngoding sampe begadang gini, deadline atau emang hobi? Tidur dulu napa, bug-nya gak kabur kok.";
        }

        if ($data['suka_olahraga'] == 'tidak' && $data['jam_hp'] >= 8 && $data['jam_tidur'] <= 5) {
            $skorSehat -= 20;
            $skorRebahan += 15;
            $skorGanteng -= 10;
            $skorKece -= 10;
            $skorProduktif -= 10;
            $komentar[] = "Waduh, ini sih udah lampu merah bro. Gak olahraga, HP-an terus, kurang tidur. Badannya masih kuat gak tuh?";
        }
        //Untuk kombinasi lainnya masih dalam pemikiran, dan sebenarnya malas ngetik juga, wehee

        //7. Menganalisa sifat
        if ($data['sifat'] == 'baik') {
            $skorGanteng += 20;
            $skorKece += 10;
            $skorSosial += 15;
            $komentar[] = "Orang baik tuh pahalanya banyak, temennya juga banyak. Sip dah.";
        } elseif ($data['sifat'] == 'jahat') {
            $skorGanteng -= 10;
            $skorKece -= 10;
            $skorSosial -= 15;
            $komentar[] = "Mau jadi villain nih? Hati-hati, nanti pada ngejauh lho.";
        } elseif ($data['sifat'] == 'pemalu') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorSosial -= 5;
            $komentar[] = "Jangan malu-malu kucing dong, ayo kenalan sama banyak orang biar gak kesepian.";
        } elseif ($data['sifat'] == 'pemberani') {
            $skorGanteng += 10;
            $skorKece += 10;
            $skorSosial += 10;
            $komentar[] = "Wih, si paling berani nih! Pede-nya kebangetan, auto disegani.";
        } elseif ($data['sifat'] == 'cerdas') {
            $skorGanteng += 10;
            $skorKece += 10;
            $skorSosial += 5;
            $komentar[] = "Otak encer nih, pantes aja bikin kagum. Boleh dong minta contekan.";
        } elseif ($data['sifat'] == 'humoris') {
            $skorGanteng += 10;
            $skorKece += 10;
            $skorSosial += 20;
            $komentar[] = "Tukang ngelawak nih, pasti jadi mood booster. Tapi kalau lagi serius jangan dibecandain terus ya.";
        }

        //8. Membatasi skor
        $skorKece = max(0, min(100, $skorKece));
        $skorGanteng = max(0, min(100, $skorGanteng));
        $skorSehat = max(0, min(100, $skorSehat));
        $skorProduktif = max(0, min(100, $skorProduktif));
        $skorRebahan = max(0, min(100, $skorRebahan));
        $skorSosial = max(0, min(100, $skorSosial));

        //9. Membuat kategori skor
        if ($skorKece >= 80 && $skorGanteng >= 80 && $skorSehat >= 80) {
            $kategori = "Paket komplit nih! Kece, ganteng, sehat. Auto jadi idaman banyak orang.";
        } elseif ($skorKece >= 70 && $skorGanteng >= 70) {
            $kategori = "Kece badai dan ganteng maksimal, mantul bro!";
        } elseif ($skorKece >= 50 && $skorGanteng >= 50) {
            $kategori = "Lumayan sih, tapi di-upgrade dikit lagi biar makin kece dan ganteng.";
        } elseif ($skorKece >= 30 && $skorGanteng >= 30) {
            $kategori = "Masih kurang nih, gas upgrade diri dulu biar glow up.";
        } else {
            $kategori = "Aduh, gimana ya ngomongnya... Banyak yang perlu dibenahi nih, yuk glow up dari sekarang.";
        }

        //10. Kesimpulan
        if ($skorProduktif >= 80 && $skorRebahan <= 40 && $skorSosial >= 60) {
            $kesimpulan = "Widih, rajin, gaul, anti mager! Ini baru role model sejati.";
        } elseif ($skorProduktif >= 50 && $skorRebahan <= 50 && $skorSosial >= 50) {
            $kesimpulan = "Lumayan lah, tapi masih bisa lebih rajin lagi. Kurangin rebahan dikit.";
        } elseif ($skorProduktif >= 50 && $skorRebahan >= 60 && $skorSosial <= 50) {
            $kesimpulan = "Waduh, mager level dewa, produktivitas nol, jarang gaul pula. Yuk bangkit bro.";
        } elseif ($skorProduktif <= 40 && $skorRebahan >= 70 && $skorSosial <= 40) {
            $kesimpulan = "Astaga, rebahan terus kayak kasur jadi sahabat sejati! Keluar rumah gih, hirup udara segar dikit, biar gak lumutan.";
        } else {
            $kesimpulan = "Hmm, susah dikategoriin nih. Pokoknya santuy aja, hidup lu hidup lu.";
        }

        //11. Mengirim data ke view
        return view('hasil-analisa')->with([
            'data' => $data,
            'skorKece' => $skorKece,
            'skorGanteng' => $skorGanteng,
            'skorSehat' => $skorSehat,
            'skorProduktif' => $skorProduktif,
            'skorRebahan' => $skorRebahan,
            'skorSosial' => $skorSosial,
            'komentar' => $komentar,
            'kategori' => $kategori,
            'kesimpulan' => $kesimpulan,
        ]);
    }
}