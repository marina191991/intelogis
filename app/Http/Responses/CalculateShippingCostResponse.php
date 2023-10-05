<?php

namespace App\Http\Responses;

use Illuminate\Database\Eloquent\Collection;

class CalculateShippingCostResponse extends \Illuminate\Http\JsonResponse
{
    public function __construct(array $data, $status = 200)
    {
        parent::__construct($data, $status);
    }
}
