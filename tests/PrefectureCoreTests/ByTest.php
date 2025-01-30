<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\PrefectureCoreTests;

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
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byId(13, 34));
        $this->assertNull($this->prefecture->byId(48));
        $this->assertNull($this->prefecture->byId());
    }

    /**
     * @return void
     */
    public function testByName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東京都'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東京都', '広島県'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東京都', '広島県', '都道府県'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東京'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東京', '広島'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東京', '広島', '都道府県'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東', '広'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byName('東', '広', '都道府県'));
        $this->assertNull($this->prefecture->byName('都道府県'));
        $this->assertNull($this->prefecture->byName());
    }

    /**
     * @return void
     */
    public function testByShortName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byShortName('東京'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byShortName('東京', '広島'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byShortName('東京', '広島', '都道府県'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byShortName('東'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byShortName('東', '広'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byShortName('東', '広', '都道府県'));
        $this->assertNull($this->prefecture->byShortName('東京都'));
        $this->assertNull($this->prefecture->byShortName('都道府県'));
        $this->assertNull($this->prefecture->byShortName());
    }

    /**
     * @return void
     */
    public function testByHiraganaName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とうきょうと'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とうきょうと', 'ひろしまけん'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とうきょうと', 'ひろしまけん', 'とどうふけん'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とうきょう'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とうきょう', 'ひろしま'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とうきょう', 'ひろしま', 'とどうふけん'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とう'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とう', 'ひろ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byHiraganaName('とう', 'ひろ', 'とどうふけん'));
        $this->assertNull($this->prefecture->byShortName('とどうふけん'));
        $this->assertNull($this->prefecture->byHiraganaName());
    }

    /**
     * @return void
     */
    public function testByKatakanaName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウキョウト'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウキョウト', 'ヒロシマケン'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウキョウト', 'ヒロシマケン', 'トドウフケン'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウキョウ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウキョウ', 'ヒロシマ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウキョウ', 'ヒロシマ', 'トドウフケン'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウ', 'ヒロ'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byKatakanaName('トウ', 'ヒロ', 'トドウフケン'));
        $this->assertNull($this->prefecture->byKatakanaName('トドウフケン'));
        $this->assertNull($this->prefecture->byKatakanaName());
    }

    /**
     * @return void
     */
    public function testByEnglishName(): void
    {
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byEnglishName('tokyo'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byEnglishName('tokyo', 'hiroshima'));
        $this->assertPrefecture($this->prefecturesDTO->get(13), $this->prefecture->byEnglishName('tokyo', 'hiroshima', 'prefecture'));
        $this->assertPrefecture($this->prefecturesDTO->get(9), $this->prefecture->byEnglishName('to'));
        $this->assertPrefecture($this->prefecturesDTO->get(9), $this->prefecture->byEnglishName('to', 'hiro'));
        $this->assertPrefecture($this->prefecturesDTO->get(9), $this->prefecture->byEnglishName('to', 'hiro', 'prefecture'));
        $this->assertNull($this->prefecture->byEnglishName('prefecture'));
        $this->assertNull($this->prefecture->byEnglishName());
    }
}
