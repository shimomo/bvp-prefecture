<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests\PrefectureCoreTests;

/**
 * @author shimomo
 */
class AllByTest extends TestCase
{
    /**
     * @return void
     */
    public function testAllById(): void
    {
        $collection = $this->prefecture->allById(13);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->allById([13]);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);

        $collection = $this->prefecture->allById(13, 34);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->allById([13, 34]);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->allById(13, 34, 48);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $collection = $this->prefecture->allById([13, 34, 48]);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 13);
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 34);

        $this->assertNull($this->prefecture->allById());
        $this->assertNull($this->prefecture->allById([]));
        $this->assertNull($this->prefecture->allById(48));
        $this->assertNull($this->prefecture->allById([48]));
    }

    /**
     * @return void
     */
    public function testAllByName(): void
    {
        $collection = $this->prefecture->allByName('東京都');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = $this->prefecture->allByName(['東京都']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = $this->prefecture->allByName('東京都', '広島県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName(['東京都', '広島県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName('東京都', '広島県', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName(['東京都', '広島県', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName('東京');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = $this->prefecture->allByName(['東京']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = $this->prefecture->allByName('東京', '広島');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName(['東京', '広島']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName('東京', '広島', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName(['東京', '広島', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName('東');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = $this->prefecture->allByName(['東']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');

        $collection = $this->prefecture->allByName('東', '広');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName(['東', '広']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName('東', '広', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $collection = $this->prefecture->allByName(['東', '広', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京都');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島県');

        $this->assertNull($this->prefecture->allByName());
        $this->assertNull($this->prefecture->allByName([]));
    }

    /**
     * @return void
     */
    public function testAllByShortName(): void
    {
        $collection = $this->prefecture->allByShortName('東京');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');

        $collection = $this->prefecture->allByShortName(['東京']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');

        $collection = $this->prefecture->allByShortName('東京', '広島');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = $this->prefecture->allByShortName(['東京', '広島']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = $this->prefecture->allByShortName('東京', '広島', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = $this->prefecture->allByShortName(['東京', '広島', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = $this->prefecture->allByShortName('東');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');

        $collection = $this->prefecture->allByShortName(['東']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');

        $collection = $this->prefecture->allByShortName('東', '広');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = $this->prefecture->allByShortName(['東', '広']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = $this->prefecture->allByShortName('東', '広', '都道府県');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $collection = $this->prefecture->allByShortName(['東', '広', '都道府県']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, '東京');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, '広島');

        $this->assertNull($this->prefecture->allByShortName('東京都'));
        $this->assertNull($this->prefecture->allByShortName(['東京都']));
        $this->assertNull($this->prefecture->allByShortName('東京都', '広島県'));
        $this->assertNull($this->prefecture->allByShortName(['東京都', '広島県']));
        $this->assertNull($this->prefecture->allByShortName('東京都', '広島県', '都道府県'));
        $this->assertNull($this->prefecture->allByShortName(['東京都', '広島県', '都道府県']));
        $this->assertNull($this->prefecture->allByShortName());
        $this->assertNull($this->prefecture->allByShortName([]));
    }

    /**
     * @return void
     */
    public function testAllByHiraganaName(): void
    {
        $collection = $this->prefecture->allByHiraganaName('とうきょうと');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = $this->prefecture->allByHiraganaName(['とうきょうと']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = $this->prefecture->allByHiraganaName('とうきょうと', 'ひろしまけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName(['とうきょうと', 'ひろしまけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName('とうきょうと', 'ひろしまけん', 'とどうふけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName(['とうきょうと', 'ひろしまけん', 'とどうふけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName('とうきょう');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = $this->prefecture->allByHiraganaName(['とうきょう']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = $this->prefecture->allByHiraganaName('とうきょう', 'ひろしま');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName(['とうきょう', 'ひろしま']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName('とうきょう', 'ひろしま', 'とどうふけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName(['とうきょう', 'ひろしま', 'とどうふけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName('とう');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = $this->prefecture->allByHiraganaName(['とう']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');

        $collection = $this->prefecture->allByHiraganaName('とう', 'ひろ');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName(['とう', 'ひろ']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName('とう', 'ひろ', 'とどうふけん');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $collection = $this->prefecture->allByHiraganaName(['とう', 'ひろ', 'とどうふけん']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'とうきょうと');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ひろしまけん');

        $this->assertNull($this->prefecture->allByHiraganaName());
        $this->assertNull($this->prefecture->allByHiraganaName([]));
    }

    /**
     * @return void
     */
    public function testAllByKatakanaName(): void
    {
        $collection = $this->prefecture->allByKatakanaName('トウキョウト');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = $this->prefecture->allByKatakanaName(['トウキョウト']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = $this->prefecture->allByKatakanaName('トウキョウト', 'ヒロシマケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName(['トウキョウト', 'ヒロシマケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName('トウキョウト', 'ヒロシマケン', 'トドウフケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName(['トウキョウト', 'ヒロシマケン', 'トドウフケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName('トウキョウ');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = $this->prefecture->allByKatakanaName(['トウキョウ']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = $this->prefecture->allByKatakanaName('トウキョウ', 'ヒロシマ');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName(['トウキョウ', 'ヒロシマ']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName('トウキョウ', 'ヒロシマ', 'トドウフケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName(['トウキョウ', 'ヒロシマ', 'トドウフケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName('トウ');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = $this->prefecture->allByKatakanaName(['トウ']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');

        $collection = $this->prefecture->allByKatakanaName('トウ', 'ヒロ');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName(['トウ', 'ヒロ']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName('トウ', 'ヒロ', 'トドウフケン');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $collection = $this->prefecture->allByKatakanaName(['トウ', 'ヒロ', 'トドウフケン']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'トウキョウト');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'ヒロシマケン');

        $this->assertNull($this->prefecture->allByKatakanaName());
        $this->assertNull($this->prefecture->allByKatakanaName([]));
    }

    /**
     * @return void
     */
    public function testAllByEnglishName(): void
    {
        $collection = $this->prefecture->allByEnglishName('tokyo');
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');

        $collection = $this->prefecture->allByEnglishName(['tokyo']);
        $this->assertSame(1, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');

        $collection = $this->prefecture->allByEnglishName('tokyo', 'hiroshima');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = $this->prefecture->allByEnglishName(['tokyo', 'hiroshima']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = $this->prefecture->allByEnglishName('tokyo', 'hiroshima', 'prefecture');
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = $this->prefecture->allByEnglishName(['tokyo', 'hiroshima', 'prefecture']);
        $this->assertSame(2, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = $this->prefecture->allByEnglishName('to');
        $this->assertSame(7, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');

        $collection = $this->prefecture->allByEnglishName(['to']);
        $this->assertSame(7, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');

        $collection = $this->prefecture->allByEnglishName('to', 'hiro');
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = $this->prefecture->allByEnglishName(['to', 'hiro']);
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = $this->prefecture->allByEnglishName('to', 'hiro', 'prefecture');
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $collection = $this->prefecture->allByEnglishName(['to', 'hiro', 'prefecture']);
        $this->assertSame(8, $collection->count());
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(13), $collection, 'tokyo');
        $this->assertPrefectureByKeyName($this->prefecturesDTO->get(34), $collection, 'hiroshima');

        $this->assertNull($this->prefecture->allByEnglishName());
        $this->assertNull($this->prefecture->allByEnglishName([]));
    }
}
