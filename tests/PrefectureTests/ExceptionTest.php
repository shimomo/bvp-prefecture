<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureTests;

use BadMethodCallException;
use BVP\Prefecture\Prefecture;
use BVP\Prefecture\Tests\PrefectureTestCase;

/**
 * @author shimomo
 */
class ExceptionTest extends PrefectureTestCase
{
    /**
     * @return void
     */
    public function testException(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage(
            'Method \'invalid\' does not exist on \'BVP\Prefecture\PrefectureCore\'.'
        );

        Prefecture::invalid();
    }
}
