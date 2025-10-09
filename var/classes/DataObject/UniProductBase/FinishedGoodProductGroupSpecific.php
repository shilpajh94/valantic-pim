<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class FinishedGoodProductGroupSpecific extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrFgDss','UniPrFgFhs','UniPrFgPts'];


protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgDss|null $UniPrFgDss = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgDss|null
*/
public function getUniPrFgDss(bool $includeDeletedBricks = false)
{
	if(!$this->UniPrFgDss && \Pimcore\Model\DataObject::doGetInheritedValues($this->getObject())) { 
		try {
			$brickContainer = $this->getObject()->getValueFromParent("finishedGoodProductGroupSpecific");
			if(!empty($brickContainer)) {
				//check if parent object has brick, and if so, create an empty brick to enable inheritance
				$parentBrick = $this->getObject()->getValueFromParent("finishedGoodProductGroupSpecific")->getUniPrFgDss($includeDeletedBricks);
				if (!empty($parentBrick)) {
					$brickType = "\\Pimcore\\Model\\DataObject\\Objectbrick\\Data\\" . ucfirst($parentBrick->getType());
					$brick = new $brickType($this->getObject());
					$brick->setFieldname("finishedGoodProductGroupSpecific");
					$this->setUniPrFgDss($brick);
					return $brick;
				}
			}
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
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
	if(!$this->UniPrFgFhs && \Pimcore\Model\DataObject::doGetInheritedValues($this->getObject())) { 
		try {
			$brickContainer = $this->getObject()->getValueFromParent("finishedGoodProductGroupSpecific");
			if(!empty($brickContainer)) {
				//check if parent object has brick, and if so, create an empty brick to enable inheritance
				$parentBrick = $this->getObject()->getValueFromParent("finishedGoodProductGroupSpecific")->getUniPrFgFhs($includeDeletedBricks);
				if (!empty($parentBrick)) {
					$brickType = "\\Pimcore\\Model\\DataObject\\Objectbrick\\Data\\" . ucfirst($parentBrick->getType());
					$brick = new $brickType($this->getObject());
					$brick->setFieldname("finishedGoodProductGroupSpecific");
					$this->setUniPrFgFhs($brick);
					return $brick;
				}
			}
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
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
	if(!$this->UniPrFgPts && \Pimcore\Model\DataObject::doGetInheritedValues($this->getObject())) { 
		try {
			$brickContainer = $this->getObject()->getValueFromParent("finishedGoodProductGroupSpecific");
			if(!empty($brickContainer)) {
				//check if parent object has brick, and if so, create an empty brick to enable inheritance
				$parentBrick = $this->getObject()->getValueFromParent("finishedGoodProductGroupSpecific")->getUniPrFgPts($includeDeletedBricks);
				if (!empty($parentBrick)) {
					$brickType = "\\Pimcore\\Model\\DataObject\\Objectbrick\\Data\\" . ucfirst($parentBrick->getType());
					$brick = new $brickType($this->getObject());
					$brick->setFieldname("finishedGoodProductGroupSpecific");
					$this->setUniPrFgPts($brick);
					return $brick;
				}
			}
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
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

