<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;
use Faker\Factory;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $contato = new SiteContato();

      // $contato->nome = "Sistema SG";
      // $contato->telefone = "16993986525";
      // $contato->email = "contatosg@sg.com";
      // $contato->motivo_contato = 1;
      // $contato->mensagem = "Olá, vocês são feras. Parabéns!";

      // $contato->save();

      $contato->factory()->count(250)->create();
    }
}
