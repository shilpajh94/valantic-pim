<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class TechnicalProductGroupSpecific extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrGsTechDss','UniPrGsTechPts'];


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

