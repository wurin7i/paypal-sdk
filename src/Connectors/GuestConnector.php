<?php

namespace WuriN7i\PayPalSDK\Connectors;

use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Connector;

class GuestConnector extends Connector
{
    public function __construct(
        protected string $clientId,
        protected string $clientSecret,
        protected bool $isProduction = false,
    ) {
        //
    }

    public function resolveBaseUrl(): string
    {
        return $this->isProduction
            ? 'https://api-m.paypal.com'
            : 'https://api-m.sandbox.paypal.com';
    }

    protected function defaultAuth(): BasicAuthenticator
    {
        return new BasicAuthenticator($this->clientId, $this->clientSecret);
    }
}