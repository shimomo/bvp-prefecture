<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureTests;

use BadMethodCallException;
use BVP\Prefecture\Prefecture;
use BVP\Prefecture\Tests\PrefectureTestCase;

/**
 * @author shimomo
 */
final class ExceptionTest extends PrefectureTestCase
{
    /**
     * @return void
     */
    public function testException(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\Prefecture\PrefectureCore::resolveMethod() - " .
            "The specified method 'invalid' does not exist in class 'BVP\Prefecture\PrefectureCore'."
        );

        Prefecture::invalid();
    }
}
