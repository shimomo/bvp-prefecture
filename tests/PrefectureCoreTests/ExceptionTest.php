<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\PrefectureCoreTests;

use BadMethodCallException;

/**
 * @author shimomo
 */
class ExceptionTest extends TestCase
{
    /**
     * @return void
     */
    public function testException(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage(
            'Method \'invalid\' does not exist on \'Boatrace\Venture\Project\PrefectureCore\'.'
        );

        $this->prefecture->invalid();
    }
}
