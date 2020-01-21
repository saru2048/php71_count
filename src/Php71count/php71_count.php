<?php
declare (strict_types=1);

namespace Php71count;

/**
 * @see https://github.com/php/php-src/commit/bfc10978eff5793a68e7aeb6144b5a2a393833f3
 */
if (!function_exists('is_countable')) {
    /**
     * @param mixed $var
     * @return bool
     */
    function is_countable($var): bool { 
        return (is_array($var) || $var instanceof Countable);
    }
}

/**
 * avoid warning error on php7.2 or heigher runtime environment
 * 
 * @param mixed $value int|float|string|null|bool|Object|callable
 * @param int $mode optional COUNT_NORMAL, COUNT_RECURSIVE
 * @return int
 */
function php71_count($value, int $mode = \COUNT_NORMAL): int {
    if (is_countable($value)) {
        return count($value, $mode);
    }

    if (null === $value) {
        return 0;
    }

    //scalar, bool, object, callable..
    return 1;
}
