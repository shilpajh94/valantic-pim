<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class TechnicalProductGroupSpecific extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrFgFhs','UniPrGsTechDss','UniPrGsTechPts'];

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

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrGsTechDss|null $UniPrGsTechDss = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrGsTechDss|null
*/
public function getUniPrGsTechDss(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrGsTechDss) &&
		$this->UniPrGsTechDss->getDoDelete()) {
			return null;
	}
	return $this->UniPrGsTechDss;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrGsTechDss|null $UniPrGsTechDss
* @return $this
*/
public function setUniPrGsTechDss(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrGsTechDss $UniPrGsTechDss): static
{
	$this->UniPrGsTechDss = $UniPrGsTechDss;
	return $this;
}

protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrGsTechPts|null $UniPrGsTechPts = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrGsTechPts|null
*/
public function getUniPrGsTechPts(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrGsTechPts) &&
		$this->UniPrGsTechPts->getDoDelete()) {
			return null;
	}
	return $this->UniPrGsTechPts;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrGsTechPts|null $UniPrGsTechPts
* @return $this
*/
public function setUniPrGsTechPts(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrGsTechPts $UniPrGsTechPts): static
{
	$this->UniPrGsTechPts = $UniPrGsTechPts;
	return $this;
}

}

