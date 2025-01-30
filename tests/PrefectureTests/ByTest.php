<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\PrefectureTests;

use Boatrace\Venture\Project\Prefecture;
use Boatrace\Venture\Project\Tests\PrefectureTestCase;

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
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byId(13, 34));
        $this->assertNull(Prefecture::byId(48));
        $this->assertNull(Prefecture::byId());
    }

    /**
     * @return void
     */
    public function testByName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東京都'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東京都', '広島県'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東京都', '広島県', '都道府県'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東京'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東京', '広島'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東京', '広島', '都道府県'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東', '広'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byName('東', '広', '都道府県'));
        $this->assertNull(Prefecture::byName('都道府県'));
        $this->assertNull(Prefecture::byName());
    }

    /**
     * @return void
     */
    public function testByShortName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byShortName('東京'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byShortName('東京', '広島'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byShortName('東京', '広島', '都道府県'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byShortName('東'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byShortName('東', '広'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byShortName('東', '広', '都道府県'));
        $this->assertNull(Prefecture::byShortName('東京都'));
        $this->assertNull(Prefecture::byShortName('都道府県'));
        $this->assertNull(Prefecture::byShortName());
    }

    /**
     * @return void
     */
    public function testByHiraganaName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とうきょうと'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とうきょうと', 'ひろしまけん'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とうきょうと', 'ひろしまけん', 'とどうふけん'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とうきょう'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とうきょう', 'ひろしま'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とうきょう', 'ひろしま', 'とどうふけん'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とう'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とう', 'ひろ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byHiraganaName('とう', 'ひろ', 'とどうふけん'));
        $this->assertNull(Prefecture::byShortName('とどうふけん'));
        $this->assertNull(Prefecture::byHiraganaName());
    }

    /**
     * @return void
     */
    public function testByKatakanaName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウキョウト'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウキョウト', 'ヒロシマケン'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウキョウト', 'ヒロシマケン', 'トドウフケン'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウキョウ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウキョウ', 'ヒロシマ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウキョウ', 'ヒロシマ', 'トドウフケン'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウ', 'ヒロ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byKatakanaName('トウ', 'ヒロ', 'トドウフケン'));
        $this->assertNull(Prefecture::byKatakanaName('トドウフケン'));
        $this->assertNull(Prefecture::byKatakanaName());
    }

    /**
     * @return void
     */
    public function testByEnglishName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byEnglishName('tokyo'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byEnglishName('tokyo', 'hiroshima'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), Prefecture::byEnglishName('tokyo', 'hiroshima', 'prefecture'));
        $this->assertPrefecture($this->prefecturesDTO->get(9), Prefecture::byEnglishName('to'));
        $this->assertPrefecture($this->prefecturesDTO->get(9), Prefecture::byEnglishName('to', 'hiro'));
        $this->assertPrefecture($this->prefecturesDTO->get(9), Prefecture::byEnglishName('to', 'hiro', 'prefecture'));
        $this->assertNull(Prefecture::byEnglishName('prefecture'));
        $this->assertNull(Prefecture::byEnglishName());
    }
}
