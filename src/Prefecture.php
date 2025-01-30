<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
class Prefecture implements PrefectureInterface
{
    /**
     * @var \Boatrace\Venture\Project\PrefectureInterface|null
     */
    private static ?PrefectureInterface $instance;

    /**
     * @param  \Boatrace\Venture\Project\PrefectureCoreInterface  $prefecture
     * @return void
     */
    public function __construct(private readonly PrefectureCoreInterface $prefecture) {}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public function __call(string $name, array $arguments): ?Collection
    {
        return $this->prefecture->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public static function __callStatic(string $name, array $arguments): ?Collection
    {
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @param  \Boatrace\Venture\Project\PrefectureCoreInterface|null  $prefectureCore
     * @return \Boatrace\Venture\Project\PrefectureInterface
     */
    public static function getInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface
    {
        return self::$instance ??= new self($prefectureCore ?? new PrefectureCore());
    }

    /**
     * @param  \Boatrace\Venture\Project\PrefectureCoreInterface|null  $prefectureCore
     * @return \Boatrace\Venture\Project\PrefectureInterface
     */
    public static function createInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface
    {
        return self::$instance = new self($prefectureCore ?? new PrefectureCore());
    }

    /**
     * @return void
     */
    public static function resetInstance(): void
    {
        self::$instance = null;
    }
}
