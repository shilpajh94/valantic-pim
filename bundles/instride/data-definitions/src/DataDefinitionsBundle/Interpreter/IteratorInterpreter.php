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

use CoreShop\Component\Registry\ServiceRegistryInterface;
use Pimcore\Model\DataObject\Concrete;
use Webmozart\Assert\Assert;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareTrait;
use Instride\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\MappingInterface;

final class IteratorInterpreter implements InterpreterInterface, DataSetAwareInterface
{
    use DataSetAwareTrait;

    /**
     * @var ServiceRegistryInterface
     */
    private $interpreterRegistry;

    /**
     * @param ServiceRegistryInterface $interpreterRegistry
     */
    public function __construct(ServiceRegistryInterface $interpreterRegistry)
    {
        $this->interpreterRegistry = $interpreterRegistry;
    }

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
        if (null === $value) {
            return [];
        }
        Assert::isArray($value, 'IteratorInterpreter can only be used with array values');

        $interpreter = $configuration['interpreter'];
        $interpreterObject = $this->interpreterRegistry->get($interpreter['type']);

        if ($interpreterObject instanceof DataSetAwareInterface) {
            $interpreterObject->setDataSet($this->getDataSet());
        }

        foreach ($value as &$val) {
            $val = $interpreterObject->interpret($object, $val, $map, $data, $definition, $params,
                $interpreter['interpreterConfig']);
        }

        return $value;
    }
}


