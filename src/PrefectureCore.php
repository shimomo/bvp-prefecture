<?php

declare(strict_types=1);

namespace BVP\Prefecture;

use BadMethodCallException;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * @author shimomo
 */
class PrefectureCore implements PrefectureCoreInterface
{
    /**
     * @var \Illuminate\Support\Collection
     */
    private Collection $prefectures;

    /**
     * @var array
     */
    private array $resolveMethodMap = [
        '/^all(?!By)(.*)$/u' => 'all',
        '/^allBy(.+)$/u' => 'allBy',
        '/^by(.+)$/u' => 'by',
    ];

    /**
     * @return void
     */
    public function __construct()
    {
        Collection::macro('recursive', fn() => $this->map(
            fn($value) => is_array($value) || is_object($value)
                ? collect($value)->recursive()
                : $value
        ));
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public function __call(string $name, array $arguments): ?Collection
    {
        $this->prefectures ??= collect(
            require __DIR__ . '/../config/prefectures.php'
        )->recursive();

        return $this->resolveMethod($name, $arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     *
     * @throws \BadMethodCallException
     */
    private function resolveMethod(string $name, array $arguments): ?Collection
    {
        foreach ($this->resolveMethodMap as $pattern => $method) {
            if (preg_match($pattern, $name, $matches)) {
                if (is_callable([$this, $method])) {
                    return $this->$method($matches[1], $arguments);
                }
            }
        }

        throw new BadMethodCallException(
            __METHOD__ . "() - The specified method '{$name}' does not exist in class '" . self::class . "'."
        );
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection
     */
    private function all(string $name, array $arguments): Collection
    {
        $snakeCaseName = Str::snake($name);
        $filtered = $this->prefectures->filter(
            fn($prefecture) => $prefecture->has($snakeCaseName)
        );

        if ($filtered->isNotEmpty()) {
            return $this->prefectures->pluck($snakeCaseName);
        }

        return $this->prefectures;
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    private function allBy(string $name, array $arguments): ?Collection
    {
        if (empty($arguments)) {
            return null;
        }

        $prefectureKey = Str::snake($name);
        $exactMatchedPrefectures = $this->prefectures->whereIn($prefectureKey, $arguments);
        if ($exactMatchedPrefectures->isNotEmpty()) {
            return $exactMatchedPrefectures->keyBy('id');
        }

        $argumentsCollection = collect($arguments);
        $partialMatchedPrefectures = $this->prefectures->filter(
            fn($value, $key) => $argumentsCollection->filter(
                fn($argument) => Str::contains($value->get($prefectureKey), $argument)
            )->isNotEmpty()
        );
        if ($partialMatchedPrefectures->isNotEmpty()) {
            return $partialMatchedPrefectures->keyBy('id');
        }

        return null;
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    private function by(string $name, array $arguments): ?Collection
    {
        if (empty($arguments)) {
            return null;
        }

        $prefectures = $this->prefectures->keyBy(Str::snake($name));
        if ($prefectures->has($arguments[0])) {
            return $prefectures->get($arguments[0]);
        }

        return $prefectures->filter(
            fn($value, $key) => Str::contains($key, $arguments[0])
        )->first();
    }
}
