<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    public function analisis(Request $request)
    {
        //1. Validasi input
        $data = $request->validate([
            'nama' => 'required|alpha|max:255',
            'umur' => 'required|integer|min:1',
            'hobi' => 'required',
            'jam_tidur' => 'required|integer|min:1|max:24',
            'jam_hp' => 'required|integer|min:1|max:24',
            'sifat' => 'required',
            'suka_olahraga' => 'required|in:ya,tidak,jarang',
        ], 
        [
            'nama.required' => 'Nama harus diisi.',
            'nama.alpha' => 'Nama hanya boleh berisi huruf saja.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'umur.required' => 'Umur harus diisi.',
            'umur.integer' => 'Umur harus berupa angka.',
            'umur.min' => 'Umur harus lebih dari 0.',
            'hobi.required' => 'Hobi harus dipilih.',
            'jam_tidur.required' => 'Jam tidur harus diisi.',
            'jam_tidur.integer' => 'Jam tidur harus berupa angka.',
            'jam_tidur.min' => 'Jam tidur harus lebih dari 0.',
            'jam_tidur.max' => 'Jam tidur tidak boleh lebih dari 24 jam.',
            'jam_hp.required' => 'Jam bermain HP harus diisi.',
            'jam_hp.integer' => 'Jam bermain HP harus berupa angka.',
            'jam_hp.min' => 'Jam bermain HP harus lebih dari 0.',
            'jam_hp.max' => 'Jam bermain HP tidak boleh lebih dari 24 jam.',
            'sifat.required' => 'Sifat harus dipilih.',
            'suka_olahraga.required' => 'Harap pilih apakah suka olahraga atau tidak.',
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
        if ($data['jam_tidur']>=7 && $data['jam_tidur']<=9) {
            $skorSehat += 20;
            $komentar[] = "Kamu tidur cukup, itu bagus untuk kesehatanmu.";
        } elseif ($data['jam_tidur']<=7) {
            $skorSehat -= 20;
            $komentar[] = "Kamu kurang tidur, itu tidak baik untuk kesehatanmu.";
        } else {
            $skorSehat -= 20;
            $komentar[] = "Kamu tidur terlalu lama, itu bisa berdampak negatif pada kesehatanmu.";
        }

        if ($data['suka_olahraga'] == 'ya') {
            $skorSehat += 20;
            $skorKece += 10;
            $skorGanteng += 10;
            $komentar[] = "Kamu suka olahraga, itu bagus untuk kesehatanmu.";
        } elseif ($data['suka_olahraga'] == 'jarang') {
            $skorSehat -= 5;
            $skorRebahan += 5;
            $komentar[] = "Kamu jarang olahraga, itu bisa berdampak negatif pada kesehatanmu.";
        } else {
            $skorSehat -= 10;
            $skorRebahan += 10;
            $komentar[] = "Kamu tidak suka olahraga, itu bisa berdampak negatif pada kesehatanmu.";
        }

        //4. Menganalisa bermain hp
        if ($data['jam_hp']>=12) {
            $skorProduktif -= 20;
            $skorRebahan += 20;
            $komentar[] = "Kamu terlalau banyak bermain hp dalam sehari, ini bisa membuat kamu malas dan tidak produktif.";
        } elseif ($data['jam_hp']>=6) {
            $skorProduktif -= 10;
            $skorRebahan +=10;
            $komentar[] = "Kamu bermain hp cukup banyak dalam sehari, tapi masih bisa di kendalikan";
        } elseif($data['jam_hp']<=5) {
            $skorProduktif += 10;
            $skorRebahan -= 10;
            $komentar[] = "Kamu bermain hp cukup sedikit dalam sehari, itu membuatmu lebih produktif dan tidak malas";
        }

        //5. Menganalisa hobi
        if ($data['hobi'] == 'membaca') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif += 20;
            $komentar[] = "Hobi membaca bagus untuk meningkatkan pengetahuan kamu loh";
        } elseif ($data['hobi'] == 'menulis') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif += 20;
            $komentar[] = "Menulis itu bagus untuk memperbagus tulisan kamu dan meningkatkan pengetahuan juga";
        } elseif ($data['hobi'] == 'bermain_game') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif -= 10;
            $skorRebahan += 10;
            $skorSosial += 5;
            $komentar[] = "Bermain game itu bagus untuk menghibur saja, tapi jangan berlebihan";
        } elseif ($data['hobi'] == 'olahraga') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorSehat += 20;
            $skorProduktif += 20;
            $komentar[] = "Olahraga itu bagus untuk kesehatan kamu loh, jangan lupa untuk tetap menjaga pola makan juga ya";
        } elseif ($data['hobi'] == 'musik') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif += 20;
            $komentar[] = "Widih musisi nih";
        } elseif ($data['hobi'] == 'memasak') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif += 30;
            $komentar[] = "Hobi nya bagus nih bisa lah masuk ke lomba master chef";
        } elseif ($data['hobi'] == 'programming') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorProduktif += 10;
            $skorRebahan += 5;
            $komentar[] = "Buat project apa nih, mahal gak tuh?";
        } elseif ($data['hobi'] == 'editing') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorRebahan += 10;
            $skorProduktif +=15;
            $komentar[] = "Ngedit foto apa video tuhh, harganya brp?";
        } elseif ($data['hobi'] == 'desain') {
            $skorGanteng += 10;
            $skorKece += 10;
            $skorProduktif += 20;
            $skorRebahan += 10;
            $komentar[] = "Desain apa aja tuh, banyak kah?";
        } elseif ($data['hobi'] == 'fotografi') {
            $skorGanteng +=10;
            $skorKece += 10;
            $skorProduktif += 10;
            $skorSosial += 15;
            $skorRebahan -= 15;
            $skorSehat += 5;
            $komentar[] = "Ngefoto apa aja tuh bang? bagus gak hasilnya...";
        } elseif ($data['hobi'] == 'videografi') {
            $skorGanteng +=10;
            $skorKece += 10;
            $skorProduktif += 10;
            $skorSosial += 15;
            $skorRebahan -= 15;
            $skorSehat += 5;
            $komentar[] = "Widih videografer nihh mau buat film kah bang atau mau buat cinematic?";
        }

        //6. Kombinasi
        if ($data['hobi'] == 'bermain_game' && $data['jam_hp']>=8) {
            $skorRebahan += 30;
            $skorGanteng += 10;
            $skorKece += 10;
            $skorProduktif -= 10;
            $skorSosial += 10;
            $komentar[] = "Wihh ini main game lama amat emangnya udah rank apa bang?";
        }

        if ($data['hobi'] == 'programming' && $data['jam_tidur']<=5) {
            $skorProduktif += 20;
            $skorSehat -= 10;
            $skorKece += 5;
            $skorGanteng += 5;
            $komentar[] = "Walah buat apaan nih bang mahal keknya tuh sampai jam tidur pun endak diperhatikan";
        }

        if ($data['suka_olahraga'] == 'tidak' && $data['jam_hp']>=8 && $data['jam_tidur']<=5) {
            $skorSehat -= 20;
            $skorRebahan += 15;
            $skorGanteng -= 10;
            $skorKece -= 10;
            $skorProduktif -= 10;
            $komentar[] = "Wahh ini sih udah lumayan parah nih, masih sehat gak tuh badan";
        }
        //Untuk kombinasi lainnya masih dalam pemikiran, dan sebenarnya malas ngetik juga, wehee

        //7. Menganalisa sifat
        if ($data['sifat'] == 'baik') {
            $skorGanteng += 20;
            $skorKece += 10;
            $skorSosial += 15;
            $komentar[] = "Orang baik dapet banyak pahala loh udah itu dapet banyak teman lagi";
        } elseif ($data['sifat'] == 'jahat') {
            $skorGanteng -= 10;
            $skorKece -= 10;
            $skorSosial -= 15;
            $komentar[] = "Mau jadi villain apa gimana, nanti banyak yang tidak mau berteman dengan mu loh";
        } elseif ($data['sifat'] == 'pemalu') {
            $skorKece += 10;
            $skorGanteng += 10;
            $skorSosial -= 5;
            $komentar[] = "Jangan malu malu dong nanti kamu endak dapat teman atau sudah untuk bergaul";
        } elseif ($data['sifat'] == 'pemberani') {
            $skorGanteng += 10;
            $skorKece += 10;
            $skorSosial += 10;
            $komentar[] = "Wihh ada pemberani yang tidak takut apapun nih, pasti percaya dirinya kuatt";
        } elseif ($data['sifat'] == 'cerdas') {
            $skorGanteng += 10;
            $skorKece += 10;
            $skorSosial += 5;
            $komentar[] = "Widih ada orang cerdas nih";
        } elseif ($data['sifat'] == 'humoris') {
            $skorGanteng += 10;
            $skorKece += 10;
            $skorSosial += 20;
            $komentar[] = "Pasti bisa memberi hiburan kepada temannya, tapii ya kalau ada hal yang serius pasti dianggapnya lelucon";
        }

        //8. Membatasi skor
        $skorKece = max(0, min(100, $skorKece));
        $skorGanteng = max(0, min(100, $skorGanteng));
        $skorSehat = max(0, min(100, $skorSehat));
        $skorProduktif = max(0, min(100, $skorProduktif));
        $skorRebahan = max(0, min(100, $skorRebahan));
        $skorSosial = max(0, min(100, $skorSosial));

        //9. Membuat kategori skor
        if ($skorKece >=80 && $skorGanteng >=80 && $skorSehat >=80) {
            $kategori = "Paket lengkap sih ini auto jadi idaman banyak orang";
        } elseif ($skorKece >=70 && $skorGanteng >=70) {
            $kategori = "Kece dan ganteng sih";
        } elseif ($skorKece >=50 && $skorGanteng >=50) {
            $kategori = "Lumayan, tapi maybe lu harus upgrade dikit biar lebih kece dan ganteng";
        } elseif ($skorKece >=30 && $skorGanteng >=30) {
            $kategori = "Kurang kece dan ganteng nihh, harus upgrade deh";
        } else {
            $kategori = "Aduh gimana yahh ngomongnya, banyak nih yang kurang keknya harus upgrade deh";
        }

        //10. Kesimpulan
        if ($skorProduktif >=80 && $skorRebahan <=40 && $skorSosial >=60) {
            $kesimpulan = "Widihh rajin, suka bergaul sama teman, dan tidak malas nihh, ini baru bagus";
        } elseif ($skorProduktif >=50 && $skorRebahan <=50 && $skorSosial >=50) {
            $kesimpulan = "Yaa lumayan sih, tapi harus lebih rajin lagi dan jangan malas-malasan";
        } elseif ($skorProduktif <=50 && $skorRebahan >=60 && $skorSosial <=50) {
            $kesimpulan = "Wahh ini sih kurang produktif, suka malas-malasan, dan kurang bergaul sama teman";
        } elseif ($skorProduktif <=40 && $skorRebahan >=70) {
            $kesimpulan = "Walah keluar remuah woiii, minimal hirup udara dikit kek, jangan terlalu rebahan terus, nanti sakit lohh";
        } else {
            $kesimpulan = "Malas menanggapi";
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
