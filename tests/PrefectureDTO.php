<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

/**
 * @author shimomo
 */
class PrefectureDTO
{
    /**
     * @param  int     $id
     * @param  string  $name
     * @param  string  $shortName
     * @param  string  $hiraganaName
     * @param  string  $katakanaName
     * @param  string  $englishName
     * @param  string  $regionId
     * @param  string  $regionName
     * @return void
     */
    public function __construct(
        public int $id,
        public string $name,
        public string $shortName,
        public string $hiraganaName,
        public string $katakanaName,
        public string $englishName,
        public int $regionId,
        public string $regionName
    ) {}
}
