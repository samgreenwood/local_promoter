<?php namespace LocalPromoter\Http\Controllers\API;

use Illuminate\Routing\Controller;
use joshtronic\GooglePlaces;
use LocalPromoter\Company;

class CompanyController extends Controller
{
    /**
     * @var Company
     */
    private $company;

    private $googlePlaces;

    /**
     * @param Company $company
     */
    public function __construct(Company $company, GooglePlaces $googlePlaces)
    {
        $this->company = $company;
        $this->googlePlaces = $googlePlaces;
    }

    /**
     * Get all the map markers
     */
    public function index()
    {
        $companies = [];
        $geo = \Input::only(['lat', 'lng']);

        $allCompanies = $this->company->get();
        foreach ($allCompanies as $company) {
            if($company->lat && $company->longitude) {
                $longitude1 = $geo['lng'];
                $latitude1 = $geo['lat'];

                $longitude2 = $company->longitude;
                $latitude2 = $company->lat;

                $theta = $longitude1 - $longitude2;
                $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
                $distance = acos($distance);
                $distance = rad2deg($distance);

                $distance = $distance * 60 * 1.1515; // distance in miles
                $distance = $distance * 1.609344; // convert distance to km
                if ($distance <= 10) {
                    $companies[] = $company->toArray();
                }
            }
        }



        $this->googlePlaces->location = array((float)$geo['lat'], (float)$geo['lng']);
        $this->googlePlaces->radius   = 1000;
        $nearBy = $this->googlePlaces->nearbySearch();
        if($nearBy['status'] == "OK") {
            $nearBy = $nearBy['results'];
            foreach ($nearBy as &$place) {
                $place['lat'] = $place['geometry']['location']['lat'];
                $place['longitude'] = $place['geometry']['location']['lng'];
            }

            // merge local companies with near by from google places
            $companies = array_merge($companies, $nearBy);
        }

        // return list of companies
        return array_slice($companies, 0, 300);
    }

}