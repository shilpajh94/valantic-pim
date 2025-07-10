<?php

declare(strict_types=1);

namespace App\Model\DataObject;

use Pimcore\Model\DataObject\Concrete;

abstract class AbstractUniProductCategoryInternal extends Concrete
{
    use SuperfastSaveTrait;
}
