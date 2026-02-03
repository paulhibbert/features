<?php

declare(strict_types=1);

namespace Paulhibbert\Features;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Paulhibbert\Features\Contracts\FeatureInterface;

final class FeaturesServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/features.php', 'features');
    }

    public function boot(): void
    {
        Blade::if('feature', function (string $feature): bool {
            $class = Config::string('features.namespace.default').$feature;
            if (class_exists($class)) {
                /** @var FeatureInterface $featureInstance */
                $featureInstance = Container::getInstance()->make($class);

                return $featureInstance->isEnabled();
            }

            return false;
        });
    }
}
