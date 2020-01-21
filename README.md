# PHP71 compatible count function for PHP7.2 or above


## Requirements

- PHP 7.2 or above

## installation

```bash
$ composer require php71_count/php71_count
```

## Basic Usage


```php
<?php
declare (strict_types=1);

namespace Foo;

use function Php71count\php71_count;


$value = 100;

// Warning
if (count($value)) {
// ..do something
}

//without Warning
if (php71_conunt($value)) {
// ..do something
}
```

## As a global function

index.php or something like Bootstrap.php

```php

declare (strict_types=1);

use function Php71count\php71_count;

/**
 * @param mixed $value
 * @param int $mode optional
 */
function xcount($value, int $mode = \COUNT_NORMAL): int {
    return php71_count($value, $mode);
}

```

replace older app code

```
+if (xcount($value) > 0) {
-if (count($value) > 0) {
```

### Author

Satoru Nagai - <aluminum2024@gmail.com>


