<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\PrefectureCoreTests;

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
            $actual = $this->prefecture->all()->get($index - 1);
            $this->assertPrefecture($expected, $actual);
        }
    }

    /**
     * @return void
     */
    public function testAllId(): void
    {
        $expected = $this->prefecturesDTO->pluck('id');
        $actual = $this->prefecture->allId();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function testAllName(): void
    {
        $expected = $this->prefecturesDTO->pluck('name');
        $actual = $this->prefecture->allName();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function testAllShortName(): void
    {
        $expected = $this->prefecturesDTO->pluck('shortName');
        $actual = $this->prefecture->allShortName();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function testAllHiraganaName(): void
    {
        $expected = $this->prefecturesDTO->pluck('hiraganaName');
        $actual = $this->prefecture->allHiraganaName();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function testAllKatakanaName(): void
    {
        $expected = $this->prefecturesDTO->pluck('katakanaName');
        $actual = $this->prefecture->allKatakanaName();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     */
    public function testAllEnglishName(): void
    {
        $expected = $this->prefecturesDTO->pluck('englishName');
        $actual = $this->prefecture->allEnglishName();
        $this->assertEquals($expected, $actual);
    }
}
