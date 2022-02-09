<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CidadesTableSeeder extends Seeder
{

    public function run(){
        DB::table('cidades')->truncate();
    }
}
