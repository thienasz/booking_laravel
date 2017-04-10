<?php

namespace App\Api\Transformers;

class ServiceProviderTransformer extends Transformer
{
    public function transform($serviceProvider)
    {
//        dd($serviceProvider);
        return $serviceProvider->toArray();
    }
}