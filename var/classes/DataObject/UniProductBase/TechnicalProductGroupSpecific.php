<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class TechnicalProductGroupSpecific extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrFgDss','UniPrFgFhs','UniPrFgPts'];


protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgDss|null $UniPrFgDss = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgDss|null
*/
public function getUniPrFgDss(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrFgDss) &&
		$this->UniPrFgDss->getDoDelete()) {
			return null;
	}
	return $this->UniPrFgDss;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgDss|null $UniPrFgDss
* @return $this
*/
public function setUniPrFgDss(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgDss $UniPrFgDss): static
{
	$this->UniPrFgDss = $UniPrFgDss;
	return $this;
}

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgFhs|null $UniPrFgFhs = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgFhs|null
*/
public function getUniPrFgFhs(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrFgFhs) &&
		$this->UniPrFgFhs->getDoDelete()) {
			return null;
	}
	return $this->UniPrFgFhs;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgFhs|null $UniPrFgFhs
* @return $this
*/
public function setUniPrFgFhs(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgFhs $UniPrFgFhs): static
{
	$this->UniPrFgFhs = $UniPrFgFhs;
	return $this;
}

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgPts|null $UniPrFgPts = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgPts|null
*/
public function getUniPrFgPts(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrFgPts) &&
		$this->UniPrFgPts->getDoDelete()) {
			return null;
	}
	return $this->UniPrFgPts;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgPts|null $UniPrFgPts
* @return $this
*/
public function setUniPrFgPts(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgPts $UniPrFgPts): static
{
	$this->UniPrFgPts = $UniPrFgPts;
	return $this;
}

}

