<?php

namespace App\PartnerHandlers;

use App\Partner\Contracts\PartnerHandlerContract;
use App\Partner\DataTransferObjects\DeliveryCalculationDataInput;
use App\Partner\DataTransferObjects\DeliveryCalculationDataOutput;
use GuzzleHttp\Client;

class SlowDeliveryService implements PartnerHandlerContract
{
    public Client $client;
    const BASE_COUNT = 150;

    public function __construct(string $base_url, protected string $token)
    {
        $this->client = new Client(['base_uri' => $base_url]);
    }

    public function calculateShippingCost(DeliveryCalculationDataInput $deliveryData): DeliveryCalculationDataOutput
    {
        //Это возможная отправка запроса партнеру
        /*$response = json_decode(
            $this->client
                ->request('POST', 'calculate', [
                    'query' => [
                        'token' => $this->token,
                        'sourceKladr' => $deliveryData->sourceKladr,
                        'targetKladr' => $deliveryData->targetKladr,
                        'weight' => $deliveryData->weight,
                    ],
                ])
                ->getBody()
                ->getContents()
        );*/

        //сделаем вид, что получили вот такой response
        $response = (object)[
            "coefficient" => 1.2,
            "date" => '2017-10-20',
            "error" => 'lml'
        ];

        return new DeliveryCalculationDataOutput(
            date: $response->date,
            price: $response->coefficient * self::BASE_COUNT,
            error: $response->error
        );
    }
}
