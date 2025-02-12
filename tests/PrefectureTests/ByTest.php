<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureTests;

use BVP\Prefecture\Prefecture;
use BVP\Prefecture\Tests\PrefectureTestCase;

/**
 * @author shimomo
 */
class ByTest extends PrefectureTestCase
{
    /**
     * @return void
     */
    public function testById(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byId(13));
        $this->assertNull(Prefecture::byId(48));
    }

    /**
     * @return void
     */
    public function testByName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東京都'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東京'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東'));
        $this->assertNull(Prefecture::byName('都道府県'));
    }

    /**
     * @return void
     */
    public function testByShortName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byShortName('東京'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byShortName('東'));
        $this->assertNull(Prefecture::byShortName('東京都'));
        $this->assertNull(Prefecture::byShortName('都道府県'));
    }

    /**
     * @return void
     */
    public function testByHiraganaName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とうきょうと'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とうきょう'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とう'));
        $this->assertNull(Prefecture::byShortName('とどうふけん'));
    }

    /**
     * @return void
     */
    public function testByKatakanaName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウキョウト'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウキョウ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウ'));
        $this->assertNull(Prefecture::byKatakanaName('トドウフケン'));
    }

    /**
     * @return void
     */
    public function testByEnglishName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byEnglishName('tokyo'));
        $this->assertPrefecture($this->prefecturesDTO->get(9), Prefecture::byEnglishName('to'));
        $this->assertNull(Prefecture::byEnglishName('prefecture'));
    }
}
