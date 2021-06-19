<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['status' => 'Dalam Proses'],
            ['status' => 'Diterima'],
            ['status' => 'Ditolak']
        ]);
    }
}
