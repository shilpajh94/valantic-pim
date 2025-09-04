<?php

namespace Pimcore\Model\DataObject\UniProductCategoryInternal;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class LevelSpecificData extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrBr','UniPrBrFhs','UniPrBrPts','UniPrSk','UniPrSkFhs','UniPrSkPts'];


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

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrPts|null $UniPrBrPts = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrPts|null
*/
public function getUniPrBrPts(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrBrPts) &&
		$this->UniPrBrPts->getDoDelete()) {
			return null;
	}
	return $this->UniPrBrPts;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrPts|null $UniPrBrPts
* @return $this
*/
public function setUniPrBrPts(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrPts $UniPrBrPts): static
{
	$this->UniPrBrPts = $UniPrBrPts;
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

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkPts|null $UniPrSkPts = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkPts|null
*/
public function getUniPrSkPts(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrSkPts) &&
		$this->UniPrSkPts->getDoDelete()) {
			return null;
	}
	return $this->UniPrSkPts;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkPts|null $UniPrSkPts
* @return $this
*/
public function setUniPrSkPts(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkPts $UniPrSkPts): static
{
	$this->UniPrSkPts = $UniPrSkPts;
	return $this;
}

}

