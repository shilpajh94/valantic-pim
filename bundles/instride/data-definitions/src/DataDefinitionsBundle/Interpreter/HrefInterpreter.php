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

namespace Instride\Bundle\DataDefinitionsBundle\Interpreter;

use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\Element\Service;
use Pimcore\Tool;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareTrait;
use Instride\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\MappingInterface;

class HrefInterpreter implements InterpreterInterface, DataSetAwareInterface
{
    use DataSetAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function interpret(
        Concrete $object,
        $value,
        MappingInterface $map,
        $data,
        DataDefinitionInterface $definition,
        $params,
        $configuration
    ) {
        $type = $configuration['type'] ?: 'object';
        $objectClass = $configuration['class'];

        if (!$value) {
            return null;
        }

        if ($type === 'object' && $objectClass) {
            $class = 'Pimcore\Model\DataObject\\'.$objectClass;

            if (!Tool::classExists($class)) {
                $class = 'Pimcore\Model\DataObject\\'.ucfirst($objectClass);
            }

            if (Tool::classExists($class)) {
                $class = new $class();

                if ($class instanceof Concrete) {
                    $ret = $class::getById($value);

                    if ($ret instanceof Concrete) {
                        return $ret;
                    }
                }
            }
        } else {
            return Service::getElementById($type, $value);
        }

        return null;
    }
}


