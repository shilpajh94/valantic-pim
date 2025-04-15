<?php

namespace Pimcore\Model\DataObject\UniBaseProduct;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;

class TechnicalProductGroupSpecific extends \Pimcore\Model\DataObject\Objectbrick {

protected $brickGetters = ['UniPrPgsTechFhs'];


protected \Pimcore\Model\DataObject\Objectbrick\Data\UniPrPgsTechFhs|null $UniPrPgsTechFhs = null;

/**
* @return \Pimcore\Model\DataObject\Objectbrick\Data\UniPrPgsTechFhs|null
*/
public function getUniPrPgsTechFhs(bool $includeDeletedBricks = false)
{
	if(!$includeDeletedBricks &&
		isset($this->UniPrPgsTechFhs) &&
		$this->UniPrPgsTechFhs->getDoDelete()) {
			return null;
	}
	return $this->UniPrPgsTechFhs;
}

/**
* @param \Pimcore\Model\DataObject\Objectbrick\Data\UniPrPgsTechFhs|null $UniPrPgsTechFhs
* @return $this
*/
public function setUniPrPgsTechFhs(?\Pimcore\Model\DataObject\Objectbrick\Data\UniPrPgsTechFhs $UniPrPgsTechFhs): static
{
	$this->UniPrPgsTechFhs = $UniPrPgsTechFhs;
	return $this;
}

}

