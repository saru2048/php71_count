# PHP71 compatible count function for PHP7.2 or above


## Requirements

- PHP 7.2 or above

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


### Author

Satoru Nagai - <aluminum2024@gmail.com>

``` 
