<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CDietaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["nome" => "CUTTING", "objetivo" => "perder gordura"],
            ["nome" => "BULKING", "objetivo" => "ganhar massa muscular"],
        ];
        DB::table('dietas')->insert($data);
    }
}
