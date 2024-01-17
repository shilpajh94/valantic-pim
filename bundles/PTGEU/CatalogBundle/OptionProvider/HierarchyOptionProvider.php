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

namespace PTGEU\CatalogBundle\OptionProvider;

use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Pimcore\Model\DataObject;

class HierarchyOptionProvider implements SelectOptionsProviderInterface
{

    /**
     * Initialize status
     *
     * @param Locale $localeService
     */
    public function __construct()
    {
        
    }

    /**
     * To get the system languages (Localization & Internationalization)
     *
     * @param array $context
     * @param Data $fieldDefinition
     * @return array
     */
    public function getOptions($context, $fieldDefinition): ?array
    {
        $categoryList = new DataObject\PTGEUProductHierarchy\Listing();
        $categoryList->setCondition("Level = ?", ["5"]);
        $categoryList->setOrderKey('description');
        $categoryList->setOrder("ASC");
        $categoryList = $categoryList->load();

        $result = [];
        foreach ($categoryList as $cat) {
            $result[] = array(
                'key' => $cat->getDescription('en') . '-' . $cat->getFullcode(),
                'value' => $cat->getId());
        }
        return $result;
    }

    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition)
    {
        return true;
    }
    
    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition)
    {
        return true;
    }

}
