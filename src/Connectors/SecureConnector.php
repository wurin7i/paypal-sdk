<?php

namespace WuriN7i\PayPalSDK\Connectors;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\PendingRequest;
use WuriN7i\PayPalSDK\Requests\Authorization\GenerateAccessToken;

class SecureConnector extends GuestConnector
{
    public function boot(PendingRequest $pendingRequest): void
    {
        // Let's start by returning early if the request being sent is the
        // GenerateAccessToken. We don't want to create an infinite loop
        if ($pendingRequest->getRequest() instanceof GenerateAccessToken) {
            return;
        }

        // Now let's make our authentication request. Since we are in the
        // context of the connector, we can just simply call $this and
        // make another request!
        $authResponse = $this->send(new GenerateAccessToken($this->clientId, $this->clientSecret));

        // Now we'll take the token from the auth response and then pass it
        // into the $pendingRequest which is the original GetSongsByArtistRequest.
        $pendingRequest->authenticate(new TokenAuthenticator($authResponse->json()['access_token']));
    }
}
