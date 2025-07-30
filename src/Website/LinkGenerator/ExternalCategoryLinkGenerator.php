<?php

declare(strict_types=1);

namespace App\Website\LinkGenerator;

use Pimcore\Model\DataObject\ClassDefinition\LinkGeneratorInterface;
use Pimcore\Model\DataObject\UniProductCategoryExternal;

class ExternalCategoryLinkGenerator implements LinkGeneratorInterface
{
    /**
     * Generates a link for the given UniProductCategoryExternal object.
     *
     * @param array<string, string> $params
     *
     * @throws \InvalidArgumentException
     */
    public function generate(object $object, array $params = [], bool $reset = false): string
    {
        if (!$object instanceof UniProductCategoryExternal) {
            throw new \InvalidArgumentException('Expected UniProductCategoryExternal');
        }

        $locale = $params['locale'] ?? 'en';

        return '/admin/export/preview?' . http_build_query([
            'id' => $object->getId(),
            '_locale' => $locale,
        ]);
    }
}
