<?php

namespace App\Partner\DataTransferObjects;

class DeliveryCalculationDataOutput
{
    public function __construct(
        public string $date,
        public float $price,
        public string $error
    ) {
    }
}
