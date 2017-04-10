<?php

namespace App\Api\Transformers;

class StationTransformer extends Transformer
{
    public function transform($station)
    {
        return $station->toArray();
    }
}