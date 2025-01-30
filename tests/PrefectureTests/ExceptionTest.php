<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\PrefectureTests;

use BadMethodCallException;
use Boatrace\Venture\Project\Prefecture;
use Boatrace\Venture\Project\Tests\PrefectureTestCase;

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
            'Method \'invalid\' does not exist on \'Boatrace\Venture\Project\PrefectureCore\'.'
        );

        Prefecture::invalid();
    }
}
