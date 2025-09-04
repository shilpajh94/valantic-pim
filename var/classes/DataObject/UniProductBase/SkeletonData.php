<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class SkeletonData extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrSk','UniPrSkFhs','UniPrSkPts'];


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

