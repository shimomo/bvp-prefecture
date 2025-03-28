<?php

declare(strict_types=1);

namespace BVP\Prefecture;

/**
 * @author shimomo
 */
interface PrefectureInterface
{
    /**
     * @param  \BVP\Prefecture\PrefectureCoreInterface|null  $prefectureCore
     * @return \BVP\Prefecture\PrefectureInterface
     */
    public static function getInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface;

    /**
     * @param  \BVP\Prefecture\PrefectureCoreInterface|null  $prefectureCore
     * @return \BVP\Prefecture\PrefectureInterface
     */
    public static function createInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface;

    /**
     * @return void
     */
    public static function resetInstance(): void;
}
