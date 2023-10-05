<?php

namespace App\Partner\DataTransferObjects;

class DeliveryCalculationDataInput
{
    public function __construct(
        public string $sourceKladr,
        public string $targetKladr,
        public float $weight
    ) {
    }
}
