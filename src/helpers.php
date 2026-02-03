<?php

declare(strict_types=1);

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Config;
use Paulhibbert\Features\Contracts\FeatureInterface;

if (! function_exists('feature_enabled')) {
    /**
     * Check if a feature is enabled.
     *
     * @param  string  $feature  The name of the feature to check.
     * @return bool True if the feature is enabled, false otherwise.
     */
    function feature_enabled(string $feature): bool
    {
        $class = Config::string('features.namespace.default').$feature;
        if (class_exists($class)) {
            /** @var FeatureInterface $featureInstance */
            $featureInstance = Container::getInstance()->make($class);

            return $featureInstance->isEnabled();
        }

        return false;
    }
}
