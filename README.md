# Prefecture

[![Build Status](https://github.com/BoatraceVentureProject/Prefecture/workflows/Tests/badge.svg)](https://github.com/BoatraceVentureProject/Prefecture/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/BoatraceVentureProject/Prefecture/graph/badge.svg?token=mmXNGPTaz1)](https://codecov.io/gh/BoatraceVentureProject/Prefecture)
[![Latest Stable Version](https://poser.pugx.org/bvp/prefecture/v/stable)](https://packagist.org/packages/bvp/prefecture)
[![Latest Unstable Version](https://poser.pugx.org/bvp/prefecture/v/unstable)](https://packagist.org/packages/bvp/prefecture)
[![License](https://poser.pugx.org/bvp/prefecture/license)](https://packagist.org/packages/bvp/prefecture)

The BVP Prefecture package is designed to retrieve information about Japanese prefectures using identifiers, including ID (Region) and Name (Short, Hiragana, Katakana, English, Region).

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
$collection = Prefecture::all();
var_dump($collection);
/*------------------------------
object(Illuminate\Support\Collection)#9 (2) {
  ["items":protected]=>array(47) {
    [1]=>object(Illuminate\Support\Collection)#13 (2) {
      ["items":protected]=>array(6) {
        ["id"]=>int(1)
        ["name"]=>string(9) "北海道"
        ["short_name"]=>string(9) "北海道"
        ["hiragana_name"]=>string(18) "ほっかいどう"
        ["katakana_name"]=>string(18) "ホッカイドウ"
        ["english_name"]=>string(8) "hokkaido"
        ["region_id"]=>int(1)
        ["region_name"]=>string(6) "北海道"
      }
      ["escapeWhenCastingToString":protected]=>bool(false)
    }
    ...
    [47]=>object(Illuminate\Support\Collection)#59 (2) {
      ["items":protected]=>array(6) {
        ["id"]=>int(47)
        ["name"]=>string(9) "沖縄県"
        ["short_name"]=>string(6) "沖縄"
        ["hiragana_name"]=>string(18) "おきなわけん"
        ["katakana_name"]=>string(18) "オキナワケン"
        ["english_name"]=>string(7) "okinawa"
        ["region_id"]=>int(8)
        ["region_name"]=>string(6) "九州"
      }
      ["escapeWhenCastingToString":protected]=>bool(false)
    }
  }
  ["escapeWhenCastingToString":protected]=>bool(false)
}
------------------------------*/
```

### For byXxxList()
```php
$collection = Prefecture::byIdList(13, 34);
var_dump($collection->get(13)->get('id'));            // int(13)
var_dump($collection->get(13)->get('name'));          // string(9) "東京都"
var_dump($collection->get(13)->get('short_name'));    // string(6) "東京"
var_dump($collection->get(13)->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get(13)->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get(13)->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get(13)->get('region_id'));     // int(3)
var_dump($collection->get(13)->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byNameList('東京都', '広島県');
var_dump($collection->get(13)->get('id'));            // int(13)
var_dump($collection->get(13)->get('name'));          // string(9) "東京都"
var_dump($collection->get(13)->get('short_name'));    // string(6) "東京"
var_dump($collection->get(13)->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get(13)->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get(13)->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get(13)->get('region_id'));     // int(3)
var_dump($collection->get(13)->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byShortNameList('東京', '広島');
var_dump($collection->get(13)->get('id'));            // int(13)
var_dump($collection->get(13)->get('name'));          // string(9) "東京都"
var_dump($collection->get(13)->get('short_name'));    // string(6) "東京"
var_dump($collection->get(13)->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get(13)->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get(13)->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get(13)->get('region_id'));     // int(3)
var_dump($collection->get(13)->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byHiraganaNameList('とうきょうと', 'ひろしまけん');
var_dump($collection->get(13)->get('id'));            // int(13)
var_dump($collection->get(13)->get('name'));          // string(9) "東京都"
var_dump($collection->get(13)->get('short_name'));    // string(6) "東京"
var_dump($collection->get(13)->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get(13)->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get(13)->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get(13)->get('region_id'));     // int(3)
var_dump($collection->get(13)->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byKatakanaNameList('トウキョウト', 'ヒロシマケン');
var_dump($collection->get(13)->get('id'));            // int(13)
var_dump($collection->get(13)->get('name'));          // string(9) "東京都"
var_dump($collection->get(13)->get('short_name'));    // string(6) "東京"
var_dump($collection->get(13)->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get(13)->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get(13)->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get(13)->get('region_id'));     // int(3)
var_dump($collection->get(13)->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byEnglishNameList('tokyo', 'hiroshima');
var_dump($collection->get(13)->get('id'));            // int(13)
var_dump($collection->get(13)->get('name'));          // string(9) "東京都"
var_dump($collection->get(13)->get('short_name'));    // string(6) "東京"
var_dump($collection->get(13)->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get(13)->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get(13)->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get(13)->get('region_id'));     // int(3)
var_dump($collection->get(13)->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byRegionIdList(3, 6);
var_dump($collection->get(13)->get('id'));            // int(13)
var_dump($collection->get(13)->get('name'));          // string(9) "東京都"
var_dump($collection->get(13)->get('short_name'));    // string(6) "東京"
var_dump($collection->get(13)->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get(13)->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get(13)->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get(13)->get('region_id'));     // int(3)
var_dump($collection->get(13)->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byRegionNameList('関東', '中国');
var_dump($collection->get(13)->get('id'));            // int(13)
var_dump($collection->get(13)->get('name'));          // string(9) "東京都"
var_dump($collection->get(13)->get('short_name'));    // string(6) "東京"
var_dump($collection->get(13)->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get(13)->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get(13)->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get(13)->get('region_id'));     // int(3)
var_dump($collection->get(13)->get('region_name'));   // string(6) "関東"
```

### For byXxx()
```php
$collection = Prefecture::byId(13);
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get('region_id'));     // int(3)
var_dump($collection->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byName('東京都');
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get('region_id'));     // int(3)
var_dump($collection->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byShortName('東京');
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get('region_id'));     // int(3)
var_dump($collection->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byHiraganaName('とうきょうと');
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get('region_id'));     // int(3)
var_dump($collection->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byKatakanaName('トウキョウト');
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get('region_id'));     // int(3)
var_dump($collection->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byEnglishName('tokyo');
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"
var_dump($collection->get('region_id'));     // int(3)
var_dump($collection->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byRegionId(3);
var_dump($collection->get('id'));            // int(8)
var_dump($collection->get('name'));          // string(9) "茨城県"
var_dump($collection->get('short_name'));    // string(6) "茨城"
var_dump($collection->get('hiragana_name')); // string(18) "いばらきけん"
var_dump($collection->get('katakana_name')); // string(18) "イバラキケン"
var_dump($collection->get('english_name'));  // string(5) "ibaraki"
var_dump($collection->get('region_id'));     // int(3)
var_dump($collection->get('region_name'));   // string(6) "関東"

$collection = Prefecture::byRegionName('関東');
var_dump($collection->get('id'));            // int(8)
var_dump($collection->get('name'));          // string(9) "茨城県"
var_dump($collection->get('short_name'));    // string(6) "茨城"
var_dump($collection->get('hiragana_name')); // string(18) "いばらきけん"
var_dump($collection->get('katakana_name')); // string(18) "イバラキケン"
var_dump($collection->get('english_name'));  // string(5) "ibaraki"
var_dump($collection->get('region_id'));     // int(3)
var_dump($collection->get('region_name'));   // string(6) "関東"
```

## License
The BVP Prefecture package is open source software licensed under the [MIT license](LICENSE).
