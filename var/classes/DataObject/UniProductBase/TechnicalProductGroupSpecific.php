<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class TechnicalProductGroupSpecific extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrFgDss','UniPrFgFhs','UniPrGsTechPts'];


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

