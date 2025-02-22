<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureCoreTests;

/**
 * @author shimomo
 */
class ByListTest extends TestCase
{
    /**
     * @return void
     */
    public function testByIdList(): void
    {
        $collection = $this->prefecture->byIdList(13);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byIdList([13]);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byIdList(13, 34);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byIdList([13, 34]);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byIdList(13, 34, 48);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byIdList([13, 34, 48]);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $this->assertNull($this->prefecture->byIdList(48));
        $this->assertNull($this->prefecture->byIdList([48]));
    }

    /**
     * @return void
     */
    public function testByNameList(): void
    {
        $collection = $this->prefecture->byNameList('東京都');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byNameList(['東京都']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byNameList('東京都', '広島県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList(['東京都', '広島県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList('東京都', '広島県', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList(['東京都', '広島県', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList('東京');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byNameList(['東京']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byNameList('東京', '広島');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList(['東京', '広島']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList('東京', '広島', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList(['東京', '広島', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList('東');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byNameList(['東']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byNameList('東', '広');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList(['東', '広']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList('東', '広', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byNameList(['東', '広', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);
    }

    /**
     * @return void
     */
    public function testByShortNameList(): void
    {
        $collection = $this->prefecture->byShortNameList('東京');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byShortNameList(['東京']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byShortNameList('東京', '広島');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byShortNameList(['東京', '広島']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byShortNameList('東京', '広島', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byShortNameList(['東京', '広島', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byShortNameList('東');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byShortNameList(['東']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byShortNameList('東', '広');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byShortNameList(['東', '広']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byShortNameList('東', '広', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byShortNameList(['東', '広', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $this->assertNull($this->prefecture->byShortNameList('東京都'));
        $this->assertNull($this->prefecture->byShortNameList(['東京都']));
        $this->assertNull($this->prefecture->byShortNameList('東京都', '広島県'));
        $this->assertNull($this->prefecture->byShortNameList(['東京都', '広島県']));
        $this->assertNull($this->prefecture->byShortNameList('東京都', '広島県', '都道府県'));
        $this->assertNull($this->prefecture->byShortNameList(['東京都', '広島県', '都道府県']));
    }

    /**
     * @return void
     */
    public function testByHiraganaNameList(): void
    {
        $collection = $this->prefecture->byHiraganaNameList('とうきょうと');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byHiraganaNameList(['とうきょうと']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byHiraganaNameList('とうきょうと', 'ひろしまけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList(['とうきょうと', 'ひろしまけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList('とうきょうと', 'ひろしまけん', 'とどうふけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList(['とうきょうと', 'ひろしまけん', 'とどうふけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList('とうきょう');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byHiraganaNameList(['とうきょう']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byHiraganaNameList('とうきょう', 'ひろしま');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList(['とうきょう', 'ひろしま']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList('とうきょう', 'ひろしま', 'とどうふけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList(['とうきょう', 'ひろしま', 'とどうふけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList('とう');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byHiraganaNameList(['とう']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byHiraganaNameList('とう', 'ひろ');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList(['とう', 'ひろ']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList('とう', 'ひろ', 'とどうふけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byHiraganaNameList(['とう', 'ひろ', 'とどうふけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);
    }

    /**
     * @return void
     */
    public function testByKatakanaNameList(): void
    {
        $collection = $this->prefecture->byKatakanaNameList('トウキョウト');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byKatakanaNameList(['トウキョウト']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byKatakanaNameList('トウキョウト', 'ヒロシマケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList(['トウキョウト', 'ヒロシマケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList('トウキョウト', 'ヒロシマケン', 'トドウフケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList(['トウキョウト', 'ヒロシマケン', 'トドウフケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList('トウキョウ');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byKatakanaNameList(['トウキョウ']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byKatakanaNameList('トウキョウ', 'ヒロシマ');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList(['トウキョウ', 'ヒロシマ']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList('トウキョウ', 'ヒロシマ', 'トドウフケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList(['トウキョウ', 'ヒロシマ', 'トドウフケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList('トウ');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byKatakanaNameList(['トウ']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byKatakanaNameList('トウ', 'ヒロ');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList(['トウ', 'ヒロ']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList('トウ', 'ヒロ', 'トドウフケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byKatakanaNameList(['トウ', 'ヒロ', 'トドウフケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);
    }

    /**
     * @return void
     */
    public function testByEnglishNameList(): void
    {
        $collection = $this->prefecture->byEnglishNameList('tokyo');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byEnglishNameList(['tokyo']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byEnglishNameList('tokyo', 'hiroshima');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byEnglishNameList(['tokyo', 'hiroshima']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byEnglishNameList('tokyo', 'hiroshima', 'prefecture');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byEnglishNameList(['tokyo', 'hiroshima', 'prefecture']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byEnglishNameList('to');
        $this->assertSame(7, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byEnglishNameList(['to']);
        $this->assertSame(7, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byEnglishNameList('to', 'hiro');
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byEnglishNameList(['to', 'hiro']);
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byEnglishNameList('to', 'hiro', 'prefecture');
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byEnglishNameList(['to', 'hiro', 'prefecture']);
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);
    }

    /**
     * @return void
     */
    public function testByRegionIdList(): void
    {
        $collection = $this->prefecture->byRegionIdList(3);
        $this->assertSame(7, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byRegionIdList([3]);
        $this->assertSame(7, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byRegionIdList(3, 6);
        $this->assertSame(12, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byRegionIdList([3, 6]);
        $this->assertSame(12, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byRegionIdList(3, 6, 9);
        $this->assertSame(12, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byRegionIdList([3, 6, 9]);
        $this->assertSame(12, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);
    }

    /**
     * @return void
     */
    public function testByRegionNameList(): void
    {
        $collection = $this->prefecture->byRegionNameList('関東');
        $this->assertSame(7, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byRegionNameList(['関東']);
        $this->assertSame(7, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->byRegionNameList('関東', '中国');
        $this->assertSame(12, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byRegionNameList(['関東', '中国']);
        $this->assertSame(12, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byRegionNameList('関東', '中国', '都道府県');
        $this->assertSame(12, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->byRegionNameList(['関東', '中国', '都道府県']);
        $this->assertSame(12, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);
    }
}
