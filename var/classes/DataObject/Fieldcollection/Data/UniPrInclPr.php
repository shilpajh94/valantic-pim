<?php

/**
 * Fields Summary:
 * - Products [manyToManyObjectRelation]
 */

namespace Pimcore\Model\DataObject\Fieldcollection\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

class UniPrInclPr extends DataObject\Fieldcollection\Data\AbstractData
{
public const FIELD_PRODUCTS = 'Products';

protected string $type = "UniPrInclPr";
protected $Products;


/**
* Get Products - Products
* @return \Pimcore\Model\DataObject\UniProductBase[]
*/
public function getProducts(): array
{
	$container = $this;
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("Products");
	$data = $fd->preGetData($container);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Products - Products
* @param \Pimcore\Model\DataObject\UniProductBase[] $Products
* @return $this
*/
public function setProducts(?array $Products): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("Products");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getProducts();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $Products);
	if (!$isEqual) {
		$this->markFieldDirty("Products", true);
	}
	$this->Products = $fd->preSetData($this, $Products);
	return $this;
}

}

