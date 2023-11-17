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

namespace AppBundle\OptionProvider;

use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Pimcore\Model\DataObject;

class ObjectBricks implements SelectOptionsProviderInterface
{

    /**
     * @var SalesOrg
     */
    private $salesOrg;

    /**
     * Initialize status
     *
     * @param Locale $localeService
     */
    public function __construct()
    {
        //$this->salesOrg = $salesOrg;
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
        $list = new DataObject\Objectbrick\Definition\Listing();
        $list = $list->load();
//
        $array = [];
        foreach ($list as $object) {
            if (!empty($object->getGroup()) && !in_array($object->getGroup(), $array)) {
                $result[] = array('key' => $object->getGroup(), 'value' => $object->getGroup());
                $array[] = $object->getGroup();
            }
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
        return true; //return $fieldDefinition->getDefaultValue();
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
