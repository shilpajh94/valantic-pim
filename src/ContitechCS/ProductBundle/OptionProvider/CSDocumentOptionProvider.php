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

namespace ContitechCS\ProductBundle\OptionProvider;

use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class CSDocumentOptionProvider implements SelectOptionsProviderInterface
{

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return array
     */
    public function getOptions($context, $fieldDefinition) {
        $optionsData = [];
             
        $documentTypeList = new Document\DocType\Listing(); 
        $docList = $documentTypeList->load();
       
        foreach($docList as $doc)
        {
           
            if($doc instanceof Document\DocType && $doc->getGroup() == 'Contitech CS' && $doc->getType() == 'printpage')
            {
            $optionsData[] = array ('key' => $doc->getName(),'value' => $doc->getName());
            }
        }

        return $optionsData;
    }

    /**
     * Returns the value which is defined in the 'Default value' field  
     * @param $context array
     * @param $fieldDefinition Data
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition) {
        return true;
    }

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition) {
        return true;
    }

}
