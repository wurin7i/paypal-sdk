<?php

namespace WuriN7i\PayPalSDK\Enums;

enum OrderIntent: string {
    case Capture = 'CAPTURE';
    case Authorize = 'AUTHORIZE';
}