<?php

namespace Pimcore\Model\DataObject\UniProductCategoryInternal;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class LevelSpecificData extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrBrand','UniPrBrandDss','UniPrBrandPts','UniPrSkeleton','UniPrSkeletonDss','UniPrSkeletonPts'];


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

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeleton|null $UniPrSkeleton = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeleton|null
*/
public function getUniPrSkeleton(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrSkeleton) &&
		$this->UniPrSkeleton->getDoDelete()) {
			return null;
	}
	return $this->UniPrSkeleton;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeleton|null $UniPrSkeleton
* @return $this
*/
public function setUniPrSkeleton(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeleton $UniPrSkeleton): static
{
	$this->UniPrSkeleton = $UniPrSkeleton;
	return $this;
}

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeletonDss|null $UniPrSkeletonDss = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeletonDss|null
*/
public function getUniPrSkeletonDss(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrSkeletonDss) &&
		$this->UniPrSkeletonDss->getDoDelete()) {
			return null;
	}
	return $this->UniPrSkeletonDss;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeletonDss|null $UniPrSkeletonDss
* @return $this
*/
public function setUniPrSkeletonDss(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeletonDss $UniPrSkeletonDss): static
{
	$this->UniPrSkeletonDss = $UniPrSkeletonDss;
	return $this;
}

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeletonPts|null $UniPrSkeletonPts = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeletonPts|null
*/
public function getUniPrSkeletonPts(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrSkeletonPts) &&
		$this->UniPrSkeletonPts->getDoDelete()) {
			return null;
	}
	return $this->UniPrSkeletonPts;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeletonPts|null $UniPrSkeletonPts
* @return $this
*/
public function setUniPrSkeletonPts(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeletonPts $UniPrSkeletonPts): static
{
	$this->UniPrSkeletonPts = $UniPrSkeletonPts;
	return $this;
}

}

