<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HarikerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('harikerjas')->insert([
           'jumlah_harikerja'=> 26,
       ]);
    }
}
