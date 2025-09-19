<?php

declare(strict_types=1);

namespace App\Service;

use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class UniProductVersionService
{
    public const UNI_BASE_PATH = '/Unified PIM/Product Management/';
    public const APPROVED_PRODUCTS_FOLDER_NAME = 'Approved Products';

    /**
     * Check if an object is a shadow copy (version copy).
     */
    public function isShadowCopy(UniProductBase $object): bool
    {
        return str_contains($object->getFullPath(), self::UNI_BASE_PATH . self::APPROVED_PRODUCTS_FOLDER_NAME);
    }

    /**
     * Create or update version copy for a product.
     */
    public function createOrUpdateVersionCopy(UniProductBase $product): void
    {
        $existingCopy = $this->getVersionCopyForProduct($product);

        if ($existingCopy instanceof UniProductBase) {
            $this->updateVersionCopy($product, $existingCopy);
        } else {
            $this->createVersionCopy($product);
        }
    }

    /**
     * Create a new version copy.
     */
    public function createVersionCopy(UniProductBase $product): void
    {
        $hierarchy = $this->extractCategoryHierarchy($product);
        // $basePath = $hierarchy[0]->getPath();
        $versionBasePath = self::UNI_BASE_PATH . self::APPROVED_PRODUCTS_FOLDER_NAME;
        $originalKey = $product->getKey();
        $targetFolder = $this->createClonedCategoryStructure($hierarchy, $versionBasePath, self::UNI_BASE_PATH);
        $existingCopyPath = $targetFolder->getFullPath() . '/' . $originalKey;
        $existingCopy = \Pimcore\Model\DataObject::getByPath($existingCopyPath);

        if ($existingCopy instanceof \Pimcore\Model\DataObject) {
            $existingCopy->delete();
        }
        // Clone the product
        $cloned = clone $product;
        $cloned->setId(null);
        $cloned->setKey($originalKey);
        $cloned->setParentId($targetFolder->getId());
        $cloned->setProperty('is_version_copy', 'boolean', true);
        $cloned->setProperty('original_product_id', 'text', (string) $product->getId());
        $cloned->setProperty('version_created_at', 'date', \Carbon\Carbon::now());
        $cloned->setProperty('version_reason', 'text', 'approved_snapshot');
        $categoryIds = $hierarchy !== [] ? array_map(fn($cat): ?int => $cat->getId(), $hierarchy) : [];
        $cloned->setProperty('original_category_ids', 'text', json_encode($categoryIds));
        $cloned->save(['validate' => false]);
    }

    /**
     * Update existing version copy with current product data.
     */
    public function updateVersionCopy(UniProductBase $product, UniProductBase $existingCopy): void
    {
        $hierarchy = $this->extractCategoryHierarchy($product);
        // $basePath = $hierarchy[0]->getPath();
        $versionBasePath = self::UNI_BASE_PATH . self::APPROVED_PRODUCTS_FOLDER_NAME;
        $currentCategoryIds = $hierarchy !== [] ? array_map(fn($cat): ?int => $cat->getId(), $hierarchy) : [];
        $originalCategoryIds = $existingCopy->getProperty('original_category_ids');
        $originalCategoryIds = $originalCategoryIds ? json_decode($originalCategoryIds, true) : [];
        $hasCategoryChanged = json_encode($originalCategoryIds) !== json_encode($currentCategoryIds);

        if ($hasCategoryChanged) {
            $newTargetFolder = $this->createClonedCategoryStructure($hierarchy, $versionBasePath, self::UNI_BASE_PATH);
            $existingCopy->setParentId($newTargetFolder->getId());
            $existingCopy->setProperty('original_category_ids', 'text', json_encode($currentCategoryIds));
        } else {
            $clonedHierarchy = $this->extractCategoryHierarchy($existingCopy);

            if (count($clonedHierarchy) === count($hierarchy)) {
                foreach ($hierarchy as $index => $originalCat) {
                    $clonedCat = $clonedHierarchy[$index];

                    if ($this->hasAnyChanges($originalCat, $clonedCat)) {
                        $this->copyObjectData($originalCat, $clonedCat);
                    }
                }
            }
        }
        $this->copyObjectData($product, $existingCopy);
        $existingCopy->setProperty('version_updated_at', 'date', \Carbon\Carbon::now());
        $existingCopy->setProperty('version_reason', 'text', 'approved_snapshot_updated');
        $existingCopy->save(['validate' => false]);
    }

    public function valuesAreEqual(mixed $oldValue, mixed $newValue): bool
    {
        if ($oldValue === null && $newValue === null) {
            return true;
        }

        if ($oldValue === null || $newValue === null) {
            return false;
        }

        if ($oldValue instanceof \DateTime && $newValue instanceof \DateTime) {
            return $oldValue->getTimestamp() === $newValue->getTimestamp();
        }

        if (is_object($oldValue) || is_array($oldValue)) {
            return serialize($oldValue) === serialize($newValue);
        }

        return (string) $oldValue === (string) $newValue;
    }

    /**
     * @return array<UniProductCategoryInternal>
     */
    public function extractCategoryHierarchy(UniProductBase $object): array
    {
        $hierarchy = [];
        $current = $object->getParent();

        while ($current instanceof UniProductCategoryInternal) {
            $hierarchy[] = $current;
            $current = $current->getParent();
        }

        return array_reverse($hierarchy);
    }

    /**
     * Get the single version copy for a product.
     */
    public function getVersionCopyForProduct(UniProductBase $product): ?UniProductBase
    {
        try {
            $hierarchy = $this->extractCategoryHierarchy($product);
            // $basePath = $hierarchy[0]->getPath();
            $versionBasePath = self::UNI_BASE_PATH . self::APPROVED_PRODUCTS_FOLDER_NAME;
            $categoryPath = $hierarchy !== [] ? array_map(fn($cat): string => $this->sanitizePathSegment($cat->getKey()), $hierarchy) : [];

            if ($categoryPath !== []) {
                $categoryBasedPath = $versionBasePath . '/' . implode('/', $categoryPath) . '/' . $product->getKey();
                $copy = \Pimcore\Model\DataObject::getByPath($categoryBasedPath);

                if ($copy instanceof UniProductBase) {
                    $originalId = $copy->getProperty('original_product_id');

                    if ($originalId === (string) $product->getId()) {
                        return $copy;
                    }
                }
            }

            $flatPath = $versionBasePath . '/' . $product->getKey();
            $copy = \Pimcore\Model\DataObject::getByPath($flatPath);

            if ($copy instanceof UniProductBase) {
                $originalId = $copy->getProperty('original_product_id');

                if ($originalId === (string) $product->getId()) {
                    return $copy;
                }
            }

            $listing = new \Pimcore\Model\DataObject\Listing();
            $listing->setCondition('o_path LIKE ? AND properties LIKE ?', [
                $versionBasePath . '%',
                '%original_product_id%' . $product->getId() . '%',
            ]);
            $listing->setLimit(1);
            $results = $listing->load();

            if (!empty($results) && $results[0] instanceof UniProductBase) {
                return $results[0];
            }

            return null;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Create cloned category structure in version path.
     *
     * @param array<UniProductCategoryInternal> $hierarchy
     */
    private function createClonedCategoryStructure(array $hierarchy, string $versionBasePath, string $basePath): UniProductCategoryInternal
    {
        $baseFolder = $this->ensureVersionFolderExists($versionBasePath, $basePath);
        $currentTarget = $baseFolder;

        foreach ($hierarchy as $originalCat) {
            if (!$originalCat instanceof UniProductCategoryInternal) {
                throw new \Exception('Invalid category object in hierarchy');
            }

            $catKey = $originalCat->getKey();
            $catKey = $this->sanitizePathSegment($catKey);

            $potentialPath = $currentTarget->getFullPath() . '/' . $catKey;
            $clonedCat = \Pimcore\Model\DataObject::getByPath($potentialPath);

            if (!$clonedCat instanceof UniProductCategoryInternal) {
                $clonedCat = clone $originalCat;
                $clonedCat->setId(null);
                $clonedCat->setKey($catKey);
                $clonedCat->setParentId($currentTarget->getId());
                $clonedCat->setProperty('is_version_copy', 'boolean', true);
                $clonedCat->setProperty('original_id', 'text', (string) $originalCat->getId());

                if (method_exists($clonedCat, 'setChildren')) {
                    $clonedCat->setChildren(null);
                }
                $clonedCat->save();
            }

            $currentTarget = $clonedCat;
        }

        return $currentTarget;
    }

    /**
     * Sanitize path segment for folder name.
     */
    private function sanitizePathSegment(string $segment): string
    {
        $sanitized = preg_replace('/[^a-zA-Z0-9\-_\s]/', '', $segment);
        $sanitized = trim($sanitized);
        $sanitized = preg_replace('/\s+/', '_', $sanitized);

        return $sanitized !== '' && $sanitized !== '0' && $sanitized !== [] ? $sanitized : 'Unknown';
    }

    /**
     * Ensure the version folder exists.
     */
    private function ensureVersionFolderExists(string $versionBasePath, string $basePath): \Pimcore\Model\DataObject\Folder
    {
        $parentFolder = \Pimcore\Model\DataObject::getByPath($versionBasePath);

        if (!$parentFolder instanceof \Pimcore\Model\DataObject\Folder) {
            $productsFolder = \Pimcore\Model\DataObject::getByPath($basePath);

            if (!$productsFolder instanceof \Pimcore\Model\DataObject) {
                throw new \Exception('Products folder not found at path');
            }

            $parentFolder = new \Pimcore\Model\DataObject\Folder();
            $parentFolder->setKey(self::APPROVED_PRODUCTS_FOLDER_NAME);
            $parentFolder->setParentId($productsFolder->getId());
            $parentFolder->save();
        }

        return $parentFolder;
    }

    /**
     * Copy data from one object to another.
     */
    private function copyObjectData(UniProductBase|UniProductCategoryInternal $from, UniProductBase|UniProductCategoryInternal $to): void
    {
        if (!$to instanceof Concrete) {
            throw new \Exception('Cannot copy data - objects must be instances of Concrete');
        }

        if ($from->getClassId() !== $to->getClassId()) {
            throw new \Exception('Cannot copy data between objects of different classes');
        }

        $to->setProperties($from->getProperties());

        $fieldDefinitions = $from->getClass()->getFieldDefinitions();

        foreach ($fieldDefinitions as $fieldName => $fieldDefinition) {
            $getter = 'get' . ucfirst($fieldName);
            $setter = 'set' . ucfirst($fieldName);

            if (method_exists($from, $getter) && method_exists($to, $setter)) {
                $value = $from->$getter();

                if (is_object($value)) {
                    $value = clone $value;
                }
                $to->$setter($value);
            }
        }

        $to->save();
    }

    private function hasAnyChanges(UniProductCategoryInternal $oldObject, UniProductCategoryInternal $newObject): bool
    {
        if (serialize($oldObject->getProperties()) !== serialize($newObject->getProperties())) {
            return true;
        }

        $fieldDefinitions = $oldObject->getClass()->getFieldDefinitions();

        foreach ($fieldDefinitions as $fieldName => $fieldDefinition) {
            $getter = 'get' . ucfirst($fieldName);

            if (method_exists($oldObject, $getter) && method_exists($newObject, $getter)) {
                $oldValue = $oldObject->$getter();
                $newValue = $newObject->$getter();

                if (!$this->valuesAreEqual($oldValue, $newValue)) {
                    return true;
                }
            }
        }

        if ($oldObject->getModificationDate() !== $newObject->getModificationDate()) {
            return true;
        }

        return false;
    }
}
