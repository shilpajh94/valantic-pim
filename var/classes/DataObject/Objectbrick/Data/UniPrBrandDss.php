<?php

/**
 * Fields Summary:
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrBrandDss extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrBrand
{

protected string $type = "UniPrBrandDss";


/**
* UniPrBrandDss constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


}

