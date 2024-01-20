<?php

namespace RestApiBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class RestApiBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/restapi/js/pimcore/startup.js',
            '/bundles/restapi/js/pimcore/headerSorter.js',
            '/bundles/restapi/js/pimcore/formattedGridHandlerMapper.js',
        ];
    }
}
