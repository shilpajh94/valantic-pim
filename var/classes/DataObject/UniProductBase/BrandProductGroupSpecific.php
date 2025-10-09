<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class BrandProductGroupSpecific extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrBrFhs','UniPrBrPts'];


protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrFhs|null $UniPrBrFhs = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrFhs|null
*/
public function getUniPrBrFhs(bool $includeDeletedBricks = false)
{
	if(!$this->UniPrBrFhs && \Pimcore\Model\DataObject::doGetInheritedValues($this->getObject())) { 
		try {
			$brickContainer = $this->getObject()->getValueFromParent("brandProductGroupSpecific");
			if(!empty($brickContainer)) {
				//check if parent object has brick, and if so, create an empty brick to enable inheritance
				$parentBrick = $this->getObject()->getValueFromParent("brandProductGroupSpecific")->getUniPrBrFhs($includeDeletedBricks);
				if (!empty($parentBrick)) {
					$brickType = "\\Pimcore\\Model\\DataObject\\Objectbrick\\Data\\" . ucfirst($parentBrick->getType());
					$brick = new $brickType($this->getObject());
					$brick->setFieldname("brandProductGroupSpecific");
					$this->setUniPrBrFhs($brick);
					return $brick;
				}
			}
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
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
	if(!$this->UniPrBrPts && \Pimcore\Model\DataObject::doGetInheritedValues($this->getObject())) { 
		try {
			$brickContainer = $this->getObject()->getValueFromParent("brandProductGroupSpecific");
			if(!empty($brickContainer)) {
				//check if parent object has brick, and if so, create an empty brick to enable inheritance
				$parentBrick = $this->getObject()->getValueFromParent("brandProductGroupSpecific")->getUniPrBrPts($includeDeletedBricks);
				if (!empty($parentBrick)) {
					$brickType = "\\Pimcore\\Model\\DataObject\\Objectbrick\\Data\\" . ucfirst($parentBrick->getType());
					$brick = new $brickType($this->getObject());
					$brick->setFieldname("brandProductGroupSpecific");
					$this->setUniPrBrPts($brick);
					return $brick;
				}
			}
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
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

}

