<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- name [input]
 * - level [calculatedValue]
 * - productInclude [fieldcollections]
 * - productFilters [fieldcollections]
 * - productExcludes [fieldcollections]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniProductCategoryExternal\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniProductCategoryExternal\Listing|\Pimcore\Model\DataObject\UniProductCategoryExternal|null getByLocalizedfields(string $field, mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductCategoryExternal\Listing|\Pimcore\Model\DataObject\UniProductCategoryExternal|null getByName(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniProductCategoryExternal extends Concrete
{
public const FIELD_NAME = 'name';
public const FIELD_LEVEL = 'level';
public const FIELD_PRODUCT_INCLUDE = 'productInclude';
public const FIELD_PRODUCT_FILTERS = 'productFilters';
public const FIELD_PRODUCT_EXCLUDES = 'productExcludes';

protected $classId = "UNI_PRCE";
protected $className = "UniProductCategoryExternal";
protected $localizedfields;
protected $productInclude;
protected $productFilters;
protected $productExcludes;


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
* Get localizedfields - 
* @return \Pimcore\Model\DataObject\Localizedfield|null
*/
public function getLocalizedfields(): ?\Pimcore\Model\DataObject\Localizedfield
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("localizedfields");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("localizedfields")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get name - Name
* @return string|null
*/
public function getName(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("name", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("name");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set localizedfields - 
* @param \Pimcore\Model\DataObject\Localizedfield|null $localizedfields
* @return $this
*/
public function setLocalizedfields(?\Pimcore\Model\DataObject\Localizedfield $localizedfields): static
{
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getLocalizedfields();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$this->markFieldDirty("localizedfields", true);
	$this->markFieldDirty("localizedfields", true);

	$this->localizedfields = $localizedfields;

	return $this;
}

/**
* Set name - Name
* @param string|null $name
* @return $this
*/
public function setName (?string $name, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("name", $name, $language, !$isEqual);

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
* @return \Pimcore\Model\DataObject\Fieldcollection|null
*/
public function getProductInclude(): ?\Pimcore\Model\DataObject\Fieldcollection
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productInclude");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("productInclude")->preGetData($this);
	return $data;
}

/**
* Set productInclude - Include Products
* @param \Pimcore\Model\DataObject\Fieldcollection|null $productInclude
* @return $this
*/
public function setProductInclude(?\Pimcore\Model\DataObject\Fieldcollection $productInclude): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections $fd */
	$fd = $this->getClass()->getFieldDefinition("productInclude");
	$this->productInclude = $fd->preSetData($this, $productInclude);
	return $this;
}

/**
* @return \Pimcore\Model\DataObject\Fieldcollection|null
*/
public function getProductFilters(): ?\Pimcore\Model\DataObject\Fieldcollection
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productFilters");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("productFilters")->preGetData($this);
	return $data;
}

/**
* Set productFilters - Product Filters
* @param \Pimcore\Model\DataObject\Fieldcollection|null $productFilters
* @return $this
*/
public function setProductFilters(?\Pimcore\Model\DataObject\Fieldcollection $productFilters): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections $fd */
	$fd = $this->getClass()->getFieldDefinition("productFilters");
	$this->productFilters = $fd->preSetData($this, $productFilters);
	return $this;
}

/**
* @return \Pimcore\Model\DataObject\Fieldcollection|null
*/
public function getProductExcludes(): ?\Pimcore\Model\DataObject\Fieldcollection
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productExcludes");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("productExcludes")->preGetData($this);
	return $data;
}

/**
* Set productExcludes - Product Excludes
* @param \Pimcore\Model\DataObject\Fieldcollection|null $productExcludes
* @return $this
*/
public function setProductExcludes(?\Pimcore\Model\DataObject\Fieldcollection $productExcludes): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections $fd */
	$fd = $this->getClass()->getFieldDefinition("productExcludes");
	$this->productExcludes = $fd->preSetData($this, $productExcludes);
	return $this;
}

}

