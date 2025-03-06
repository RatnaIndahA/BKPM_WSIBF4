<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data ke table pegawai 
        DB::table('detail_profil')->insert([
            'address'=>'Kediri',
            'nomor_tlp'=>'0812345',
            'ttl'=>'2005-01-01',
            'foto'=>'picture.png'
        ]);
}
}