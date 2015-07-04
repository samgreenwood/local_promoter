<?php

namespace LocalPromoter\Console\Commands;

use Illuminate\Console\Command;
use LocalPromoter\Company;

class Geocode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'geocode';

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

        $companies = $this->company->where('lat', "")->where('long', "")->get();


        foreach ($companies as $company) {
            $this->info($company->name);

            $param = array(
                "address"=>$company->address1.' '.$company->address2.' '.$company->town.' '.$company->state.' Australia '.$company->postcode,
                "componets"=>"country:AU"
            );

            $response = \Geocoder::geocode('json', $param);
            $response = json_decode($response);

            if ($response->status == "OK") {
                $company->lat = $response->results[0]->geometry->location->lat;
                $company->long = $response->results[0]->geometry->location->lng;
                $company->save();
            } else {
                if($response->status != "ZERO_RESULTS") dd($response);
            }
        }


    }
}
