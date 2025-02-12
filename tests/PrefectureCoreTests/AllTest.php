<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureCoreTests;

/**
 * @author shimomo
 */
class AllTest extends TestCase
{
    /**
     * @return void
     */
    public function testAll(): void
    {
        foreach (range(1, 47) as $index) {
            $expected = $this->prefecturesDTO->get($index);
            $actual = $this->prefecture->all()->get($index);
            $this->assertPrefecture($expected, $actual);
        }
    }
}
