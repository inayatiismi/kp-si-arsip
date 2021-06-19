<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_surat')->insert([
            ['jenis' => 'Surat Masuk'],
            ['jenis' => 'Surat Keluar']
        ]);
    }
}
