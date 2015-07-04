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

        \DB::table('user_rewards')->insert([
            ['user_id' => 1, 'company_id' => 1, 'reward_id' => 1, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['user_id' => 1, 'company_id' => 2, 'reward_id' => 3, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['user_id' => 1, 'company_id' => 3, 'reward_id' => 2, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
        ]);

        \DB::table('survey_results')->insert([
            ['user_id' => 1, 'company_id' => 1, 'rating' => 9, 'note' => 'Very good service!'],
            ['user_id' => 1, 'company_id' => 1, 'rating' => 9, 'note' => 'hfgyewugfyefuysdbfbjds bf hjdshfbdhsjf dbshfbhdsfhfvhjdsvhfsvhfvdsvfv sgfgdvs g fvdsgfvghsd']
        ]);

        \DB::table('referrals')->insert([
            ['first_name' => 'David', 'surname' => 'Smith', 'email' => 'david@codium.com.au', 'slug' => 'wegydsg']
        ]);

        \DB::table('surveyresult_referals')->insert([
            ['surveyresult_id' => 1, 'referal_id' => 1]
        ]);

        \DB::table('companies')->whereIn('id', [1,2,3,4])->update(['featured' => 1]);

        Model::reguard();
    }
}
