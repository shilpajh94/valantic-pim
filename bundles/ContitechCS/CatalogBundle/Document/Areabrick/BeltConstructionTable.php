<?php

namespace ContitechCS\CatalogBundle\Document\Areabrick;



class BeltConstructionTable extends AbstractAreabrick
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Belt Construction (Table)';
    }

    public function hasEditTemplate()
    {
        return true;
    }
}