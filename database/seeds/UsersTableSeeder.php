<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['username' => 'Atlas一郎',
            'mail' => 'atlas-ichirou@gmail.com',
            'password' => 'atlasichirou01',
            'bio' => 'Atlas一郎です。']
        ]);
    }
}
