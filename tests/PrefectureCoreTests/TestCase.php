<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureCoreTests;

use BVP\Prefecture\PrefectureCore;
use BVP\Prefecture\Tests\PrefectureTestCase;

/**
 * @author shimomo
 */
abstract class TestCase extends PrefectureTestCase
{
    /**
     * @var \BVP\Prefecture\PrefectureCore
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
