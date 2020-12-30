<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Mizan',
            'email' => 'mizan@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$VktB4exJSDaAn0H98m8PH.ziGSJIuxHW.33OOLj.u4EDQq4ZDLNfC', // 12345678
            'role'=>1,
            'remember_token' => Str::random(10),
        ]);
    }
}
