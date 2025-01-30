<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\PrefectureTests;

use Boatrace\Venture\Project\Prefecture;
use Boatrace\Venture\Project\Tests\PrefectureTestCase;

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
            $actual = Prefecture::all()->get($index - 1);
            $this->assertPrefecture($expected, $actual);
        }
    }

    /**
     * @return void
     */
    public function testAllId(): void
    {
        $expected = $this->prefecturesDTO->pluck('id');
        $actual = Prefecture::allId();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function testAllName(): void
    {
        $expected = $this->prefecturesDTO->pluck('name');
        $actual = Prefecture::allName();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function testAllShortName(): void
    {
        $expected = $this->prefecturesDTO->pluck('shortName');
        $actual = Prefecture::allShortName();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function testAllHiraganaName(): void
    {
        $expected = $this->prefecturesDTO->pluck('hiraganaName');
        $actual = Prefecture::allHiraganaName();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function testAllKatakanaName(): void
    {
        $expected = $this->prefecturesDTO->pluck('katakanaName');
        $actual = Prefecture::allKatakanaName();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function testAllEnglishName(): void
    {
        $expected = $this->prefecturesDTO->pluck('englishName');
        $actual = Prefecture::allEnglishName();
        $this->assertEquals($expected, $actual);
    }
}
