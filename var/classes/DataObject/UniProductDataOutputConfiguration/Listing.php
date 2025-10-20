<?php

namespace Pimcore\Model\DataObject\UniProductDataOutputConfiguration;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniProductDataOutputConfiguration|false current()
 * @method DataObject\UniProductDataOutputConfiguration[] load()
 * @method DataObject\UniProductDataOutputConfiguration[] getData()
 * @method DataObject\UniProductDataOutputConfiguration[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrOutConfig";
protected $className = "UniProductDataOutputConfiguration";


/**
* Filter by exportType (Export Type)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByExportType ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("exportType")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by outputFormat (Output Format)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByOutputFormat ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("outputFormat")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by frequency (Frequency)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByFrequency ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("frequency")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by weekday (Weekday)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByWeekday ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("weekday")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by dayOfMonth (Day of Month)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByDayOfMonth ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("dayOfMonth")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by timeOfDay (Time Of Day)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByTimeOfDay ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("timeOfDay")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by exportDirectory (Scheduled Export Directory)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByExportDirectory ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("exportDirectory")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by lastRun (Last Run)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByLastRun ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("lastRun")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by exportObjects (Finished Goods / Internal Categories)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByExportObjects ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("exportObjects")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by dataFields (Data Fields for Base product and internal Categories)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByDataFields ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("dataFields")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productGroupSpecificDatafields (Product Group Specific Datafields)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductGroupSpecificDatafields ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productGroupSpecificDatafields")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by columnNameType (Column Name Type)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByColumnNameType ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("columnNameType")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by languages (Languages)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByLanguages ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("languages")->addListingFilter($this, $data, $operator);
	return $this;
}



}
