<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement\PathFormatter;

use Pimcore\Model\DataObject\ClassDefinition\PathFormatterInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\Element\ElementInterface;

class UniProductMasterlistPathFormatter implements PathFormatterInterface
{
    /**
     * @param array<string,mixed> $result
     * @param array<string,mixed> $targets
     * @param array<string,mixed> $params
     *
     * @return array<string,mixed>
     */
    public function formatPath(array $result, ElementInterface $source, array $targets, array $params): array
    {
        foreach ($targets as $key => $item) {
            if ($item['type'] !== 'object') {
                continue;
            }

            $targetObject = Concrete::getById($item['id']);

            if ($targetObject === null) {
                continue;
            }

            if (method_exists($targetObject, 'getName')) {
                $result[$key] = $targetObject->getName();
            } elseif (method_exists($targetObject, 'getKey')) {
                $result[$key] = $targetObject->getKey();
            }
        }

        return $result;
    }
}
