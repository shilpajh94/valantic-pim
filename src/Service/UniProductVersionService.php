<?php

declare(strict_types=1);

namespace App\Service;

use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\AbstractObject;
use Psr\Log\LoggerInterface;

class UniProductVersionService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Create a new version copy
     */
    public function createVersionCopy(UniProductBase $product): void
    {
        $this->logger->info('=== Creating new version copy ===', [
            'productId' => $product->getId(),
            'productKey' => $product->getKey(),
        ]);

        try {
            $basePath = $this->extractCategoryHierarchy($product)[0]->getPath();
            $versionBasePath = $basePath . '/UniProductVersion';
            $originalKey = $product->getKey();

            $hierarchy = $this->extractCategoryHierarchy($product);

            $targetFolder = $this->createClonedCategoryStructure($hierarchy, $versionBasePath);

            $existingCopyPath = $targetFolder->getFullPath() . '/' . $originalKey;
            $existingCopy = \Pimcore\Model\DataObject::getByPath($existingCopyPath);

            if ($existingCopy instanceof \Pimcore\Model\DataObject) {
                $this->logger->info('Removing existing copy with same key in category path', [
                    'existingCopyId' => $existingCopy->getId(),
                    'key' => $originalKey,
                    'path' => $existingCopyPath,
                ]);
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

            $categoryIds = $hierarchy ? array_map(fn($cat) => $cat->getId(), $hierarchy) : [];
            $cloned->setProperty('original_category_ids', 'text', json_encode($categoryIds));

            $cloned->save(['validate' => false]);

            $this->logger->info('=== Version copy created successfully ===', [
                'originalId' => $product->getId(),
                'clonedId' => $cloned->getId(),
                'key' => $originalKey,
                'path' => $cloned->getFullPath(),
                'categoryIds' => $categoryIds,
            ]);
        } catch (\Exception $e) {
            $this->logger->error('Error creating version copy', [
                'productId' => $product->getId(),
                'error' => $e->getMessage(),
                'stackTrace' => $e->getTraceAsString(),
            ]);

            throw $e;
        }
    }

    /**
     * Update existing version copy with current product data
     */
    public function updateVersionCopy(UniProductBase $product, UniProductBase $existingCopy): void
    {
        $this->logger->info('=== Updating existing version copy ===', [
            'productId' => $product->getId(),
            'existingCopyId' => $existingCopy->getId(),
        ]);

        try {
            $hierarchy = $this->extractCategoryHierarchy($product);
            $currentCategoryIds = $hierarchy ? array_map(fn($cat) => $cat->getId(), $hierarchy) : [];

            $originalCategoryIds = $existingCopy->getProperty('original_category_ids');
            $originalCategoryIds = $originalCategoryIds ? json_decode($originalCategoryIds, true) : [];

            $basePath = $this->extractCategoryHierarchy($product)[0]->getPath();
            $versionBasePath = $basePath . '/UniProductVersion';

            $hasCategoryChanged = json_encode($originalCategoryIds) !== json_encode($currentCategoryIds);

            if ($hasCategoryChanged) {
                $this->logger->info('Category hierarchy changed, moving version copy', [
                    'productId' => $product->getId(),
                    'oldIds' => $originalCategoryIds,
                    'newIds' => $currentCategoryIds,
                ]);

                $newTargetFolder = $this->createClonedCategoryStructure($hierarchy, $versionBasePath);

                $existingCopy->setParentId($newTargetFolder->getId());
                $existingCopy->setProperty('original_category_ids', 'text', json_encode($currentCategoryIds));
            } else {
                $clonedHierarchy = $this->extractCategoryHierarchy($existingCopy);
                if (count($clonedHierarchy) === count($hierarchy)) {
                    foreach ($hierarchy as $index => $originalCat) {
                        $clonedCat = $clonedHierarchy[$index];
                        if ($this->hasAnyChanges($originalCat, $clonedCat)) {
                            $this->copyObjectData($originalCat, $clonedCat);
                            $this->logger->info('Updated cloned category', [
                                'originalCatId' => $originalCat->getId(),
                                'clonedCatId' => $clonedCat->getId(),
                            ]);
                        }
                    }
                }
            }

            $this->copyObjectData($product, $existingCopy);

            $existingCopy->setProperty('version_updated_at', 'date', new \DateTime());
            $existingCopy->setProperty('version_reason', 'text', 'approved_snapshot_updated');

            $existingCopy->save(['validate' => false]);

            $this->logger->info('=== Version copy updated successfully ===', [
                'productId' => $product->getId(),
                'copyId' => $existingCopy->getId(),
            ]);
        } catch (\Exception $e) {
            $this->logger->error('Error updating version copy', [
                'productId' => $product->getId(),
                'copyId' => $existingCopy->getId(),
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
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

    public function extractCategoryHierarchy(AbstractObject $object): array
    {
        $hierarchy = [];
        $current = $object->getParent();

        while ($current instanceof AbstractObject && $current->getKey() !== 'Products') {
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
            $basePath = $this->extractCategoryHierarchy($product)[0]->getPath();
            $versionBasePath = $basePath . '/UniProductVersion';

            $hierarchy = $this->extractCategoryHierarchy($product);
            $categoryPath = $hierarchy ? array_map(fn($cat) => $this->sanitizePathSegment($cat->getKey()), $hierarchy) : [];
            if ($categoryPath) {
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
            $listing->setCondition("o_path LIKE ? AND properties LIKE ?", [
                $versionBasePath . '%',
                '%original_product_id%' . $product->getId() . '%'
            ]);
            $listing->setLimit(1);
            $results = $listing->load();

            if (!empty($results) && $results[0] instanceof UniProductBase) {
                return $results[0];
            }

            return null;
        } catch (\Exception $e) {
            $this->logger->error('Error retrieving version copy', [
                'productId' => $product->getId(),
                'error' => $e->getMessage(),
            ]);

            return null;
        }
    }

    public function getLoggableValue(mixed $value): string
    {
        if ($value === null) {
            return 'null';
        }

        if ($value instanceof \DateTime) {
            return $value->format('Y-m-d H:i:s');
        }

        if (is_object($value)) {
            return $value::class . ' object';
        }

        if (is_array($value)) {
            return 'array with ' . count($value) . ' items';
        }

        return (string) $value;
    }

    /**
     * Create cloned category structure in version path.
     */
    private function createClonedCategoryStructure(array $hierarchy, string $basePath): AbstractObject
    {
        $baseFolder = $this->ensureVersionFolderExists($basePath);
        $currentTarget = $baseFolder;

        foreach ($hierarchy as $originalCat) {
            if (!$originalCat instanceof AbstractObject) {
                throw new \Exception('Invalid category object in hierarchy');
            }

            $catKey = $originalCat->getKey();
            $catKey = $this->sanitizePathSegment($catKey);

            $potentialPath = $currentTarget->getFullPath() . '/' . $catKey;
            $clonedCat = \Pimcore\Model\DataObject::getByPath($potentialPath);

            if (!$clonedCat instanceof AbstractObject) {
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

                $this->logger->info('Cloned category in version path', [
                    'originalId' => $originalCat->getId(),
                    'clonedId' => $clonedCat->getId(),
                    'path' => $potentialPath,
                ]);
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

        return $sanitized ?: 'Unknown';
    }

    /**
     * Ensure the version folder exists.
     */
    private function ensureVersionFolderExists(string $versionBasePath): \Pimcore\Model\DataObject\Folder
    {
        $parentFolder = \Pimcore\Model\DataObject::getByPath($versionBasePath);

        if (!$parentFolder instanceof \Pimcore\Model\DataObject\Folder) {
            $this->logger->info('Version folder does not exist, creating it...');

            $productsFolder = \Pimcore\Model\DataObject::getByPath('/Unified PIM/Product Management/Products');

            if (!$productsFolder instanceof \Pimcore\Model\DataObject) {
                throw new \Exception('Products folder not found at path: /Unified PIM/Product Management/Products');
            }

            $parentFolder = new \Pimcore\Model\DataObject\Folder();
            $parentFolder->setKey('UniProductVersion');
            $parentFolder->setParentId($productsFolder->getId());
            $parentFolder->save();

            $this->logger->info('Successfully created UniProductVersion folder', [
                'path' => $versionBasePath,
                'folderId' => $parentFolder->getId(),
            ]);
        }

        return $parentFolder;
    }

    /**
     * Copy data from one object to another
     */
    private function copyObjectData(AbstractObject $from, AbstractObject $to): void
    {
        if ($from->getClassId() !== $to->getClassId()) {
            throw new \Exception('Cannot copy data between objects of different classes');
        }

        $to->setProperties($from->getProperties());

        $fieldDefinitions = $from->getClass()->getFieldDefinitions();
        foreach ($fieldDefinitions as $fieldName => $fieldDefinition) {
            try {
                $getter = 'get' . ucfirst($fieldName);
                $setter = 'set' . ucfirst($fieldName);

                if (method_exists($from, $getter) && method_exists($to, $setter)) {
                    $value = $from->$getter();
                    if (is_object($value)) {
                        $value = clone $value;
                    }
                    $to->$setter($value);
                }
            } catch (\Exception $e) {
                $this->logger->warning('Failed to copy field during update', [
                    'field' => $fieldName,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        $to->save();
    }

    private function hasAnyChanges(AbstractObject $oldObject, AbstractObject $newObject): bool
    {
        if (serialize($oldObject->getProperties()) !== serialize($newObject->getProperties())) {
            return true;
        }

        $fieldDefinitions = $oldObject->getClass()->getFieldDefinitions();

        foreach ($fieldDefinitions as $fieldName => $fieldDefinition) {
            $getter = 'get' . ucfirst($fieldName);

            if (method_exists($oldObject, $getter) && method_exists($newObject, $getter)) {
                try {
                    $oldValue = $oldObject->$getter();
                    $newValue = $newObject->$getter();

                    if (!$this->valuesAreEqual($oldValue, $newValue)) {
                        return true;
                    }
                } catch (\Exception $e) {
                    $this->logger->warning('Could not compare field values', [
                        'field' => $fieldName,
                        'error' => $e->getMessage(),
                    ]);
                }
            }
        }

        if ($oldObject->getModificationDate() !== $newObject->getModificationDate()) {
            return true;
        }

        return false;
    }
}
