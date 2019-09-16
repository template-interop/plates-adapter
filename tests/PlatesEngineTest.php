<?php

namespace Interop\Tests\Template\Latte;

use Interop\Template\Plates\PlatesEngine;
use PHPUnit\Framework\TestCase;
use Latte\Engine as Latte;
use Latte\Loaders\FileLoader;

final class PlatesEngineTest extends TestCase
{
    public function testRender()
    {
        $plates = new \League\Plates\Engine(__DIR__.'/templates/');
        $engine = new PlatesEngine($plates);
        $html = $engine->render('hello', ['name' => 'John']);

        $this->assertStringEqualsFile(__DIR__ . '/templates/expected.html', $html);
    }
}
