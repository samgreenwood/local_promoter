<?php

namespace LocalPromoter\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use LocalPromoter\Company;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';
    protected $company;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sets = \Excel::load(storage_path('unleashed1liquorandgaminglicences.xlsx'))->get()->toArray();
        $companies = [];
        foreach($sets as $set) {
            foreach ($set as $list) {
                $companies[] = [
                    'name' => $list['pn_name'],
                    'address1' => $list['lic_premisesaddress1'],
                    'address2' => $list['lic_premisesaddress2'],
                    'town' => $list['lic_premisestown'],
                    'state' => $list['lic_premisesstate'],
                    'postcode' => $list['lic_premisespostcode'],
                    'phone' => $list['lic_premisesphone'],
                    'created_at' => date('Y-m-d i:h:s'),
                    'updated_at' => date('Y-m-d i:h:s'),
                ];

            }

        }
        $companies = new Collection($companies);
        foreach($companies->chunk(1000) as $c){
            $this->company->insert($c->toArray());
        }
        //$this->company->insert($companies);
    }
}
