<?php namespace LocalPromoter\Http\Controllers\API;

use Illuminate\Routing\Controller;
use LocalPromoter\Company;

class CompanyController extends Controller
{
    /**
     * @var Company
     */
    private $company;

    /**
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Get all the map markers
     */
    public function index()
    {
        return $this->company->limit(500)->get();
    }

}