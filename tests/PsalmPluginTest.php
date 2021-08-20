<?php

declare(strict_types=1);

namespace Phpcq\PsalmNormalizePluginTest;

use Phpcq\PluginApi\Version10\Configuration\PluginConfigurationBuilderInterface;
use Phpcq\PluginApi\Version10\Configuration\PluginConfigurationInterface;
use Phpcq\PluginApi\Version10\DiagnosticsPluginInterface;
use Phpcq\PluginApi\Version10\EnvironmentInterface;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
final class PsalmPluginTest extends TestCase
{
    private function instantiate(): DiagnosticsPluginInterface
    {
        return include dirname(__DIR__) . '/src/psalm.php';
    }

    public function testPluginName(): void
    {
        self::assertSame('psalm', $this->instantiate()->getName());
    }

    public function testPluginDescribesConfig(): void
    {
        $configOptionsBuilder = $this->getMockForAbstractClass(PluginConfigurationBuilderInterface::class);

        $this->instantiate()->describeConfiguration($configOptionsBuilder);

        // We assume it worked out as the plugin did execute correctly.
        $this->addToAssertionCount(1);
    }

    public function testPluginCreatesDiagnosticTasks(): void
    {
        $config = $this->getMockForAbstractClass(PluginConfigurationInterface::class);
        $environment = $this->getMockForAbstractClass(EnvironmentInterface::class);

        $this->instantiate()->createDiagnosticTasks($config, $environment);

        // We assume it worked out as the plugin did execute correctly.
        $this->addToAssertionCount(1);
    }
}
