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

use Pimcore\Model\Document;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Pimcore\Model\DataObject\ClassDefinition\Data;

class CSDocumentOptionProvider implements SelectOptionsProviderInterface
{
    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return array
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        // $optionsData = [];
        $this->optionProvider = \Pimcore::getKernel()->getContainer()->get('AppBundle\Services\OptionProviderCacheService');
        $optionsData = array();
        $className = 'DocumentType';
        $allAvailablelArrayCache = $this->optionProvider->getCachedKeyData($className);
        if($allAvailablelArrayCache && !empty($allAvailablelArrayCache))
        {
            $optionsData = $allAvailablelArrayCache;
            unset($allAvailablelArrayCache);
        }
        else
        {
            $documentTypeList = new Document\DocType\Listing();
            $docList = $documentTypeList->load();

            foreach($docList as $doc)
            {

                if($doc instanceof Document\DocType && $doc->getGroup() == 'Contitech CS' && $doc->getType() == 'printpage')
                {
                    $optionsData[] = array ('key' => $doc->getName(),'value' => $doc->getName());
                }
                if(!empty($optionsData))
                {
                    $this->optionProvider->setCachedOptionProviders($className);
                    $this->optionProvider->setAllOptionsInCacheForClass($className, $roptionsDataesult);
                }
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
