<?php
declare (strict_types=1);

namespace Php71count;

/**
 * @see https://github.com/php/php-src/commit/bfc10978eff5793a68e7aeb6144b5a2a393833f3
 */
if (!function_exists('is_countable')) {
    /**
     * @var mixed $var
     * @return bool
     */
    function is_countable($var): bool { 
        return (is_array($var) || $var instanceof Countable);
    }
}

/**
 * avoid warning error on php7.2 or heigher runtime environment
 * 
 * @var mixed $value
 * @return int
 */
function php71_count($value): int {
    if (is_countable($value)) {
        return count($value);
    }

    if (null === $value) {
        return 0;
    }

    //scalar, bool, object, callable..
    return 1;
}
