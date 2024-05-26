<?php

namespace WuriN7i\PayPalSDK\Requests\Orders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use WuriN7i\PayPalSDK\DTO\Order\CheckoutOrder;

class CreateOrder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct (
        public readonly CheckoutOrder|array|null $data = null
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'v2/checkout/orders';
    }

    public function defaultBody(): array
    {
        $data = ($this->data instanceof CheckoutOrder) ? $this->data->toArray() : $this->data;
        return $data ?? [];
    }
}
