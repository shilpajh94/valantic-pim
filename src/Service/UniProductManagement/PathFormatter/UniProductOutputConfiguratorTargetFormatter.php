<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement\PathFormatter;

use App\Enum\UniProductHierarchyLevel;
use Carbon\Carbon;
use Pimcore\Model\DataObject\ClassDefinition\PathFormatterInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\ElementInterface;

class UniProductOutputConfiguratorTargetFormatter implements PathFormatterInterface
{
    protected const BASE_PATH = '/Unified PIM/Product Management/Products';

    /**
     * @param array<string,mixed> $result
     * @param array<string,mixed> $targets
     * @param array<string,mixed> $params
     *
     * @return array<string,string>
     */
    public function formatPath(array $result, ElementInterface $source, array $targets, array $params): array
    {
        foreach ($targets as $key => $item) {
            if ($item['type'] !== 'object') {
                continue;
            }

            $newPath = ($item['path'] ?? $item['fullpath']) . ' - ' . Carbon::now()->timestamp;

            $targetObject = Concrete::getById($item['id']);

            if (
                $targetObject instanceof UniProductCategoryInternal
                || ($targetObject instanceof UniProductBase && $targetObject->getHierarchyLevel() !== UniProductHierarchyLevel::FINISHED_GOOD->value)
            ) {
                $level = UniProductHierarchyLevel::tryFrom($targetObject->getHierarchyLevel())?->label() ?? 'Product';
                $newPath = sprintf(
                    '%s %s: %s',
                    $level,
                    str_replace(self::BASE_PATH . '/', '', $targetObject->getFullPath()),
                    $targetObject->getHierarchyLevelDescription(),
                );
            } elseif ($targetObject instanceof UniProductBase) {
                $newPath = sprintf(
                    'Finished Good %s: %s - %s',
                    str_replace(self::BASE_PATH . '/', '', $targetObject->getFullPath()),
                    $targetObject->getSapMaterialNumber(),
                    $targetObject->getSapDescription(),
                );
            }

            $result[$key] = $newPath;
        }

        return $result;
    }
}
