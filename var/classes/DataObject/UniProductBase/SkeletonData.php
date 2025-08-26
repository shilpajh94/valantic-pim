<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class SkeletonData extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrSk','UniPrSkeletonPts'];


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

