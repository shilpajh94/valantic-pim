<?php

/**
 * Fields Summary:
 * - internalCategory [manyToOneRelation]
 */

namespace Pimcore\Model\DataObject\Fieldcollection\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

class UniPrInclCat extends DataObject\Fieldcollection\Data\AbstractData
{
public const FIELD_INTERNAL_CATEGORY = 'internalCategory';

protected string $type = "UniPrInclCat";
protected $internalCategory;


/**
* Get internalCategory - Internal Category
* @return \Pimcore\Model\DataObject\UniProductCategoryInternal|null
*/
public function getInternalCategory(): ?\Pimcore\Model\Element\AbstractElement
{
	$container = $this;
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("internalCategory");
	$data = $fd->preGetData($container);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set internalCategory - Internal Category
* @param \Pimcore\Model\DataObject\UniProductCategoryInternal|null $internalCategory
* @return $this
*/
public function setInternalCategory(?\Pimcore\Model\Element\AbstractElement $internalCategory): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("internalCategory");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getInternalCategory();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $internalCategory);
	if (!$isEqual) {
		$this->markFieldDirty("internalCategory", true);
	}
	$this->internalCategory = $fd->preSetData($this, $internalCategory);
	return $this;
}

}

