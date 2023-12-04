<?php

namespace EmailNotificationBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class EmailNotificationBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/emailnotification/js/pimcore/startup.js'
        ];
    }
}
