<?php

use App\Models\Creche;
use App\Models\Hospedagem;
use App\Models\PacoteCreche;
use App\Models\Pet;
use App\Models\Tutor;
use App\User;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Fillipe Kenzo',
            'email'     => 'fillipe@email.com',
            'password'  => bcrypt('12345678'),
            'tipoUsuario' => 'admin',
        ]);
        Tutor::create([
            'nome'      => 'Amanda Rodrigues',
            'cpf'     => '00011122233',
            'telefone'  => '67992665451',
            'endereco' => 'Rua das Palmeiras, 22',
            'instagram' => 'amanda_r',
            'facebook' => 'amanda.r',
            'foto' => 'http://localhost:8000/storage/tutors/AmandaRodrigues.jpeg',
            'status' => 'ativo',
        ]);

        Pet::create([
            'nome'      => 'Rex',
            'raca'     => 'Boxer',
            'peso'  => 34.5,
            'foto' => 'http://localhost:8000/storage/pets/Rex.jpeg',
            'status' => 'ativo',
            'tutor_id' => 1,
        ]);

        PacoteCreche::create([
            'descricao'      => 'Porte pequeno',
            'valor_mensal'     => 299.90,
            'porte'  => 'P',
        ],
        [
            'descricao'      => 'Porte médio',
            'valor_mensal'     => 399.90,
            'porte'  => 'M',
        ],
        [
            'descricao'      => 'Porte grande',
            'valor_mensal'     => 499.90,
            'porte'  => 'G',
        ]);

        Creche::create([
            'data'      => '2019-03-12',
            'observacoes'     => 'Cuidar bem do Rex',
            'pet_id'  => 1,
            'user_id'  => 1,
            'pacoteCreche_id'  => 1,
            'status' => 'ativo',
        ]);

        Hospedagem::create([
            'data_entrada'      => '2019-03-12 11:12:13',
            'valor_diaria'      => 99.90,
            'observacoes'     => 'Cuidar bem do Rex',
            'pet_id'  => 1,
            'user_id'  => 1,
            'status' => 'ativo',
        ]);
    }
}
