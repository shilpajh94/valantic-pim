<?php

namespace Pimcore\Model\DataObject\UniBaseProduct;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class BrandData extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniProductCategoryInternalBrandData'];


protected \Pimcore\Model\DataObject\Objectbrick\Data\UniProductCategoryInternalBrandData|null $UniProductCategoryInternalBrandData = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniProductCategoryInternalBrandData|null
*/
public function getUniProductCategoryInternalBrandData(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniProductCategoryInternalBrandData) &&
		$this->UniProductCategoryInternalBrandData->getDoDelete()) {
			return null;
	}
	return $this->UniProductCategoryInternalBrandData;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniProductCategoryInternalBrandData|null $UniProductCategoryInternalBrandData
* @return $this
*/
public function setUniProductCategoryInternalBrandData(?\Pimcore\Model\DataObject\Objectbrick\Data\UniProductCategoryInternalBrandData $UniProductCategoryInternalBrandData): static
{
	$this->UniProductCategoryInternalBrandData = $UniProductCategoryInternalBrandData;
	return $this;
}

}

