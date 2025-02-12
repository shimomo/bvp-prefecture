<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureTests;

use BVP\Prefecture\Prefecture;
use BVP\Prefecture\Tests\PrefectureTestCase;

/**
 * @author shimomo
 */
class AllTest extends PrefectureTestCase
{
    /**
     * @return void
     */
    public function testAll(): void
    {
        foreach (range(1, 47) as $index) {
            $expected = $this->prefecturesDTO->get($index);
            $actual = Prefecture::all()->get($index);
            $this->assertPrefecture($expected, $actual);
        }
    }
}
