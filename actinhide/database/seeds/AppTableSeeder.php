<?php

use Illuminate\Database\Seeder;

class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app')->insert([
            'name'        => 'LinkPress',
            'description' => 'URL Shortener and Link Management Platform',
            'disqus'      => 'amaxila',
            'ad'          => 'LinkPress | The Ultimate Link Management Platform',
        ]);
    }
}
