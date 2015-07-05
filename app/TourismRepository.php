<?php namespace LocalPromoter;

use GuzzleHttp\Client;

class TourismRepository
{
    protected $client;
    protected $baseurl;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->baseurl = "http://govhack.atdw.com.au/productsearchservice.svc/products?key=".env('TOURISM_KEY');
    }

    public function radius($latitude, $longitude, $distance = 10)
    {
        $options = [
            'latlong' => $latitude.",".$longitude,
            'dist' => $distance,
            'out' => 'json',
            'fl' => 'address,product_id,product_name,product_category,geo,comms_ph,product_image',
            'cats' => 'ACCOMM,TRANSPORT,TOUR,HIRE,RESTAURANT,ATTRACTION',
            'size' => 1000
        ];

        $res = $this->client->get($this->url($options));

        return json_decode(str_replace('"!2', '!2', preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $res->getBody()->getContents())), true )['products'];
    }

    private function url($options)
    {
        return $this->baseurl."&".str_replace('%2C', ',', http_build_query($options));
    }


}