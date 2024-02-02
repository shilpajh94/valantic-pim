<?php
namespace ContitechCS\CatalogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class SingleHeadingBrick extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Single Heading';
    }

    public function getDescription(): string
    {
        return 'Single Heading';
    }

    public function getTemplate(): ?string
    {
        return null;
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }

    public function getTemplateSuffix(): string
    {
        return static::TEMPLATE_SUFFIX_TWIG;
    }
}
