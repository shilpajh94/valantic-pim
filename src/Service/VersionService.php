<?php

declare(strict_types=1);

namespace App\Service;

use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\Version;

class VersionService
{
    private static bool $useLatestVersion = false;

    public static function getUseLatestVersion(): bool
    {
        return self::$useLatestVersion;
    }

    public static function useLatestVersion(bool $useLatestVersion): void
    {
        self::$useLatestVersion = $useLatestVersion;
    }

    /**
     * Type-safe retrieval of either the currently published or the newest ("latest") version of an object.
     *
     * Regarding PhpDoc: https://phpstan.org/blog/generics-in-php-using-phpdocs#type-variables
     *
     * @template T of Concrete
     *
     * @param T $concrete
     *
     * @return T
     */
    public static function getPublishedOrLatestVersion(Concrete $concrete): Concrete
    {
        if (!self::$useLatestVersion) {
            return $concrete;
        }

        $latestVersion = $concrete->getLatestVersion();

        if ($latestVersion instanceof Version) {
            return $latestVersion->getData();
        }

        return $concrete;
    }
}
