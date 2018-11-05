<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class speciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('species')->insert([
            'name' => 'Hutt',
            'description' => 'sentient'
        ]);

        DB::table('species')->insert([
            'name' => 'Trandoshan',
            'description' => 'reptile'
        ]);

        DB::table('species')->insert([
            'name' => 'Mon Calamari',
            'description' => 'amphibian'
        ]);

        DB::table('species')->insert([
            'name' => 'Ewok',
            'description' => 'mammal'
        ]);

        DB::table('species')->insert([
            'name' => 'Sullustan',
            'description' => 'sentient'
        ]);
    }
}
