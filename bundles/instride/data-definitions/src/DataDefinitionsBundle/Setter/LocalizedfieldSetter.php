<?php
/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 instride AG (https://www.instride.ch)
 * @license    https://github.com/instride/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

namespace Instride\Bundle\DataDefinitionsBundle\Setter;

use Pimcore\Model\DataObject\Concrete;
use Instride\Bundle\DataDefinitionsBundle\Getter\GetterInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\ExportMapping;
use Instride\Bundle\DataDefinitionsBundle\Model\ImportMapping;
use Instride\Bundle\DataDefinitionsBundle\Model\MappingInterface;

class LocalizedfieldSetter implements SetterInterface, GetterInterface
{
    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function set(Concrete $object, $value, ImportMapping $map, $data)
    {
        $config = $map->getSetterConfig();

        $setter = explode('~', $map->getToColumn());
        $setter = sprintf('set%s', ucfirst($setter[0]));

        if (method_exists($object, $setter)) {
            $object->$setter($value, $config['language']);
        }
    }

    public function get(Concrete $object, ExportMapping $map, $data)
    {
        $config = $map->getGetterConfig();

        $getter = explode('~', $map->getFromColumn());
        $getter = sprintf('get%s', ucfirst($getter[0]));

        if (method_exists($object, $getter)) {
            return $object->$getter($config['language']);
        }

        return null;
    }
}


