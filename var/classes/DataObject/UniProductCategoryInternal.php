<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - name [input]
 * - ghpCode [input]
 * - categoryLevel [select]
 * - level [calculatedValue]
 * - pimInternalHierarchyCode [calculatedValue]
 * - levelSpecificData [objectbricks]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniProductCategoryInternal\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniProductCategoryInternal\Listing|\Pimcore\Model\DataObject\UniProductCategoryInternal|null getByName(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductCategoryInternal\Listing|\Pimcore\Model\DataObject\UniProductCategoryInternal|null getByGhpCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductCategoryInternal\Listing|\Pimcore\Model\DataObject\UniProductCategoryInternal|null getByCategoryLevel(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniProductCategoryInternal extends \App\Model\DataObject\AbstractUniProductCategoryInternal
{
public const FIELD_NAME = 'name';
public const FIELD_GHP_CODE = 'ghpCode';
public const FIELD_CATEGORY_LEVEL = 'categoryLevel';
public const FIELD_LEVEL = 'level';
public const FIELD_PIM_INTERNAL_HIERARCHY_CODE = 'pimInternalHierarchyCode';
public const FIELD_LEVEL_SPECIFIC_DATA = 'levelSpecificData';

protected $classId = "UNI_PR_CAT_INT";
protected $className = "UniProductCategoryInternal";
protected $name;
protected $ghpCode;
protected $categoryLevel;
protected $levelSpecificData;


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
* Get name - Name
* @return string|null
*/
public function getName(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("name");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->name;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set name - Name
* @param string|null $name
* @return $this
*/
public function setName(?string $name): static
{
	$this->markFieldDirty("name", true);

	$this->name = $name;

	return $this;
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
* Get categoryLevel - Category Level
* @return string|null
*/
public function getCategoryLevel(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("categoryLevel");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->categoryLevel;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set categoryLevel - Category Level
* @param string|null $categoryLevel
* @return $this
*/
public function setCategoryLevel(?string $categoryLevel): static
{
	$this->markFieldDirty("categoryLevel", true);

	$this->categoryLevel = $categoryLevel;

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
* @return \Pimcore\Model\DataObject\UniProductCategoryInternal\LevelSpecificData
*/
public function getLevelSpecificData(): ?\Pimcore\Model\DataObject\Objectbrick
{
	$data = $this->levelSpecificData;
	if (!$data) {
		if (\Pimcore\Tool::classExists("\\Pimcore\\Model\\DataObject\\UniProductCategoryInternal\\LevelSpecificData")) {
			$data = new \Pimcore\Model\DataObject\UniProductCategoryInternal\LevelSpecificData($this, "levelSpecificData");
			$this->levelSpecificData = $data;
		} else {
			return null;
		}
	}
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("levelSpecificData");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	return $data;
}

/**
* Set levelSpecificData - 
* @param \Pimcore\Model\DataObject\Objectbrick|null $levelSpecificData
* @return $this
*/
public function setLevelSpecificData(?\Pimcore\Model\DataObject\Objectbrick $levelSpecificData): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks $fd */
	$fd = $this->getClass()->getFieldDefinition("levelSpecificData");
	$this->levelSpecificData = $fd->preSetData($this, $levelSpecificData);
	return $this;
}

}

