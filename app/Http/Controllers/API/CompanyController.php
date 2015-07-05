<?php namespace LocalPromoter\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use joshtronic\GooglePlaces;
use LocalPromoter\Company;
use LocalPromoter\TourismRepository;

class CompanyController extends Controller
{
    /**
     * @var Company
     */
    private $company;

    private $googlePlaces;

    private $tourismRepository;

    /**
     * @param Company $company
     */
    public function __construct(Company $company, GooglePlaces $googlePlaces, TourismRepository $tourismRepository)
    {
        $this->company = $company;
        $this->googlePlaces = $googlePlaces;
        $this->tourismRepository = $tourismRepository;
    }

    /**
     * Get all the map markers
     */
    public function index()
    {
        $companies = [];
        $geo = \Input::only(['lat', 'lng']);

        $cacheName = $geo['lat'].$geo['lng'];

        if(\Cache::has($cacheName)) {
            $companies = \Cache::get($cacheName);
        } else {
            $allCompanies = $this->company->get();
            foreach ($allCompanies as $company) {
                if ($company->lat && $company->longitude) {
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
            $this->googlePlaces->radius   = 10000;
            $nearBy = $this->googlePlaces->nearbySearch();
            if($nearBy['status'] == "OK") {
                $nearBy = $nearBy['results'];
                foreach ($nearBy as &$place) {
                    $place['type'] = "google places";
                    $place['lat'] = $place['geometry']['location']['lat'];
                    $place['longitude'] = $place['geometry']['location']['lng'];
                }

                // merge local companies with near by from google places
                $companies = array_merge($companies, $nearBy);
            }

            $allCompanies = $this->tourismRepository->radius($geo['lat'], $geo['lng']);

            //ACCOMM TRANSPORT TOUR
            foreach ($allCompanies as $company) {
                $geo = explode(',', $company['boundary']);
                $companies[] = [
                    'type' => 'tourism',
                    'id' => $company['productId'],
                    'name' => $company['productName'],
                    'lat' => isset($geo[0])?$geo[0]:0,
                    'longitude' => isset($geo[1])?$geo[1]:0,
                    'image' => $company['productImage'],
                    'address1' => $company['addresses'][0]['address_line'],
                    'address2' => "",
                    'town' => $company['addresses'][0]['city'],
                    'postcode' => $company['addresses'][0]['postcode'],
                    'state' => $company['addresses'][0]['state'],

                ];
            }

            \Cache::put($cacheName, $companies, 1440);
        }

        shuffle($companies);
        // return list of companies
        return array_slice($companies, 0, 500);
    }

}