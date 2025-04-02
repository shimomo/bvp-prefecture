<?php

declare(strict_types=1);

namespace BVP\Prefecture;

use BadMethodCallException;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use InvalidArgumentException;

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
        '/^(all)$/u' => 'all',
        '/^by(.+)List$/u' => 'byList',
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

        $this->prefectures ??= collect(
            require __DIR__ . '/../config/prefectures.php'
        )->recursive();
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return array|null
     */
    public function __call(string $name, array $arguments): ?array
    {
        return $this->resolveMethod($name, $arguments)?->toArray();
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
        return $this->prefectures->keyby('number');
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     *
     * @throws \InvalidArgumentException
     */
    private function byList(string $name, array $arguments): ?Collection
    {
        if (($countArguments = count($arguments)) === 0) {
            throw new InvalidArgumentException(
                __METHOD__ . "() - Too few arguments to function " . self::class . "::by{$name}(), " .
                "$countArguments passed and exactly 1 expected."
            );
        }

        $prefectureKey = Str::snake($name);
        $exactMatchedPrefectures = $this->prefectures->whereIn($prefectureKey, $arguments);
        if ($exactMatchedPrefectures->isNotEmpty()) {
            return $exactMatchedPrefectures->keyBy('number');
        }

        $argumentsCollection = collect($arguments);
        $partialMatchedPrefectures = $this->prefectures->filter(
            fn($value, $key) => $argumentsCollection->filter(
                fn($argument) => Str::contains($value->get($prefectureKey), $argument)
            )->isNotEmpty()
        );
        if ($partialMatchedPrefectures->isNotEmpty()) {
            return $partialMatchedPrefectures->keyBy('number');
        }

        return null;
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     *
     * @throws \InvalidArgumentException
     */
    private function by(string $name, array $arguments): ?Collection
    {
        if (($countArguments = count($arguments)) !== 1) {
            $messageType = $countArguments === 0 ? 'few' : 'many';
            throw new InvalidArgumentException(
                __METHOD__ . "() - Too {$messageType} arguments to function " . self::class . "::by{$name}(), " .
                "$countArguments passed and exactly 1 expected."
            );
        }

        $prefectureKey = Str::snake($name);
        $exactMatchedPrefecture = $this->prefectures->firstWhere($prefectureKey, $arguments[0]);
        if (!is_null($exactMatchedPrefecture)) {
            return $exactMatchedPrefecture;
        }

        return $this->prefectures->filter(
            fn($value, $key) => Str::contains($value->get($prefectureKey), $arguments[0])
        )->first();
    }
}
