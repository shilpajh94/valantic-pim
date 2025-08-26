<?php

namespace Pimcore\Model\DataObject\UniProductCategoryInternal;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class LevelSpecificData extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrBr','UniPrBrandDss','UniPrBrandPts','UniPrBrFhs','UniPrSk','UniPrSkeletonDss','UniPrSkeletonPts','UniPrSkFhs'];


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

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrFhs|null $UniPrBrFhs = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrFhs|null
*/
public function getUniPrBrFhs(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrBrFhs) &&
		$this->UniPrBrFhs->getDoDelete()) {
			return null;
	}
	return $this->UniPrBrFhs;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrFhs|null $UniPrBrFhs
* @return $this
*/
public function setUniPrBrFhs(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrFhs $UniPrBrFhs): static
{
	$this->UniPrBrFhs = $UniPrBrFhs;
	return $this;
}

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSk|null $UniPrSk = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSk|null
*/
public function getUniPrSk(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrSk) &&
		$this->UniPrSk->getDoDelete()) {
			return null;
	}
	return $this->UniPrSk;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSk|null $UniPrSk
* @return $this
*/
public function setUniPrSk(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrSk $UniPrSk): static
{
	$this->UniPrSk = $UniPrSk;
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

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkFhs|null $UniPrSkFhs = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkFhs|null
*/
public function getUniPrSkFhs(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrSkFhs) &&
		$this->UniPrSkFhs->getDoDelete()) {
			return null;
	}
	return $this->UniPrSkFhs;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkFhs|null $UniPrSkFhs
* @return $this
*/
public function setUniPrSkFhs(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkFhs $UniPrSkFhs): static
{
	$this->UniPrSkFhs = $UniPrSkFhs;
	return $this;
}

}

