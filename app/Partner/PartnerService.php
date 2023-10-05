<?php

namespace App\Partner;

use App\Models\Partner;
use App\Partner\DataTransferObjects\DeliveryCalculationDataInput;
use App\Partner\DataTransferObjects\DeliveryCalculationDataOutput;
use App\Partner\Handlers\PartnerHandlerFactoryInterface;

class PartnerService
{
    public function __construct(protected PartnerHandlerFactoryInterface $partnerHandlerFactory)
    {
    }

    public function fetchCalculateShippingCost(
        Partner $partner,
        DeliveryCalculationDataInput $dto
    ): DeliveryCalculationDataOutput {

        return $this->partnerHandlerFactory
            ->makeHandlerForPartner($partner)
            ->calculateShippingCost($dto);
    }

}
