<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - ghpCode [input]
 * - hierarchyLevelDescription [input]
 * - hierarchyLevel [select]
 * - level [calculatedValue]
 * - pimInternalHierarchyCode [calculatedValue]
 * - assignedUser [user]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniProductCategoryInternal\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniProductCategoryInternal\Listing|\Pimcore\Model\DataObject\UniProductCategoryInternal|null getByGhpCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductCategoryInternal\Listing|\Pimcore\Model\DataObject\UniProductCategoryInternal|null getByHierarchyLevelDescription(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductCategoryInternal\Listing|\Pimcore\Model\DataObject\UniProductCategoryInternal|null getByHierarchyLevel(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductCategoryInternal\Listing|\Pimcore\Model\DataObject\UniProductCategoryInternal|null getByAssignedUser(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniProductCategoryInternal extends Concrete
{
public const FIELD_GHP_CODE = 'ghpCode';
public const FIELD_HIERARCHY_LEVEL_DESCRIPTION = 'hierarchyLevelDescription';
public const FIELD_HIERARCHY_LEVEL = 'hierarchyLevel';
public const FIELD_LEVEL = 'level';
public const FIELD_PIM_INTERNAL_HIERARCHY_CODE = 'pimInternalHierarchyCode';
public const FIELD_ASSIGNED_USER = 'assignedUser';

protected $classId = "UNI_PRCI";
protected $className = "UniProductCategoryInternal";
protected $ghpCode;
protected $hierarchyLevelDescription;
protected $hierarchyLevel;
protected $assignedUser;


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
* Get ghpCode - Product Hierarchy Code (GHP)
* @return string|null
*/
public function getGhpCode(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("ghpCode");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->ghpCode;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set ghpCode - Product Hierarchy Code (GHP)
* @param string|null $ghpCode
* @return $this
*/
public function setGhpCode(?string $ghpCode): static
{
	$this->markFieldDirty("ghpCode", true);

	$this->ghpCode = $ghpCode;

	return $this;
}

/**
* Get hierarchyLevelDescription - Hierarachy Level Description
* @return string|null
*/
public function getHierarchyLevelDescription(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("hierarchyLevelDescription");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->hierarchyLevelDescription;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set hierarchyLevelDescription - Hierarachy Level Description
* @param string|null $hierarchyLevelDescription
* @return $this
*/
public function setHierarchyLevelDescription(?string $hierarchyLevelDescription): static
{
	$this->markFieldDirty("hierarchyLevelDescription", true);

	$this->hierarchyLevelDescription = $hierarchyLevelDescription;

	return $this;
}

/**
* Get hierarchyLevel - Hierarchy Level
* @return string|null
*/
public function getHierarchyLevel(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("hierarchyLevel");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->hierarchyLevel;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set hierarchyLevel - Hierarchy Level
* @param string|null $hierarchyLevel
* @return $this
*/
public function setHierarchyLevel(?string $hierarchyLevel): static
{
	$this->markFieldDirty("hierarchyLevel", true);

	$this->hierarchyLevel = $hierarchyLevel;

	return $this;
}

/**
* Get level - Level
* @return mixed
*/
public function getLevel(): mixed
{
	$data = new \Pimcore\Model\DataObject\Data\CalculatedValue('level');
	$data->setContextualData("object", null, null, null);
	$object = $this;
	$data = \Pimcore\Model\DataObject\Service::getCalculatedFieldValue($object, $data);

	return $data;
}

/**
* Get pimInternalHierarchyCode - PIM Internal Hierarchy Code
* @return mixed
*/
public function getPimInternalHierarchyCode(): mixed
{
	$data = new \Pimcore\Model\DataObject\Data\CalculatedValue('pimInternalHierarchyCode');
	$data->setContextualData("object", null, null, null);
	$object = $this;
	$data = \Pimcore\Model\DataObject\Service::getCalculatedFieldValue($object, $data);

	return $data;
}

/**
* Get assignedUser - Assigned User
* @return string|null
*/
public function getAssignedUser(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("assignedUser");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->assignedUser;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set assignedUser - Assigned User
* @param string|null $assignedUser
* @return $this
*/
public function setAssignedUser(?string $assignedUser): static
{
	$this->markFieldDirty("assignedUser", true);

	$this->assignedUser = $assignedUser;

	return $this;
}

}

