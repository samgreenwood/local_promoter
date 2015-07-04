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

        $companies = $this->company->limit(500)->get()->toArray();

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