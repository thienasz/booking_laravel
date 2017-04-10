<?php

namespace App\Api\Transformers;

class VehicleTransformer extends Transformer
{
    public function transform($vehicle)
    {
        return $vehicle->toArray();
    }
}