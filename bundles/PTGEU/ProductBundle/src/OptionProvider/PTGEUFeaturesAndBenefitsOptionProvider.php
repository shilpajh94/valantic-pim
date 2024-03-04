<?php

/**
 * Pimcore global services
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright Copyright (c) Pimcore global services
 * @license Pimcore global services GPLv3 and PEL
 */

namespace PTGEU\ProductBundle\OptionProvider;

use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\Data;

class PTGEUFeaturesAndBenefitsOptionProvider  implements SelectOptionsProviderInterface
{
    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return array
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        // $result = [];
        $this->optionProvider = \Pimcore::getKernel()->getContainer()->get('AppBundle\Services\OptionProviderCacheService');
        $result = array();
        $className = 'PTGEUFeaturesAndBenefits';
        $allAvailablelArrayCache = $this->optionProvider->getCachedKeyData($className);
        if($allAvailablelArrayCache && !empty($allAvailablelArrayCache))
        {
            $result = $allAvailablelArrayCache;
            unset($allAvailablelArrayCache);
        }
        else
        {
            $featuresAndBenefitsPTGEU = new DataObject\PTGEUFeaturesAndBenefits\Listing();
            $featuresAndBenefitsPTGEU->setCondition("path = ?", "/Contitech_PTGEU/Master List/Features and Benefits/" );
            $featuresAndBenefitsPTGEU = $featuresAndBenefitsPTGEU->load();
            foreach ($featuresAndBenefitsPTGEU as $featuresAndBenefits) {
                $result[] = array('key' => $featuresAndBenefits->getFeaturesAndBenefits(),
                    'value' => $featuresAndBenefits->getId());
                if(!empty($result))
                {
                    $this->optionProvider->setCachedOptionProviders($className);
                    $this->optionProvider->setAllOptionsInCacheForClass($className, $result);
                }
            }
        }
        return $result;
    }

    /**
     * Returns the value which is defined in the 'Default value' field
     * @param array $context
     * @param Data $fieldDefinition
     * @return mixed
     */
    public function getDefaultValue(array $context, Data $fieldDefinition): ?string
    {
        return true;
    }

    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return bool
     */
    public function hasStaticOptions(array $context, Data $fieldDefinition): bool
    {
        return true;
    }
}
