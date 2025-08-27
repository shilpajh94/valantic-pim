<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class BrandData extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrBr'];


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

}

