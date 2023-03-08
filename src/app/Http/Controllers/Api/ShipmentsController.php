<?php

namespace App\Http\Controllers\Api;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Services\DhlService;
use App\Services\BrtService;


class ShipmentsController extends ApiController
{

    /**
     * @var DhlService $dhlService
     */
    public DhlService $dhlService;

    /**
     * @var BrtService $brtService
     */
    public BrtService $brtService;

    /**
     * @param DhlService $dhlService
     * @param BrtService $brtService
     */
    public function __construct(
        DhlService $dhlService,
        BrtService $brtService
    )
    {
        $this->dhlService = $dhlService;
        $this->brtService = $brtService;
    }

    /**
     * Get shipments details by trackingNumber and currierSlug
     *
     * @param Request $request
     * @return JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $trackingNumber = $request->query('trackingNumber');
            $currierSlug = $request->query('currierSlug');

            switch ($currierSlug) {
                case "dhl":
                    $track = $this->dhlService->trackShipments($trackingNumber);
                    break;
                case "brt":
                    $track = $this->brtService->trackShipments($trackingNumber);
                    break;
            }

            return $this->sendResponse('ok', 200, $track);

        } catch (\Exception $e) {
            return $this->sendError('Internal Server Error', 500, array($e));
        }

    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function dhl(Request $request) : JsonResponse
    {
        $track = $this->dhlService->trackShipments($request->query('trackingNumber'));
        return $this->sendResponse('ok', 200, $track);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function brt(Request $request) : JsonResponse
    {
        $track = $this->brtService->trackShipments($request->query('trackingNumber'));
        return $this->sendResponse('ok', 200, $track);
    }

}
