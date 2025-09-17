<?php

declare(strict_types=1);

namespace App\Util;

class Helpers
{
    /**
     * Return the class name without namespace from an object or qualified namespaced name.
     *
     * @param class-string|object $class
     */
    public static function classBasename(string|object $class): string
    {
        $class = is_object($class) ? $class::class : $class;

        return basename(str_replace('\\', '/', $class));
    }
}
