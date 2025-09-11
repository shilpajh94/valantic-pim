<?php

declare(strict_types=1);

namespace App\Service;

use Pimcore\Model\DataObject\UniProductBase;
use Psr\Log\LoggerInterface;

class UniProductVersionService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Create a new version copy.
     */
    public function createVersionCopy(UniProductBase $product): void
    {
        $this->logger->info('=== Creating new version copy ===', [
            'productId' => $product->getId(),
            'productKey' => $product->getKey(),
        ]);

        try {
            $versionBasePath = '/Unified PIM/Product Management/Products/UniProductVersion';
            $parentFolder = $this->ensureVersionFolderExists($versionBasePath);
            $originalKey = $product->getKey();

            // Check if a copy with the same key already exists and remove it
            $existingCopy = \Pimcore\Model\DataObject::getByPath($versionBasePath . '/' . $originalKey);

            if ($existingCopy instanceof \Pimcore\Model\DataObject) {
                $this->logger->info('Removing existing copy with same key', [
                    'existingCopyId' => $existingCopy->getId(),
                    'key' => $originalKey,
                ]);
                $existingCopy->delete();
            }

            // Clone the product
            $cloned = clone $product;
            $cloned->setId(null);
            $cloned->setKey($originalKey);
            $cloned->setParentId($parentFolder->getId());
            $cloned->setPublished(false);
            $cloned->setProperty('is_version_copy', 'boolean', true);
            $cloned->setProperty('original_product_id', 'text', (string) $product->getId());
            $cloned->setProperty('version_created_at', 'date', \Carbon\Carbon::now());
            $cloned->setProperty('version_reason', 'text', 'approved_snapshot');

            $cloned->save(['validate' => false]);

            $this->logger->info('=== Version copy created successfully ===', [
                'originalId' => $product->getId(),
                'clonedId' => $cloned->getId(),
                'key' => $originalKey,
                'path' => $cloned->getFullPath(),
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
     * Get the single version copy for a product.
     */
    public function getVersionCopyForProduct(UniProductBase $product): ?UniProductBase
    {
        try {
            $versionBasePath = '/Unified PIM/Product Management/Products/UniProductVersion';
            $copyPath = $versionBasePath . '/' . $product->getKey();

            $copy = \Pimcore\Model\DataObject::getByPath($copyPath);

            if ($copy instanceof UniProductBase) {
                $originalId = $copy->getProperty('original_product_id');

                if ($originalId === (string) $product->getId()) {
                    return $copy;
                }
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

    /**
     * @deprecated Use createVersionCopy() instead
     */
    public function copyProductToVersionPath(UniProductBase $product): void
    {
        $this->createVersionCopy($product);
    }

    /**
     * Get all version copies.
     *
     * @return array<\Pimcore\Model\DataObject\AbstractObject>
     */
    public function getAllVersionCopies(): array
    {
        try {
            $versionBasePath = '/Unified PIM/Product Management/Products/UniProductVersion';
            $parentFolder = \Pimcore\Model\DataObject::getByPath($versionBasePath);

            if (!$parentFolder instanceof \Pimcore\Model\DataObject\Folder) {
                return [];
            }

            $listing = new \Pimcore\Model\DataObject\Listing();
            $listing->setCondition('o_parentId = ?', [$parentFolder->getId()]);
            $listing->setOrderKey('o_creationDate');
            $listing->setOrder('DESC');

            return $listing->load();
        } catch (\Exception $e) {
            $this->logger->error('Error retrieving all version copies', [
                'error' => $e->getMessage(),
            ]);

            return [];
        }
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
}
