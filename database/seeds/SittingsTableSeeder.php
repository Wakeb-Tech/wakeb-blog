<?php

use Illuminate\Database\Seeder;

class SittingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
			'main_lang'=>'ar',
      		'sitename_ar'=>'مدونة | واكب',
      		'sitename_en'=>'Wakeb | Blog',
      		'icon'=>'favicon.ico',
      		'logo'=>'wakeb.png',
       ]);
    }
}
