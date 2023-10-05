<?php

namespace App\Partner\Contracts;

use App\Partner\DataTransferObjects\DeliveryCalculationDataInput;
use App\Partner\DataTransferObjects\DeliveryCalculationDataOutput;

interface PartnerHandlerContract
{
    public function calculateShippingCost(DeliveryCalculationDataInput $deliveryData): DeliveryCalculationDataOutput;
}
