<?php

namespace App\PartnerHandlers;

use App\Partner\Contracts\PartnerHandlerContract;
use App\Partner\DataTransferObjects\DeliveryCalculationDataInput;
use App\Partner\DataTransferObjects\DeliveryCalculationDataOutput;
use Carbon\Carbon;
use GuzzleHttp\Client;

class FastDeliveryService implements PartnerHandlerContract
{
    public Client $client;

    public function __construct(string $base_url, protected string $token)
    {
        $this->client = new Client(['base_uri' => $base_url]);
    }

    public function calculateShippingCost(DeliveryCalculationDataInput $deliveryData): DeliveryCalculationDataOutput
    {
        //Это возможная отправка запроса партнеру
        /*$response = json_decode(
            $this->client
                ->request('GET', 'calculate', [
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
            "price" => 500,
            "period" => 2,
            "error" => ''
        ];

        $date = $this->periodToDate($response->period);

        return new DeliveryCalculationDataOutput(
            date: $date,
            price: $response->price,
            error: $response->error
        );
    }

    private function periodToDate(int $period): string
    {
        $currentDateTime = new Carbon();
        $currentDateTime->addDays(2);

        return $currentDateTime->format('Y-m-d');
    }
}
