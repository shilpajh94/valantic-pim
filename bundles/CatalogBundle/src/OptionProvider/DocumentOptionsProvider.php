<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace CatalogBundle\OptionProvider;

use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class DocumentOptionsProvider implements SelectOptionsProviderInterface {

    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return array
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        $optionsData = [];
     
        $documentTypeList = new Document\DocType\Listing();
        $docList = $documentTypeList->load();

        foreach($docList as $doc)
        {

            if($doc instanceof Document\DocType && $doc->getType() == 'printpage')
            {
            $optionsData[] = array ('key' => $doc->getName(),'value' => $doc->getName());
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
