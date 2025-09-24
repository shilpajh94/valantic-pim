<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - competitor [input]
 * - partNumber [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniPrCompetitorCrossReference\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniPrCompetitorCrossReference\Listing|\Pimcore\Model\DataObject\UniPrCompetitorCrossReference|null getByCompetitor(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniPrCompetitorCrossReference\Listing|\Pimcore\Model\DataObject\UniPrCompetitorCrossReference|null getByPartNumber(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniPrCompetitorCrossReference extends Concrete
{
public const FIELD_COMPETITOR = 'competitor';
public const FIELD_PART_NUMBER = 'partNumber';

protected $classId = "UNI_PR_ML_CCR";
protected $className = "UniPrCompetitorCrossReference";
protected $competitor;
protected $partNumber;


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
* Get competitor - Competitor
* @return string|null
*/
public function getCompetitor(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("competitor");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->competitor;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set competitor - Competitor
* @param string|null $competitor
* @return $this
*/
public function setCompetitor(?string $competitor): static
{
	$this->markFieldDirty("competitor", true);

	$this->competitor = $competitor;

	return $this;
}

/**
* Get partNumber - Part Number
* @return string|null
*/
public function getPartNumber(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("partNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->partNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set partNumber - Part Number
* @param string|null $partNumber
* @return $this
*/
public function setPartNumber(?string $partNumber): static
{
	$this->markFieldDirty("partNumber", true);

	$this->partNumber = $partNumber;

	return $this;
}

}

