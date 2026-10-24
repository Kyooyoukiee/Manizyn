<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manizyn membantu kamu melihat sisi kece, sehat, dan produktif lewat analisa santai.">
    <title>Manizyn — Cek Aura Kamu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-shell landing-page">
    <div class="page-glow page-glow--one" aria-hidden="true"></div>
    <div class="page-glow page-glow--two" aria-hidden="true"></div>

    <header class="site-header">
        <a class="brand" aria-label="Manizyn, halaman utama">
            <span class="brand-mark"><x-icon name="logo" aria-hidden="true" /></span>
            <span>manizyn</span>
        </a>
        <span class="header-status"><span class="status-dot"></span> Analisa santai</span>
    </header>

    <main class="intake-layout">
        <section class="hero-panel" aria-labelledby="page-title">
            <p class="eyebrow"><x-icon name="sparkle" class="eyebrow-spark" aria-hidden="true" /> Kenali vibe kamu</p>
            <h1 id="page-title">Seberapa <em>kece</em> kamu hari ini?</h1>
            <p class="hero-copy">Jawab beberapa hal kecil tentang rutinitasmu. Kami akan meracik skor aura, kesehatan, dan produktivitasmu.</p>

            <div class="hero-points" aria-label="Manfaat analisa">
                <div class="hero-point">
                    <span class="point-icon"><x-icon name="user-check" aria-hidden="true" /></span>
                    <span>Hasil personal</span>
                </div>
                <div class="hero-point">
                    <span class="point-icon"><x-icon name="smile" aria-hidden="true" /></span>
                    <span>100% santai</span>
                </div>
                <div class="hero-point">
                    <span class="point-icon"><x-icon name="arrow-up-right" aria-hidden="true" /></span>
                    <span>Kurang dari 1 menit</span>
                </div>
            </div>

            <div class="hero-orbit" aria-hidden="true">
                <x-icon name="sparkle" class="orbit-center" aria-hidden="true" />
                <span class="orbit-dot orbit-dot--pink"></span>
                <span class="orbit-dot orbit-dot--yellow"></span>
                <span class="orbit-dot orbit-dot--blue"></span>
            </div>
        </section>

        <section class="analyzer-card" aria-labelledby="form-title">
            <div class="card-heading">
                <div>
                    <p class="section-kicker">Mulai dari sini</p>
                    <h2 id="form-title">Cerita sedikit tentang kamu</h2>
                </div>
                <span class="step-count">01 <span>/ 01</span></span>
            </div>

            <form action="/analisis" method="POST" novalidate>
                @csrf

                <div class="form-grid">
                    <div class="field field--wide">
                        <label for="nama">Siapa nama kamu?</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama kamu" class="form-input" autocomplete="name" @error('nama') aria-invalid="true" aria-describedby="nama-error" @enderror>
                        @error('nama')
                            <p id="nama-error" class="field-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="umur">Umur kamu</label>
                        <input type="number" id="umur" name="umur" value="{{ old('umur') }}" placeholder="Umur kamu" class="form-input" min="1" inputmode="numeric" @error('umur') aria-invalid="true" aria-describedby="umur-error" @enderror>
                        @error('umur')
                            <p id="umur-error" class="field-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="hobi">Hobi andalan</label>
                        <div class="custom-select" data-select>
                            <select id="hobi" name="hobi" class="form-input form-select" @error('hobi') aria-invalid="true" aria-describedby="hobi-error" @enderror>
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
                            </select>
                        </div>
                        @error('hobi')
                            <p id="hobi-error" class="field-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="jam_tidur">Jam tidur per hari</label>
                        <div class="input-with-unit">
                            <input type="number" id="jam_tidur" name="jam_tidur" value="{{ old('jam_tidur') }}" placeholder="Jam tidur" class="form-input" min="1" max="24" inputmode="numeric" @error('jam_tidur') aria-invalid="true" aria-describedby="jam-tidur-error" @enderror>
                            <span>jam</span>
                        </div>
                        @error('jam_tidur')
                            <p id="jam-tidur-error" class="field-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="jam_hp">Jam main HP per hari</label>
                        <div class="input-with-unit">
                            <input type="number" id="jam_hp" name="jam_hp" value="{{ old('jam_hp') }}" placeholder="Jam bermain hp" class="form-input" min="1" max="24" inputmode="numeric" @error('jam_hp') aria-invalid="true" aria-describedby="jam-hp-error" @enderror>
                            <span>jam</span>
                        </div>
                        @error('jam_hp')
                            <p id="jam-hp-error" class="field-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field field--wide">
                        <label for="sifat">Kalau kata teman, kamu itu...</label>
                        <div class="custom-select" data-select>
                            <select id="sifat" name="sifat" class="form-input form-select" @error('sifat') aria-invalid="true" aria-describedby="sifat-error" @enderror>
                                <option value="" disabled @selected(! old('sifat'))>Pilih sifat kamu</option>
                                <option value="baik" @selected(old('sifat') === 'baik')>Baik</option>
                                <option value="jahat" @selected(old('sifat') === 'jahat')>Jahat</option>
                                <option value="pemalu" @selected(old('sifat') === 'pemalu')>Pemalu</option>
                                <option value="pemberani" @selected(old('sifat') === 'pemberani')>Pemberani</option>
                                <option value="cerdas" @selected(old('sifat') === 'cerdas')>Cerdas</option>
                                <option value="humoris" @selected(old('sifat') === 'humoris')>Humoris</option>
                            </select>
                        </div>
                        @error('sifat')
                            <p id="sifat-error" class="field-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <fieldset class="choice-field" @error('suka_olahraga') aria-describedby="olahraga-error" @enderror>
                    <legend>Seberapa dekat kamu dengan olahraga?</legend>
                    <div class="choice-grid">
                        <label class="choice-card">
                            <input type="radio" name="suka_olahraga" value="ya" @checked(old('suka_olahraga') === 'ya')>
                            <span class="choice-emoji"><x-icon name="bolt" aria-hidden="true" /></span>
                            <span><strong>Sering</strong><small>Gas terus!</small></span>
                        </label>
                        <label class="choice-card">
                            <input type="radio" name="suka_olahraga" value="jarang" @checked(old('suka_olahraga') === 'jarang')>
                            <span class="choice-emoji"><x-icon name="sun" aria-hidden="true" /></span>
                            <span><strong>Jarang</strong><small>Sesekali saja</small></span>
                        </label>
                        <label class="choice-card">
                            <input type="radio" name="suka_olahraga" value="tidak" @checked(old('suka_olahraga') === 'tidak')>
                            <span class="choice-emoji"><x-icon name="cloud" aria-hidden="true" /></span>
                            <span><strong>Belum</strong><small>Tim rebahan</small></span>
                        </label>
                    </div>
                    @error('suka_olahraga')
                        <p id="olahraga-error" class="field-error" role="alert">{{ $message }}</p>
                    @enderror
                </fieldset>

                <button class="submit-button" type="submit">
                    <span>Bedah aura aku</span>
                    <x-icon name="arrow-right" aria-hidden="true" />
                </button>
                <p class="privacy-note">Data ini cuma dipakai untuk analisa kamu di halaman ini.</p>
            </form>
        </section>
    </main>
</body>
</html>
