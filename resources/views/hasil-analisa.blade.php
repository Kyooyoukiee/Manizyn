<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hasil analisa aura Manizyn.">
    <title>Hasil Analisa — Manizyn</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-shell result-page">
    <div class="page-glow page-glow--one" aria-hidden="true"></div>
    <div class="page-glow page-glow--two" aria-hidden="true"></div>

    <header class="site-header">
        <a class="brand" aria-label="Manizyn, halaman utama">
            <span class="brand-mark"><x-icon name="logo" aria-hidden="true" /></span>
            <span>manizyn</span>
        </a>
    </header>

    @php
        $scores = [
            ['label' => 'Kece', 'score' => $skorKece, 'icon' => 'sparkle', 'tone' => 'pink'],
            ['label' => 'Ganteng', 'score' => $skorGanteng, 'icon' => 'badge', 'tone' => 'purple'],
            ['label' => 'Sehat', 'score' => $skorSehat, 'icon' => 'heart', 'tone' => 'green'],
            ['label' => 'Produktif', 'score' => $skorProduktif, 'icon' => 'chart', 'tone' => 'yellow'],
            ['label' => 'Rebahan', 'score' => $skorRebahan, 'icon' => 'cloud', 'tone' => 'blue'],
            ['label' => 'Sosial', 'score' => $skorSosial, 'icon' => 'users', 'tone' => 'orange'],
        ];
    @endphp

    <main class="result-layout">
        <section class="result-intro" aria-labelledby="result-title">
            <p class="eyebrow"><x-icon name="sparkle" class="eyebrow-spark" aria-hidden="true" /> Hasilnya sudah masuk</p>
            <h1 id="result-title">Halo, {{ $data['nama'] }}.<br><em>Aura kamu terbaca.</em></h1>
            <p>Ini rangkuman dari kebiasaan yang kamu ceritakan. Anggap saja sebagai pengingat kecil untuk versi terbaikmu.</p>
        </section>

        <section class="result-summary" aria-labelledby="summary-title">
            <div class="summary-symbol"><x-icon name="sparkle" aria-hidden="true" /></div>
            <p class="section-kicker">Kategori kamu</p>
            <h2 id="summary-title">{{ $kategori }}</h2>
            <div class="summary-line"></div>
            <p class="summary-conclusion"><span>Kesimpulan sistem</span>{{ $kesimpulan }}</p>
        </section>

        <section class="scores-section" aria-labelledby="scores-title">
            <div class="section-heading-row">
                <div>
                    <p class="section-kicker">Radar karakter</p>
                    <h2 id="scores-title">Skor kamu</h2>
                </div>
                <span class="score-caption">dari 100 poin</span>
            </div>

            <div class="score-grid">
                @foreach ($scores as $score)
                    <article class="score-card score-card--{{ $score['tone'] }}">
                        <div class="score-card-top">
                            <span class="score-icon"><x-icon :name="$score['icon']" aria-hidden="true" /></span>
                            <span class="score-number">{{ $score['score'] }}</span>
                        </div>
                        <h3>{{ $score['label'] }}</h3>
                        <div class="score-track" role="progressbar" aria-label="Skor {{ $score['label'] }}" aria-valuenow="{{ $score['score'] }}" aria-valuemin="0" aria-valuemax="100">
                            <span style="--score: {{ $score['score'] }}%"></span>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="comments-section" aria-labelledby="comments-title">
            <div class="comments-heading">
                <p class="section-kicker">Catatan buat kamu</p>
                <h2 id="comments-title">Dari sistem, dengan santai</h2>
            </div>
            <ul class="comment-list">
                @foreach ($komentar as $komentarItem)
                    <li><span><x-icon name="sparkle" aria-hidden="true" /></span><p>{{ $komentarItem }}</p></li>
                @endforeach
            </ul>
        </section>

        <div class="result-cta">
            <div>
                <p class="section-kicker">Masih penasaran?</p>
                <h2>Coba lagi dengan vibe yang berbeda.</h2>
            </div>
            <a class="submit-button submit-button--link" href="/">Analisa ulang <x-icon name="arrow-right" aria-hidden="true" /></a>
        </div>
    </main>
</body>
</html>
