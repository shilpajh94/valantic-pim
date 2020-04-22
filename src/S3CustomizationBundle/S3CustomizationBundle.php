<?php

namespace S3CustomizationBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class S3CustomizationBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/s3customization/js/pimcore/startup.js'
        ];
    }
}
