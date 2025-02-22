<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureCoreTests;

/**
 * @author shimomo
 */
class ByTest extends TestCase
{
    /**
     * @return void
     */
    public function testById(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byId(13));
        $this->assertNull($this->prefecture->byId(48));
    }

    /**
     * @return void
     */
    public function testByName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東京都'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東京'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東'));
        $this->assertNull($this->prefecture->byName('都道府県'));
    }

    /**
     * @return void
     */
    public function testByShortName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byShortName('東京'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byShortName('東'));
        $this->assertNull($this->prefecture->byShortName('東京都'));
        $this->assertNull($this->prefecture->byShortName('都道府県'));
    }

    /**
     * @return void
     */
    public function testByHiraganaName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とうきょうと'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とうきょう'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とう'));
        $this->assertNull($this->prefecture->byShortName('とどうふけん'));
    }

    /**
     * @return void
     */
    public function testByKatakanaName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウキョウト'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウキョウ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウ'));
        $this->assertNull($this->prefecture->byKatakanaName('トドウフケン'));
    }

    /**
     * @return void
     */
    public function testByEnglishName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byEnglishName('tokyo'));
        $this->assertPrefecture($this->prefecturesDTO->get(9), $this->prefecture->byEnglishName('to'));
        $this->assertNull($this->prefecture->byEnglishName('prefecture'));
    }

    /**
     * @return void
     */
    public function testByRegionId(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(8), $this->prefecture->byRegionId(3));
        $this->assertNull($this->prefecture->byRegionId(9));
    }

    /**
     * @return void
     */
    public function testByRegionName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(8), $this->prefecture->byRegionName('関東'));
        $this->assertNull($this->prefecture->byRegionName('prefecture'));
    }
}
