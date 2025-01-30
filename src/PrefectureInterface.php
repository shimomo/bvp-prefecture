<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
interface PrefectureInterface
{
    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public function __call(string $name, array $arguments): ?Collection;

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public static function __callStatic(string $name, array $arguments): ?Collection;

    /**
     * @param  \Boatrace\Venture\Project\PrefectureCoreInterface|null  $prefectureCore
     * @return \Boatrace\Venture\Project\PrefectureInterface
     */
    public static function getInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface;

    /**
     * @param  \Boatrace\Venture\Project\PrefectureCoreInterface|null  $prefectureCore
     * @return \Boatrace\Venture\Project\PrefectureInterface
     */
    public static function createInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface;

    /**
     * @return void
     */
    public static function resetInstance(): void;
}
