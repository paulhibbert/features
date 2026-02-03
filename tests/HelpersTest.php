<?php

declare(strict_types=1);

namespace Tests;

class HelpersTest extends TestCase
{
    public function test_helper_returns_false_when_feature_class_does_not_exist(): void
    {
        $this->assertFalse(class_exists('NonExistentFeature'));
        $this->assertFalse(feature_enabled('NonExistentFeature'));
    }

    public function test_helper_returns_false_when_feature_class_is_not_enabled(): void
    {
        $disabledClassName = 'DisabledFeature';
        $this->assertTrue(class_exists($this->testNameSpace.$disabledClassName));
        $this->assertFalse(feature_enabled($disabledClassName));
    }

    public function test_helper_returns_true_when_feature_class_is_enabled(): void
    {
        $enabledClassName = 'EnabledFeature';
        $this->assertTrue(class_exists($this->testNameSpace.$enabledClassName));
        $this->assertTrue(feature_enabled($enabledClassName));
    }
}
