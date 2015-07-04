<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'David Smith', 'email' => 'david@codium.com.au', 'password' => Hash::make('david')]
        ]);
    }
}
