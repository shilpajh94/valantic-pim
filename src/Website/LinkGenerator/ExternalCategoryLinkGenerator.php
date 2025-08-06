<?php

declare(strict_types=1);

namespace App\Website\LinkGenerator;

use Pimcore\Model\DataObject\ClassDefinition\LinkGeneratorInterface;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ExternalCategoryLinkGenerator implements LinkGeneratorInterface
{
    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
    ) {
    }

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

        return $this->urlGenerator->generate('admin_export_preview', [
            'id' => $object->getId(),
            '_locale' => $locale,
        ], $reset ? UrlGeneratorInterface::ABSOLUTE_URL : UrlGeneratorInterface::RELATIVE_PATH);
    }
}
