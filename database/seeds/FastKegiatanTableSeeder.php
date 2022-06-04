<?php

use Illuminate\Database\Seeder;

class FastKegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \Illuminate\Support\Facades\DB::table('fast_kegiatans')->insert([
        [
        'title' => 'reuni',
        'color' => '#c40233',
        'start' => '11:30:00',
        'end' => '13:00:00',
      ],
      [
      'title' => 'asljdflasdf',
      'color' => '#c29fdf2',
      'start' => '18:30:00',
      'end' => '20:00:00',
    ],
    ]);
    }
}
