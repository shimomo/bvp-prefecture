# Prefecture

[![Build Status](https://github.com/BoatraceVentureProject/Prefecture/workflows/Tests/badge.svg)](https://github.com/BoatraceVentureProject/Prefecture/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/BoatraceVentureProject/Prefecture/graph/badge.svg?token=COKGMRB92M)](https://codecov.io/gh/BoatraceVentureProject/Prefecture)
[![Latest Stable Version](https://poser.pugx.org/bvp/prefecture/v/stable)](https://packagist.org/packages/bvp/prefecture)
[![Latest Unstable Version](https://poser.pugx.org/bvp/prefecture/v/unstable)](https://packagist.org/packages/bvp/prefecture)
[![License](https://poser.pugx.org/bvp/prefecture/license)](https://packagist.org/packages/bvp/prefecture)

The BVP Prefecture package is designed to retrieve information about Japanese prefectures using identifiers, including ID and name (short, Hiragana, Katakana, English).

## Installation
```bash
composer require bvp/prefecture
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Boatrace\Venture\Project\Prefecture;
```

### For all()
```php
$collection = Prefecture::all();
var_dump($collection);
/*------------------------------
object(Illuminate\Support\Collection)#9 (2) {
  ["items":protected]=>array(47) {
    [0]=>object(Illuminate\Support\Collection)#13 (2) {
      ["items":protected]=>array(6) {
        ["id"]=>int(1)
        ["name"]=>string(9) "北海道"
        ["short_name"]=>string(9) "北海道"
        ["hiragana_name"]=>string(18) "ほっかいどう"
        ["katakana_name"]=>string(18) "ホッカイドウ"
        ["english_name"]=>string(8) "hokkaido"
      }
      ["escapeWhenCastingToString":protected]=>bool(false)
    }
    [1]=>object(Illuminate\Support\Collection)#14 (2) {
      ["items":protected]=>array(6) {
        ["id"]=>int(2)
        ["name"]=>string(9) "青森県"
        ["short_name"]=>string(6) "青森"
        ["hiragana_name"]=>string(18) "あおもりけん"
        ["katakana_name"]=>string(18) "アオモリケン"
        ["english_name"]=>string(6) "aomori"
      }
      ["escapeWhenCastingToString":protected]=>bool(false)
    }
    ...
    [45]=>object(Illuminate\Support\Collection)#58 (2) {
      ["items":protected]=>array(6) {
        ["id"]=>int(46)
        ["name"]=>string(12) "鹿児島県"
        ["short_name"]=>string(9) "鹿児島"
        ["hiragana_name"]=>string(18) "かごしまけん"
        ["katakana_name"]=>string(18) "カゴシマケン"
        ["english_name"]=>string(9) "kagoshima"
      }
      ["escapeWhenCastingToString":protected]=>bool(false)
    }
    [46]=>object(Illuminate\Support\Collection)#59 (2) {
      ["items":protected]=>array(6) {
        ["id"]=>int(47)
        ["name"]=>string(9) "沖縄県"
        ["short_name"]=>string(6) "沖縄"
        ["hiragana_name"]=>string(18) "おきなわけん"
        ["katakana_name"]=>string(18) "オキナワケン"
        ["english_name"]=>string(7) "okinawa"
      }
      ["escapeWhenCastingToString":protected]=>bool(false)
    }
  }
  ["escapeWhenCastingToString":protected]=>bool(false)
}
------------------------------*/
```

### For allXxx()
```php
$collection = Prefecture::allId();
var_dump($collection);
/*------------------------------
object(Illuminate\Support\Collection)#6 (2) {
  ["items":protected]=>array(47) {
    [0]=>int(1)
    [1]=>int(2)
    ...
    [45]=>int(46)
    [46]=>int(47)
  }
  ["escapeWhenCastingToString":protected]=>bool(false)
}
------------------------------*/

$collection = Prefecture::allName();
var_dump($collection);
/*------------------------------
object(Illuminate\Support\Collection)#6 (2) {
  ["items":protected]=>array(47) {
    [0]=>string(9) "北海道"
    [1]=>string(9) "青森県"
    ...
    [45]=>string(12) "鹿児島県"
    [46]=>string(9) "沖縄県"
  }
  ["escapeWhenCastingToString":protected]=>bool(false)
}
------------------------------*/

$collection = Prefecture::allShortName();
var_dump($collection);
/*------------------------------
object(Illuminate\Support\Collection)#6 (2) {
  ["items":protected]=>array(47) {
    [0]=>string(9) "北海道"
    [1]=>string(6) "青森"
    ...
    [45]=>string(9) "鹿児島"
    [46]=>string(6) "沖縄"
  }
  ["escapeWhenCastingToString":protected]=>bool(false)
}
------------------------------*/

$collection = Prefecture::allHiraganaName();
var_dump($collection);
/*------------------------------
object(Illuminate\Support\Collection)#6 (2) {
  ["items":protected]=>array(47) {
    [0]=>string(18) "ほっかいどう"
    [1]=>string(18) "あおもりけん"
    ...
    [45]=>string(18) "かごしまけん"
    [46]=>string(18) "おきなわけん"
  }
  ["escapeWhenCastingToString":protected]=>bool(false)
}
------------------------------*/

$collection = Prefecture::allKatakanaName();
var_dump($collection);
/*------------------------------
object(Illuminate\Support\Collection)#6 (2) {
  ["items":protected]=>array(47) {
    [0]=>string(18) "ホッカイドウ"
    [1]=>string(18) "アオモリケン"
    ...
    [45]=>string(18) "カゴシマケン"
    [46]=>string(18) "オキナワケン"
  }
  ["escapeWhenCastingToString":protected]=>bool(false)
}
------------------------------*/

$collection = Prefecture::allEnglishName();
var_dump($collection);
/*------------------------------
object(Illuminate\Support\Collection)#6 (2) {
  ["items":protected]=>array(47) {
    [0]=>string(8) "hokkaido"
    [1]=>string(6) "aomori"
    ...
    [45]=>string(9) "kagoshima"
    [46]=>string(7) "okinawa"
  }
  ["escapeWhenCastingToString":protected]=>bool(false)
}
------------------------------*/
```

### For allByXxx()
```php
$collection = Prefecture::allById(13, 34);
var_dump($collection->get(13)->get('id'));            // int(13)
var_dump($collection->get(13)->get('name'));          // string(9) "東京都"
var_dump($collection->get(13)->get('short_name'));    // string(6) "東京"
var_dump($collection->get(13)->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get(13)->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get(13)->get('english_name'));  // string(5) "tokyo"

$collection = Prefecture::allByName('東京都', '広島県');
var_dump($collection->get('東京都')->get('id'));            // int(13)
var_dump($collection->get('東京都')->get('name'));          // string(9) "東京都"
var_dump($collection->get('東京都')->get('short_name'));    // string(6) "東京"
var_dump($collection->get('東京都')->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('東京都')->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('東京都')->get('english_name'));  // string(5) "tokyo"

$collection = Prefecture::allByShortName('東京', '広島');
var_dump($collection->get('東京')->get('id'));            // int(13)
var_dump($collection->get('東京')->get('name'));          // string(9) "東京都"
var_dump($collection->get('東京')->get('short_name'));    // string(6) "東京"
var_dump($collection->get('東京')->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('東京')->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('東京')->get('english_name'));  // string(5) "tokyo"

$collection = Prefecture::allByHiraganaName('とうきょうと', 'ひろしまけん');
var_dump($collection->get('とうきょうと')->get('id'));            // int(13)
var_dump($collection->get('とうきょうと')->get('name'));          // string(9) "東京都"
var_dump($collection->get('とうきょうと')->get('short_name'));    // string(6) "東京"
var_dump($collection->get('とうきょうと')->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('とうきょうと')->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('とうきょうと')->get('english_name'));  // string(5) "tokyo"

$collection = Prefecture::allByKatakanaName('トウキョウト', 'ヒロシマケン');
var_dump($collection->get('トウキョウト')->get('id'));            // int(13)
var_dump($collection->get('トウキョウト')->get('name'));          // string(9) "東京都"
var_dump($collection->get('トウキョウト')->get('short_name'));    // string(6) "東京"
var_dump($collection->get('トウキョウト')->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('トウキョウト')->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('トウキョウト')->get('english_name'));  // string(5) "tokyo"

$collection = Prefecture::allByEnglishName('tokyo', 'hiroshima');
var_dump($collection->get('tokyo')->get('id'));            // int(13)
var_dump($collection->get('tokyo')->get('name'));          // string(9) "東京都"
var_dump($collection->get('tokyo')->get('short_name'));    // string(6) "東京"
var_dump($collection->get('tokyo')->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('tokyo')->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('tokyo')->get('english_name'));  // string(5) "tokyo"
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

$collection = Prefecture::byName('東京都');
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"

$collection = Prefecture::byShortName('東京');
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"

$collection = Prefecture::byHiraganaName('とうきょうと');
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"

$collection = Prefecture::byKatakanaName('トウキョウト');
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"

$collection = Prefecture::byEnglishName('tokyo');
var_dump($collection->get('id'));            // int(13)
var_dump($collection->get('name'));          // string(9) "東京都"
var_dump($collection->get('short_name'));    // string(6) "東京"
var_dump($collection->get('hiragana_name')); // string(18) "とうきょうと"
var_dump($collection->get('katakana_name')); // string(18) "トウキョウト"
var_dump($collection->get('english_name'));  // string(5) "tokyo"
```

## License
The BVP Prefecture package is open source software licensed under the [MIT license](LICENSE).
