<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Disabilita as chaves estrangeiras para dar o truncate sem problemas.
        Schema::disableForeignKeyConstraints();
        DB::table('postos')->truncate();
        DB::table('cidades')->truncate();
        //Reativa chaves
        Schema::enableForeignKeyConstraints();


        //Cria dados fakes
         \App\Models\ModelCidades::factory(51)->create();
         \App\Models\ModelPostos::factory(100)->create();

    }
}
