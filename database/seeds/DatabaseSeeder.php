<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);

        //Import the companies
        \DB::unprepared(file_get_contents("companies.sql"));


        \DB::table('rewards')->insert([
            ['name' => '$10 Amazon Gift Voucher'],
            ['name' => '$20 Amazon Gift Voucher'],
            ['name' => '$50 Amazon Gift Voucher'],
            ['name' => '$100 Amazon Gift Voucher'],
            ['name' => '$200 Amazon Gift Voucher']

        ]);

        Model::reguard();
    }
}
