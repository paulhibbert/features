<?php

declare(strict_types=1);

namespace Paulhibbert\Features\Examples;

use Paulhibbert\Features\Contracts\FeatureInterface;

class DisabledFeature implements FeatureInterface
{
    public function isEnabled(): bool
    {
        return false;
    }
}
