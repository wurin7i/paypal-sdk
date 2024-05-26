<?php

namespace WuriN7i\PayPalSDK\Requests\Orders;

use Saloon\Contracts\ArrayStore;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use WuriN7i\PayPalSDK\DTO\Order\CheckoutOrder;

class CapturePayment extends Request
{
    protected Method $method = Method::POST;

    public function __construct (
        protected readonly string $orderId
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "v2/checkout/orders/{$this->orderId}/capture";
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
