<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        Classroom::create([
            'name' => 'Aula 101',
            'location' => 'Edificio A, Piso 1',
            'capacity' => 30,
        ]);

        Classroom::create([
            'name' => 'Aula 202',
            'location' => 'Edificio B, Piso 2',
            'capacity' => 25,
        ]);
    }
}
