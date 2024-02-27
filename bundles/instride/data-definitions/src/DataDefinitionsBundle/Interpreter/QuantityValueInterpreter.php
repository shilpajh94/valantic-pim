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
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareTrait;
use Instride\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\MappingInterface;

class QuantityValueInterpreter implements InterpreterInterface, DataSetAwareInterface
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
        $value = $value !== '' ? $value : null;
        $unit = $configuration['unit'];

        return new \Pimcore\Model\DataObject\Data\QuantityValue($value, $unit);
    }
}


