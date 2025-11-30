<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // CURSO
            ["name" => "dieta.index"],      // 1
            ["name" => "dieta.create"],     // 2
            ["name" => "dieta.show"],       // 3
            ["name" => "dieta.edit"],       // 4
            ["name" => "dieta.delete"],     // 5
            // ALUNO
            ["name" => "paciente.index"],      // 6
            ["name" => "paciente.create"],     // 7
            ["name" => "paciente.show"],       // 8
            ["name" => "paciente.edit"],       // 9
            ["name" => "paciente.delete"],     // 10
        ];
        DB::table('resources')->insert($data);
    }
}
