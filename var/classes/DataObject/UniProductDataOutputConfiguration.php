<?php

/**
 * Inheritance: no
 * Variants: no
 * Product Data Output Configuration
 *
 * Fields Summary:
 * - exportType [select]
 * - outputFormat [select]
 * - frequency [select]
 * - weekday [select]
 * - dayOfMonth [numeric]
 * - timeOfDay [time]
 * - exportDirectory [manyToOneRelation]
 * - lastRun [datetime]
 * - finishedGoods [manyToManyObjectRelation]
 * - dataFields [multiselect]
 * - productGroupSpecificDatafields [multiselect]
 * - columnNameType [select]
 * - languages [languagemultiselect]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByExportType(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByOutputFormat(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByFrequency(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByWeekday(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByDayOfMonth(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByTimeOfDay(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByExportDirectory(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByLastRun(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByFinishedGoods(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByDataFields(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByProductGroupSpecificDatafields(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByColumnNameType(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductDataOutputConfiguration\Listing|\Pimcore\Model\DataObject\UniProductDataOutputConfiguration|null getByLanguages(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniProductDataOutputConfiguration extends Concrete
{
public const FIELD_EXPORT_TYPE = 'exportType';
public const FIELD_OUTPUT_FORMAT = 'outputFormat';
public const FIELD_FREQUENCY = 'frequency';
public const FIELD_WEEKDAY = 'weekday';
public const FIELD_DAY_OF_MONTH = 'dayOfMonth';
public const FIELD_TIME_OF_DAY = 'timeOfDay';
public const FIELD_EXPORT_DIRECTORY = 'exportDirectory';
public const FIELD_LAST_RUN = 'lastRun';
public const FIELD_FINISHED_GOODS = 'finishedGoods';
public const FIELD_DATA_FIELDS = 'dataFields';
public const FIELD_PRODUCT_GROUP_SPECIFIC_DATAFIELDS = 'productGroupSpecificDatafields';
public const FIELD_COLUMN_NAME_TYPE = 'columnNameType';
public const FIELD_LANGUAGES = 'languages';

protected $classId = "UniPrOutConfig";
protected $className = "UniProductDataOutputConfiguration";
protected $exportType;
protected $outputFormat;
protected $frequency;
protected $weekday;
protected $dayOfMonth;
protected $timeOfDay;
protected $exportDirectory;
protected $lastRun;
protected $finishedGoods;
protected $dataFields;
protected $productGroupSpecificDatafields;
protected $columnNameType;
protected $languages;


/**
* @param array $values
* @return static
*/
public static function create(array $values = []): static
{
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get exportType - Export Type
* @return string|null
*/
public function getExportType(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("exportType");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->exportType;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set exportType - Export Type
* @param string|null $exportType
* @return $this
*/
public function setExportType(?string $exportType): static
{
	$this->markFieldDirty("exportType", true);

	$this->exportType = $exportType;

	return $this;
}

/**
* Get outputFormat - Output Format
* @return string|null
*/
public function getOutputFormat(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("outputFormat");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->outputFormat;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set outputFormat - Output Format
* @param string|null $outputFormat
* @return $this
*/
public function setOutputFormat(?string $outputFormat): static
{
	$this->markFieldDirty("outputFormat", true);

	$this->outputFormat = $outputFormat;

	return $this;
}

/**
* Get frequency - Frequency
* @return string|null
*/
public function getFrequency(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("frequency");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->frequency;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set frequency - Frequency
* @param string|null $frequency
* @return $this
*/
public function setFrequency(?string $frequency): static
{
	$this->markFieldDirty("frequency", true);

	$this->frequency = $frequency;

	return $this;
}

/**
* Get weekday - Weekday
* @return string|null
*/
public function getWeekday(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("weekday");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->weekday;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set weekday - Weekday
* @param string|null $weekday
* @return $this
*/
public function setWeekday(?string $weekday): static
{
	$this->markFieldDirty("weekday", true);

	$this->weekday = $weekday;

	return $this;
}

/**
* Get dayOfMonth - Day of Month
* @return int|null
*/
public function getDayOfMonth(): ?int
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("dayOfMonth");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->dayOfMonth;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set dayOfMonth - Day of Month
* @param int|null $dayOfMonth
* @return $this
*/
public function setDayOfMonth(?int $dayOfMonth): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getClass()->getFieldDefinition("dayOfMonth");
	$this->dayOfMonth = $fd->preSetData($this, $dayOfMonth);
	return $this;
}

/**
* Get timeOfDay - Time Of Day
* @return string|null
*/
public function getTimeOfDay(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("timeOfDay");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->timeOfDay;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set timeOfDay - Time Of Day
* @param string|null $timeOfDay
* @return $this
*/
public function setTimeOfDay(?string $timeOfDay): static
{
	$this->markFieldDirty("timeOfDay", true);

	$this->timeOfDay = $timeOfDay;

	return $this;
}

/**
* Get exportDirectory - Scheduled Export Directory
* @return \Pimcore\Model\Asset\Folder|null
*/
public function getExportDirectory(): ?\Pimcore\Model\Element\AbstractElement
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("exportDirectory");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("exportDirectory")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set exportDirectory - Scheduled Export Directory
* @param \Pimcore\Model\Asset\Folder|null $exportDirectory
* @return $this
*/
public function setExportDirectory(?\Pimcore\Model\Element\AbstractElement $exportDirectory): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("exportDirectory");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getExportDirectory();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $exportDirectory);
	if (!$isEqual) {
		$this->markFieldDirty("exportDirectory", true);
	}
	$this->exportDirectory = $fd->preSetData($this, $exportDirectory);
	return $this;
}

/**
* Get lastRun - Last Run
* @return \Carbon\Carbon|null
*/
public function getLastRun(): ?\Carbon\Carbon
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("lastRun");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->lastRun;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set lastRun - Last Run
* @param \Carbon\Carbon|null $lastRun
* @return $this
*/
public function setLastRun(?\Carbon\Carbon $lastRun): static
{
	$this->markFieldDirty("lastRun", true);

	$this->lastRun = $lastRun;

	return $this;
}

/**
* Get finishedGoods - Finished Goods / Internal Categories
* @return \Pimcore\Model\DataObject\UniProductBase[]|\Pimcore\Model\DataObject\UniProductCategoryInternal[]
*/
public function getFinishedGoods(): array
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("finishedGoods");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("finishedGoods")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set finishedGoods - Finished Goods / Internal Categories
* @param \Pimcore\Model\DataObject\UniProductBase[]|\Pimcore\Model\DataObject\UniProductCategoryInternal[] $finishedGoods
* @return $this
*/
public function setFinishedGoods(?array $finishedGoods): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("finishedGoods");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getFinishedGoods();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $finishedGoods);
	if (!$isEqual) {
		$this->markFieldDirty("finishedGoods", true);
	}
	$this->finishedGoods = $fd->preSetData($this, $finishedGoods);
	return $this;
}

/**
* Get dataFields - Data Fields for Base product and internal Categories
* @return string[]|null
*/
public function getDataFields(): ?array
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("dataFields");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->dataFields;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set dataFields - Data Fields for Base product and internal Categories
* @param string[]|null $dataFields
* @return $this
*/
public function setDataFields(?array $dataFields): static
{
	$this->markFieldDirty("dataFields", true);

	$this->dataFields = $dataFields;

	return $this;
}

/**
* Get productGroupSpecificDatafields - Product Group Specific Datafields
* @return string[]|null
*/
public function getProductGroupSpecificDatafields(): ?array
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productGroupSpecificDatafields");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->productGroupSpecificDatafields;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set productGroupSpecificDatafields - Product Group Specific Datafields
* @param string[]|null $productGroupSpecificDatafields
* @return $this
*/
public function setProductGroupSpecificDatafields(?array $productGroupSpecificDatafields): static
{
	$this->markFieldDirty("productGroupSpecificDatafields", true);

	$this->productGroupSpecificDatafields = $productGroupSpecificDatafields;

	return $this;
}

/**
* Get columnNameType - Column Name Type
* @return string|null
*/
public function getColumnNameType(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("columnNameType");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->columnNameType;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set columnNameType - Column Name Type
* @param string|null $columnNameType
* @return $this
*/
public function setColumnNameType(?string $columnNameType): static
{
	$this->markFieldDirty("columnNameType", true);

	$this->columnNameType = $columnNameType;

	return $this;
}

/**
* Get languages - Languages
* @return string[]|null
*/
public function getLanguages(): ?array
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("languages");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->languages;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set languages - Languages
* @param string[]|null $languages
* @return $this
*/
public function setLanguages(?array $languages): static
{
	$this->markFieldDirty("languages", true);

	$this->languages = $languages;

	return $this;
}

}

