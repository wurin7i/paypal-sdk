<?php

namespace WuriN7i\PayPalSDK\DTO;

abstract class AbstractDTO
{
    public static function make(array $data = []): static
    {
        $instance = new static($data);

        return $instance;
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this as $prop => $value) {
            $array[$prop] = ($value instanceof AbstractDTO) ? $value->toArray() : $value;
        }

        return $array;
    }
}