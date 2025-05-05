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

namespace ImportBundle\OptionProvider;

use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class TubeMaterialOptionsProvider implements SelectOptionsProviderInterface
{
    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return array
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        $optionsData = [];

        $catalog_type = 'INH-HYD-HOSE~tubeMaterial';

        $entries = new DataObject\MultiselectMaster\Listing();

        $entries->setCondition("masterType = ?", "{$catalog_type}");

        $entries->load();

        foreach ($entries as $listItem) {
            if ($listItem instanceof DataObject\MultiselectMaster) {
                $optionsData[] = array('key' => $listItem->getName(), 'value' => $listItem->getID());
            }
        }

        return $optionsData;
    }

    /**
     * Returns the value which is defined in the 'Default value' field
     * @param array $context
     * @param Data $fieldDefinition
     * @return mixed
     */
    public function getDefaultValue(array $context, Data $fieldDefinition): ?string
    {
        return false;
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
