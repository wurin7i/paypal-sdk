<?php

namespace WuriN7i\PayPalSDK\DTO\Order;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use WuriN7i\PayPalSDK\Enums\OrderIntent;

#[MapName(SnakeCaseMapper::class)]
class CheckoutOrder extends Data
{
    public function __construct(
        public readonly array $purchaseUnits,
        public readonly OrderIntent $intent = OrderIntent::Capture,
        public readonly ?object $paymentSource = null,
    ) {
        //
    }
}