<?php

use Illuminate\Database\Seeder;

class KegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('kegiatans')->insert([
          [
          'title' => 'reuni',
          'color' => '#c40233',
          'description' => 'Reuni Klien',
          'start_date' => '2020-04-24 21:30:00',
          'end_date' => '2020-04-25 21:30:00',
        ],
        [
        'title' => 'asljdflasdf',
        'color' => '#c29fdf2',
        'description' => 'asdjfklas Klien',
        'start_date' => '2020-04-02 21:30:00',
        'end_date' => '2020-04-04 21:30:00',
      ],
      ]);
    }
}
