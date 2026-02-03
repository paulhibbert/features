<?php

declare(strict_types=1);

namespace Paulhibbert\Features\Contracts;

interface FeatureInterface
{
    public function isEnabled(): bool;
}
