# Prefecture

[![Build Status](https://github.com/shimomo/bvp-prefecture/workflows/Tests/badge.svg)](https://github.com/shimomo/bvp-prefecture/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/shimomo/bvp-prefecture/graph/badge.svg?token=6DECMJOHLZ)](https://codecov.io/gh/shimomo/bvp-prefecture)
[![PHP Version Require](http://poser.pugx.org/bvp/prefecture/require/php)](https://packagist.org/packages/bvp/prefecture)
[![Latest Stable Version](https://poser.pugx.org/bvp/prefecture/v/stable)](https://packagist.org/packages/bvp/prefecture)
[![Latest Unstable Version](https://poser.pugx.org/bvp/prefecture/v/unstable)](https://packagist.org/packages/bvp/prefecture)
[![License](https://poser.pugx.org/bvp/prefecture/license)](https://packagist.org/packages/bvp/prefecture)

The BVP Prefecture package is designed to retrieve information about Japanese prefectures using identifiers, including Number (Region) and Name (Short, Hiragana, Katakana, English, Region).

## Installation
```bash
composer require bvp/prefecture
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use BVP\Prefecture\Prefecture;
```

### For all()
```php
$prefecture = Prefecture::all();

var_dump($prefecture);
/*------------------------------
array(47) {
  [1] => array(9) {
    'number' => int(1)
    'name' => string(9) "北海道"
    'short_name' => string(9) "北海道"
    'hiragana_name' => string(18) "ほっかいどう"
    'katakana_name' => string(18) "ホッカイドウ"
    'english_name' => string(8) "hokkaido"
    'region_number' => int(1)
    'region_name' => string(15) "北海道地方"
    'region_short_name' => string(9) "北海道"
  }
  ...
  [47] => array(9) {
    'number' => int(47)
    'name' => string(9) "沖縄県"
    'short_name' => string(6) "沖縄"
    'hiragana_name' => string(18) "おきなわけん"
    'katakana_name' => string(18) "オキナワケン"
    'english_name' => string(7) "okinawa"
    'region_number' => int(8)
    'region_name' => string(12) "九州地方"
    'region_short_name' => string(6) "九州"
  }
}
------------------------------*/
```

### For byXxxList()
```php
$prefecture = Prefecture::byNumberList(13, 34);
// or $prefecture = Prefecture::byNumberList([13, 34]);

$prefecture = Prefecture::byNameList('東京都', '広島県');
// or $prefecture = Prefecture::byNameList(['東京都', '広島県']);

$prefecture = Prefecture::byShortNameList('東京', '広島');
// or $prefecture = Prefecture::byShortNameList(['東京', '広島']);

$prefecture = Prefecture::byHiraganaNameList('とうきょうと', 'ひろしまけん');
// or $prefecture = Prefecture::byHiraganaNameList(['とうきょうと', 'ひろしまけん']);

$prefecture = Prefecture::byKatakanaNameList('トウキョウト', 'ヒロシマケン');
// or $prefecture = Prefecture::byKatakanaNameList(['トウキョウト', 'ヒロシマケン']);

$prefecture = Prefecture::byEnglishNameList('tokyo', 'hiroshima');
// or $prefecture = Prefecture::byEnglishNameList(['tokyo', 'hiroshima']);

var_dump($prefecture);
/*------------------------------
array(2) {
  [13] => array(9) {
    'number' => int(13)
    'name' => string(9) "東京都"
    'short_name' => string(6) "東京"
    'hiragana_name' => string(18) "とうきょうと"
    'katakana_name' => string(18) "トウキョウト"
    'english_name' => string(5) "tokyo"
    'region_number' => int(3)
    'region_name' => string(12) "関東地方"
    'region_short_name' => string(6) "関東"
  }
  [34] => array(9) {
    'number' => int(34)
    'name' => string(9) "広島県"
    'short_name' => string(6) "広島"
    'hiragana_name' => string(18) "ひろしまけん"
    'katakana_name' => string(18) "ヒロシマケン"
    'english_name' => string(9) "hiroshima"
    'region_number' => int(6)
    'region_name' => string(12) "中国地方"
    'region_short_name' => string(6) "中国"
  }
}
------------------------------*/

$prefecture = Prefecture::byRegionNumberList(3, 6);
// or $prefecture = Prefecture::byRegionNumberList([3, 6]);

$prefecture = Prefecture::byRegionNameList('関東', '中国');
// or $prefecture = Prefecture::byRegionNameList(['関東', '中国']);

var_dump($prefecture);
/*------------------------------
array(12) {
  [8] =>array(9) {
    'number' => int(8)
    'name' => string(9) "茨城県"
    'short_name' => string(6) "茨城"
    'hiragana_name' => string(18) "いばらきけん"
    'katakana_name' => string(18) "イバラキケン"
    'english_name' => string(7) "ibaraki"
    'region_number' => int(3)
    'region_name' => string(12) "関東地方"
    'region_short_name' => string(6) "関東"
  }
  [9] => array(9) {
    'number' => int(9)
    'name' => string(9) "栃木県"
    'short_name' => string(6) "栃木"
    'hiragana_name' => string(15) "とちぎけん"
    'katakana_name' => string(15) "トチギケン"
    'english_name' => string(7) "tochigi"
    'region_number' => int(3)
    'region_name' => string(12) "関東地方"
    'region_short_name' => string(6) "関東"
  }
  ...
  [34] =>array(9) {
    'number' => int(34)
    'name' => string(9) "広島県"
    'short_name' => string(6) "広島"
    'hiragana_name' => string(18) "ひろしまけん"
    'katakana_name' => string(18) "ヒロシマケン"
    'english_name' => string(9) "hiroshima"
    'region_number' => int(6)
    'region_name' => string(12) "中国地方"
    'region_short_name' => string(6) "中国"
  }
  [35] =>array(9) {
    'number' => int(35)
    'name' => string(9) "山口県"
    'short_name' => string(6) "山口"
    'hiragana_name' => string(18) "やまぐちけん"
    'katakana_name' => string(18) "ヤマグチケン"
    'english_name' => string(9) "yamaguchi"
    'region_number' => int(6)
    'region_name' => string(12) "中国地方"
    'region_short_name' => string(6) "中国"
  }
}
------------------------------*/
```

### For byXxx()
```php
$prefecture = Prefecture::byNumber(13);
// or $prefecture = Prefecture::byNumber([13]);

$prefecture = Prefecture::byName('東京都');
// or $prefecture = Prefecture::byName(['東京都']);

$prefecture = Prefecture::byShortName('東京');
// or $prefecture = Prefecture::byShortName(['東京']);

$prefecture = Prefecture::byHiraganaName('とうきょうと');
// or $prefecture = Prefecture::byHiraganaName(['とうきょうと']);

$prefecture = Prefecture::byKatakanaName('トウキョウト');
// or $prefecture = Prefecture::byKatakanaName(['トウキョウト']);

$prefecture = Prefecture::byEnglishName('tokyo');
// or $prefecture = Prefecture::byEnglishName(['tokyo']);

var_dump($prefecture);
/*------------------------------
array(9) {
  'number' => int(13)
  'name' => string(9) "東京都"
  'short_name' => string(6) "東京"
  'hiragana_name' => string(18) "とうきょうと"
  'katakana_name' => string(18) "トウキョウト"
  'english_name' => string(5) "tokyo"
  'region_number' => int(3)
  'region_name' => string(12) "関東地方"
  'region_short_name' => string(6) "関東"
}
------------------------------*/

$prefecture = Prefecture::byRegionNumber(3);
// or $prefecture = Prefecture::byRegionNumber([3]);

$prefecture = Prefecture::byRegionName('関東');
// or $prefecture = Prefecture::byRegionName(['関東']);

var_dump($prefecture);
/*------------------------------
array(9) {
  'number' => int(8)
  'name' => string(9) "茨城県"
  'short_name' => string(6) "茨城"
  'hiragana_name' => string(18) "いばらきけん"
  'katakana_name' => string(18) "イバラキケン"
  'english_name' => string(7) "ibaraki"
  'region_number' => int(3)
  'region_name' => string(12) "関東地方"
  'region_short_name' => string(6) "関東"
}
------------------------------*/
```

## License
The BVP Prefecture package is open source software licensed under the [MIT license](LICENSE).
