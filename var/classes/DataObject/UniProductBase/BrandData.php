<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class BrandData extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrBrand','UniPrBrandDss','UniPrBrandPts'];


protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrand|null $UniPrBrand = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrand|null
*/
public function getUniPrBrand(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrBrand) &&
		$this->UniPrBrand->getDoDelete()) {
			return null;
	}
	return $this->UniPrBrand;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrand|null $UniPrBrand
* @return $this
*/
public function setUniPrBrand(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrand $UniPrBrand): static
{
	$this->UniPrBrand = $UniPrBrand;
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

