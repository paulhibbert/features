<?php

namespace Paulhibbert\Features\Examples;

use Paulhibbert\Features\Contracts\FeatureInterface;

class EnabledFeature implements FeatureInterface
{
    public function isEnabled(): bool
    {
        return true;
    }
}
