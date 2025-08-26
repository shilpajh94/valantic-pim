<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class BrandData extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrBr','UniPrBrandDss','UniPrBrandPts'];


protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBr|null $UniPrBr = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBr|null
*/
public function getUniPrBr(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrBr) &&
		$this->UniPrBr->getDoDelete()) {
			return null;
	}
	return $this->UniPrBr;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBr|null $UniPrBr
* @return $this
*/
public function setUniPrBr(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrBr $UniPrBr): static
{
	$this->UniPrBr = $UniPrBr;
	return $this;
}

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrandDss|null $UniPrBrandDss = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrandDss|null
*/
public function getUniPrBrandDss(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrBrandDss) &&
		$this->UniPrBrandDss->getDoDelete()) {
			return null;
	}
	return $this->UniPrBrandDss;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrandDss|null $UniPrBrandDss
* @return $this
*/
public function setUniPrBrandDss(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrandDss $UniPrBrandDss): static
{
	$this->UniPrBrandDss = $UniPrBrandDss;
	return $this;
}

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrandPts|null $UniPrBrandPts = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrandPts|null
*/
public function getUniPrBrandPts(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrBrandPts) &&
		$this->UniPrBrandPts->getDoDelete()) {
			return null;
	}
	return $this->UniPrBrandPts;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrandPts|null $UniPrBrandPts
* @return $this
*/
public function setUniPrBrandPts(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrandPts $UniPrBrandPts): static
{
	$this->UniPrBrandPts = $UniPrBrandPts;
	return $this;
}

}

