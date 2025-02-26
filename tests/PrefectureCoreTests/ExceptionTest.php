<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureCoreTests;

use BadMethodCallException;

/**
 * @author shimomo
 */
final class ExceptionTest extends TestCase
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

        $this->prefecture->invalid();
    }
}
