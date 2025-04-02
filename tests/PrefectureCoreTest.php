<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

use BVP\Prefecture\PrefectureCore;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class PrefectureCoreTest extends TestCase
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
        $this->prefecture = new PrefectureCore();
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureCoreDataProvider::class, 'allProvider')]
    public function testAll(array $arguments, array $expected): void
    {
        $this->assertSame(array_combine(
            array_map(fn($key) => $key + 1, array_keys($expected)),
            array_values($expected)
        ), $this->prefecture->all(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureCoreDataProvider::class, 'byNumberListProvider')]
    public function testByNumberList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byNumberList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureCoreDataProvider::class, 'byNameListProvider')]
    public function testByNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureCoreDataProvider::class, 'byShortNameListProvider')]
    public function testByShortNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byShortNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureCoreDataProvider::class, 'byHiraganaNameListProvider')]
    public function testByHiraganaNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byHiraganaNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureCoreDataProvider::class, 'byKatakanaNameListProvider')]
    public function testByKatakanaNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byKatakanaNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureCoreDataProvider::class, 'byEnglishNameListProvider')]
    public function testByEnglishNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byEnglishNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureCoreDataProvider::class, 'byRegionNumberListProvider')]
    public function testByRegionNumberList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byRegionNumberList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureCoreDataProvider::class, 'byRegionNameListProvider')]
    public function testByRegionNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byRegionNameList(...$arguments));
    }

    /**
     * @return void
     */
    public function testExceptionOnDoesNotExistMethodCall(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\Prefecture\PrefectureCore::resolveMethod() - " .
            "The specified method 'invalid' does not exist in class 'BVP\Prefecture\PrefectureCore'."
        );

        $this->prefecture->invalid();
    }
}
