<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use Pimcore\Model\DataObject\UniProductCategoryExternal;

class CategoryDataService
{
    /**
     * Fetches data for the category and its children recursively.
     *
     * @param UniProductCategoryExternal $category The category object.
     *
     * @return array<int, array{id: int, name: string, parent: string|null}> Array of category data.
     */
    public function getCategoryData(UniProductCategoryExternal $category): array
    {
        $data = [];

        // Add the parent category
        $data[] = [
            'id' => $category->getId(),
            'name' => $category->getName(),
            'parent' => $category->getParent() instanceof \Pimcore\Model\DataObject\AbstractObject ? $category->getParent() : null,
        ];

        // Add children categories recursively
        foreach ($category->getChildren() as $child) {
            if ($child instanceof UniProductCategoryExternal) {
                $childData = $this->getCategoryData($child); // Recursive call
                $data = array_merge($data, $childData); // Merge child data
            }
        }

        return $data;
    }
}
