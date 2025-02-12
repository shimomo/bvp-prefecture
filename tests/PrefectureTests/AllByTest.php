<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureTests;

use BVP\Prefecture\Prefecture;
use BVP\Prefecture\Tests\PrefectureTestCase;

/**
 * @author shimomo
 */
class AllByTest extends PrefectureTestCase
{
    /**
     * @return void
     */
    public function testAllById(): void
    {
        $collection = Prefecture::allById(13);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = Prefecture::allById([13]);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = Prefecture::allById(13, 34);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = Prefecture::allById([13, 34]);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = Prefecture::allById(13, 34, 48);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = Prefecture::allById([13, 34, 48]);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $this->assertNull(Prefecture::allById());
        $this->assertNull(Prefecture::allById([]));
        $this->assertNull(Prefecture::allById(48));
        $this->assertNull(Prefecture::allById([48]));
    }

    /**
     * @return void
     */
    public function testAllByName(): void
    {
        $collection = Prefecture::allByName('東京都');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = Prefecture::allByName(['東京都']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = Prefecture::allByName('東京都', '広島県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName(['東京都', '広島県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName('東京都', '広島県', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName(['東京都', '広島県', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName('東京');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = Prefecture::allByName(['東京']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = Prefecture::allByName('東京', '広島');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName(['東京', '広島']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName('東京', '広島', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName(['東京', '広島', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName('東');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = Prefecture::allByName(['東']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = Prefecture::allByName('東', '広');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName(['東', '広']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName('東', '広', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = Prefecture::allByName(['東', '広', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $this->assertNull(Prefecture::allByName());
        $this->assertNull(Prefecture::allByName([]));
    }

    /**
     * @return void
     */
    public function testAllByShortName(): void
    {
        $collection = Prefecture::allByShortName('東京');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');

        $collection = Prefecture::allByShortName(['東京']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');

        $collection = Prefecture::allByShortName('東京', '広島');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = Prefecture::allByShortName(['東京', '広島']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = Prefecture::allByShortName('東京', '広島', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = Prefecture::allByShortName(['東京', '広島', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = Prefecture::allByShortName('東');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');

        $collection = Prefecture::allByShortName(['東']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');

        $collection = Prefecture::allByShortName('東', '広');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = Prefecture::allByShortName(['東', '広']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = Prefecture::allByShortName('東', '広', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = Prefecture::allByShortName(['東', '広', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $this->assertNull(Prefecture::allByShortName('東京都'));
        $this->assertNull(Prefecture::allByShortName(['東京都']));
        $this->assertNull(Prefecture::allByShortName('東京都', '広島県'));
        $this->assertNull(Prefecture::allByShortName(['東京都', '広島県']));
        $this->assertNull(Prefecture::allByShortName('東京都', '広島県', '都道府県'));
        $this->assertNull(Prefecture::allByShortName(['東京都', '広島県', '都道府県']));
        $this->assertNull(Prefecture::allByShortName());
        $this->assertNull(Prefecture::allByShortName([]));
    }

    /**
     * @return void
     */
    public function testAllByHiraganaName(): void
    {
        $collection = Prefecture::allByHiraganaName('とうきょうと');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = Prefecture::allByHiraganaName(['とうきょうと']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = Prefecture::allByHiraganaName('とうきょうと', 'ひろしまけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName(['とうきょうと', 'ひろしまけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName('とうきょうと', 'ひろしまけん', 'とどうふけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName(['とうきょうと', 'ひろしまけん', 'とどうふけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName('とうきょう');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = Prefecture::allByHiraganaName(['とうきょう']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = Prefecture::allByHiraganaName('とうきょう', 'ひろしま');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName(['とうきょう', 'ひろしま']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName('とうきょう', 'ひろしま', 'とどうふけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName(['とうきょう', 'ひろしま', 'とどうふけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName('とう');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = Prefecture::allByHiraganaName(['とう']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = Prefecture::allByHiraganaName('とう', 'ひろ');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName(['とう', 'ひろ']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName('とう', 'ひろ', 'とどうふけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = Prefecture::allByHiraganaName(['とう', 'ひろ', 'とどうふけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $this->assertNull(Prefecture::allByHiraganaName());
        $this->assertNull(Prefecture::allByHiraganaName([]));
    }

    /**
     * @return void
     */
    public function testAllByKatakanaName(): void
    {
        $collection = Prefecture::allByKatakanaName('トウキョウト');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = Prefecture::allByKatakanaName(['トウキョウト']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = Prefecture::allByKatakanaName('トウキョウト', 'ヒロシマケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName(['トウキョウト', 'ヒロシマケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName('トウキョウト', 'ヒロシマケン', 'トドウフケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName(['トウキョウト', 'ヒロシマケン', 'トドウフケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName('トウキョウ');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = Prefecture::allByKatakanaName(['トウキョウ']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = Prefecture::allByKatakanaName('トウキョウ', 'ヒロシマ');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName(['トウキョウ', 'ヒロシマ']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName('トウキョウ', 'ヒロシマ', 'トドウフケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName(['トウキョウ', 'ヒロシマ', 'トドウフケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName('トウ');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = Prefecture::allByKatakanaName(['トウ']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = Prefecture::allByKatakanaName('トウ', 'ヒロ');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName(['トウ', 'ヒロ']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName('トウ', 'ヒロ', 'トドウフケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = Prefecture::allByKatakanaName(['トウ', 'ヒロ', 'トドウフケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $this->assertNull(Prefecture::allByKatakanaName());
        $this->assertNull(Prefecture::allByKatakanaName([]));
    }

    /**
     * @return void
     */
    public function testAllByEnglishName(): void
    {
        $collection = Prefecture::allByEnglishName('tokyo');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');

        $collection = Prefecture::allByEnglishName(['tokyo']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');

        $collection = Prefecture::allByEnglishName('tokyo', 'hiroshima');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = Prefecture::allByEnglishName(['tokyo', 'hiroshima']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = Prefecture::allByEnglishName('tokyo', 'hiroshima', 'prefecture');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = Prefecture::allByEnglishName(['tokyo', 'hiroshima', 'prefecture']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = Prefecture::allByEnglishName('to');
        $this->assertSame(7, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');

        $collection = Prefecture::allByEnglishName(['to']);
        $this->assertSame(7, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');

        $collection = Prefecture::allByEnglishName('to', 'hiro');
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = Prefecture::allByEnglishName(['to', 'hiro']);
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = Prefecture::allByEnglishName('to', 'hiro', 'prefecture');
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = Prefecture::allByEnglishName(['to', 'hiro', 'prefecture']);
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $this->assertNull(Prefecture::allByEnglishName());
        $this->assertNull(Prefecture::allByEnglishName([]));
    }
}
