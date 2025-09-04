<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class SkeletonData extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrSkeleton','UniPrSkeletonDss','UniPrSkeletonPts'];


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

