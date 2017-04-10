<?php

namespace App\Api\Transformers;


abstract class Transformer
{
    public function transformCollection($items)
    {
        return $items->map(function ($item) {
            return $this->transform($item);
        })->toArray();
    }

    public abstract function transform($item);
}