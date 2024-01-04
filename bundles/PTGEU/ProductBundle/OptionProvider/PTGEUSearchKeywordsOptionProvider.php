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

class PTGEUSearchKeywordsOptionProvider  implements SelectOptionsProviderInterface
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
    public function getOptions($context, $fieldDefinition)
    {
        $result = [];
        $searchKeywordsPTGEU = new DataObject\PTGEUSearchKeywords\Listing();
        $searchKeywordsPTGEU->setCondition("o_path = ?", "/Contitech_PTGEU/Master List/Search Keywords/" );
        $searchKeywordsPTGEU = $searchKeywordsPTGEU->load();

        foreach ($searchKeywordsPTGEU as $searchKeywords) {
            $result[] = array('key' => $searchKeywords->getSearchKeywords(), 'value' => $searchKeywords->getId());
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
