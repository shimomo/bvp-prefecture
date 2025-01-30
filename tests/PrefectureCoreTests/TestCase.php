<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\PrefectureCoreTests;

use Boatrace\Venture\Project\PrefectureCore;
use Boatrace\Venture\Project\Tests\PrefectureTestCase;

/**
 * @author shimomo
 */
abstract class TestCase extends PrefectureTestCase
{
    /**
     * @var \Boatrace\Venture\Project\PrefectureCore
     */
    protected PrefectureCore $prefecture;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->prefecture ??= new PrefectureCore();
    }
}
