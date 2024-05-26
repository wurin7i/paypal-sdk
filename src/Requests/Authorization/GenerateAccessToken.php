<?php

namespace WuriN7i\PayPalSDK\Requests\Authorization;

use Saloon\Contracts\Body\BodyRepository;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

class GenerateAccessToken extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function defaultBody(): array
    {
        return [
            'grant_type' => 'client_credentials',
        ];
    }

    public function resolveEndpoint(): string
    {
        return 'v1/oauth2/token';
    }
}
