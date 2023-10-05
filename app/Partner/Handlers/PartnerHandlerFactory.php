<?php

namespace App\Partner\Handlers;

use App\Exceptions\MissingPartnerHandlerException;
use App\Models\Partner;
use App\Partner\Contracts\PartnerHandlerContract;
use App\PartnerHandlers\FastDeliveryService;
use App\PartnerHandlers\SlowDeliveryService;

class PartnerHandlerFactory implements PartnerHandlerFactoryInterface
{

    /**
     * @throws MissingPartnerHandlerException
     */
    public function makeHandlerForPartner(Partner $partner): PartnerHandlerContract
    {
        return match ($partner->title) {
            'fast' => new FastDeliveryService(
                base_url: config('partners.fast.base_url'),
                token: config('partners.fast.token')
            ),
            'slow' => new SlowDeliveryService(
                base_url: config('partners.fast.base_url'),
                token: config('partners.fast.token')
            ),
            'default' => throw new MissingPartnerHandlerException(),
        };
    }
}
