<?php

namespace App\Partner\Handlers;

use App\Models\Partner;

interface PartnerHandlerFactoryInterface
{
    public function makeHandlerForPartner(Partner $partner);
}
