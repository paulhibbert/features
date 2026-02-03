<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Support\Facades\Blade;

class DirectiveTest extends TestCase
{
    public function test_blade_directive_renders_content_if_feature_is_enabled(): void
    {
        $viewString = "
            @feature('EnabledFeature')
                <p>This feature is enabled</p>
            @endfeature
        ";

        $compiled = Blade::compileString($viewString);

        $expected = "
            <?php if (\Illuminate\Support\Facades\Blade::check('feature', 'EnabledFeature')): ?>
                <p>This feature is enabled</p>
            <?php endif; ?>
        ";
        $this->assertSame($expected, $compiled);

        $rendered = Blade::render($viewString);

        $expected = '<p>This feature is enabled</p>';
        $this->assertSame($expected, trim($rendered));
    }

    public function test_blade_directive_does_not_render_content_if_feature_is_disabled(): void
    {
        $viewString = "
            @feature('DisabledFeature')
                <p>Display if enabled</p>
            @endfeature
        ";

        $rendered = Blade::render($viewString);

        $this->assertEmpty(trim($rendered));
    }

    public function test_blade_directive_does_not_render_content_if_feature_classe_does_not_exist(): void
    {
        $viewString = "
            @feature('NonExistentFeature')
                <p>Display if enabled</p>
            @endfeature
        ";

        $rendered = Blade::render($viewString);

        $this->assertEmpty(trim($rendered));
    }
}
