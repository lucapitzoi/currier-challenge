<?php

namespace App\Services;

use App\Helpers\DhlHelper;
use App\Repositories\ExampleRepository;
use Faker\Extension\Helper;
use Illuminate\Support\Facades\Http;

class BrtService extends BaseService
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
        $resourceTmp = json_decode($result, false);

        $resource = [];
        $resource['id'] = $trackingNumber;
        $resource['currier'] = 'Bartolini';
        $resource['service'] = $resourceTmp->shipments[0]->service;
        //$resource['status'] = $resourceTmp->shipments[0]->status;
        //$resource['details'] = $resourceTmp->shipments[0]->details;
        //$resource['events'] = $resourceTmp->shipments[0]->events;

        return $resource;
    }

}
