<?php

test('retains submitted values when a required field is missing', function () {
    $this->from('/')->post('/analisis', [
        'nama' => 'Budi',
        'umur' => '17',
        'hobi' => 'musik',
        'jam_tidur' => '8',
        'sifat' => 'pemberani',
        'suka_olahraga' => 'jarang',
    ])->assertRedirect('/')
        ->assertSessionHasErrors('jam_hp');

    $response = $this->get('/');

    $response->assertOk()
        ->assertSee('name="nama" value="Budi" placeholder="Nama kamu"', false)
        ->assertSee('name="umur" value="17" placeholder="Umur kamu"', false)
        ->assertSee('<option value="musik" selected>Musik</option>', false)
        ->assertSee('name="jam_tidur" value="8" placeholder="Jam tidur"', false)
        ->assertSee('<option value="pemberani" selected>Pemberani</option>', false)
        ->assertSee('value="jarang" checked', false);
});
