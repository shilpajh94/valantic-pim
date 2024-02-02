<?php

namespace ContitechCS\CatalogBundle\Document\Areabrick;

class BeltConstructionTable extends AbstractAreabrick
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'Belt Construction (Table)';
    }

    public function hasEditTemplate()
    {
        return true;
    }
}
