<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace App;

use Pimcore\Bundle\AdminBundle\PimcoreAdminBundle;
use Pimcore\HttpKernel\BundleCollection\BundleCollection;
use Pimcore\Kernel as PimcoreKernel;
use App\Services\SecretManager;

class Kernel extends PimcoreKernel
{
    /**
     * Adds bundles to register to the bundle collection. The collection is able
     * to handle priorities and environment specific bundles.
     *
     * @param BundleCollection $collection
     */
    public function registerBundlesToCollection(BundleCollection $collection): void
    {
        $collection->addBundle(new PimcoreAdminBundle(), 60);

        if (class_exists('\\AppBundle\\AppBundle')) {
            $collection->addBundle(new \AppBundle\AppBundle);
        }

        if (class_exists('\Pimcore\Bundle\LegacyBundle\PimcoreLegacyBundle')) {
            $collection->addBundle(new \Pimcore\Bundle\LegacyBundle\PimcoreLegacyBundle);
        }
        if(file_exists($this->getProjectDir().'/.env')){
            $dotenv = new \Symfony\Component\Dotenv\Dotenv();
            $dotenv->load(dirname(__DIR__) . "/.env");
        }

        $secretManager = new SecretManager();
        $secretManager->retrieveSecret();

    }
}