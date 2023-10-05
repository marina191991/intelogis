<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateShippingCostRequest;
use App\Http\Responses\CalculateShippingCostResponse;
use App\Models\Partner;
use App\Partner\DataTransferObjects\DeliveryCalculationDataInput;
use App\Partner\PartnerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function getCalculateShippingCost(
        CalculateShippingCostRequest $request,
        PartnerService $adapter
    ): JsonResponse {

        $partners = [];
        foreach ($request->partners as $partner) {
            $partners [] = $partner;
        }

        $partners = Partner::query()->whereIn('title', $partners)->get();

        $result = [];
        foreach ($partners as $partner) {
            if ($partner instanceof Partner)
            {
                $result [] = $adapter->fetchCalculateShippingCost(
                    partner: $partner,
                    dto: new  DeliveryCalculationDataInput(
                        sourceKladr: $request->sourceKladr,
                        targetKladr: $request->targetKladr,
                        weight: $request->weight
                    )
                );
            }
        }

        return new CalculateShippingCostResponse($result);
    }
}
