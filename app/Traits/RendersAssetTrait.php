<?php

namespace App\Traits;

trait RendersAssetTrait
{
    function __call($method, $args)
    {
        // If some call stats with render, then we will fetch the asset using asset() helper
        if (starts_with($method, 'render')) {
            $imageField = strtolower(str_after($method, 'render'));
            $extension = array_get($args, 'extension', 'png');

            return asset("images/{$this->$imageField}.{$extension}");
        }

        return parent::__call($method, $args);
    }
}