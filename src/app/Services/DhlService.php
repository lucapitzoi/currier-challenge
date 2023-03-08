<?php

namespace App\Services;

use App\Helpers\DhlHelper;
use App\Repositories\ExampleRepository;
use Faker\Extension\Helper;
use Illuminate\Support\Facades\Http;

class DhlService extends BaseService
{

    /**
     * @var ExampleRepository
     */
    protected ExampleRepository $exampleRepository;

    /**
     * DhlService constructor.
     */
    public function __construct(ExampleRepository $exampleRepository)
    {
        $this->exampleRepository = $exampleRepository;
    }

    public function trackShipments(string $trackingNumber)
    {
        $query = [];
        $query['trackingNumber'] = $trackingNumber;

        $consumerKey = DhlHelper::getApiKey();

        //$url = 'https://api-eu.dhl.com/track/shipments?trackingNumber=7777777770';
        $url = 'https://api-eu.dhl.com/track/shipments';

        $response = Http::withHeaders([
            //'Content-Type' => 'application/json',
            'DHL-API-Key' => $consumerKey
        ])->get($url, $query);

        $result = $response->body();
        $resource = json_decode($result, false);

        return $resource;
    }

}
