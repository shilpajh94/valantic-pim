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
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareTrait;
use Instride\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\MappingInterface;

class ConditionalInterpreter implements InterpreterInterface, DataSetAwareInterface
{
    use DataSetAwareTrait;

    /**
     * @var ServiceRegistryInterface
     */
    private $interpreterRegistry;

    /**
     * @var ExpressionLanguage
     */
    protected $expressionLanguage;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param ServiceRegistryInterface $interpreterRegistry
     * @param ExpressionLanguage       $expressionLanguage
     * @param ContainerInterface       $container
     */
    public function __construct(
        ServiceRegistryInterface $interpreterRegistry,
        ExpressionLanguage $expressionLanguage,
        ContainerInterface $container
    ) {
        $this->interpreterRegistry = $interpreterRegistry;
        $this->expressionLanguage = $expressionLanguage;
        $this->container = $container;
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
        $params = [
            'value' => $value,
            'object' => $object,
            'map' => $map,
            'data' => $data,
            'definition' => $definition,
            'params' => $params,
            'configuration' => $configuration,
            'container' => $this->container,
        ];

        $condition = $configuration['condition'];

        if ($this->expressionLanguage->evaluate($condition, $params)) {
            $interpreter = $configuration['true_interpreter'];
        } else {
            $interpreter = $configuration['false_interpreter'];
        }

        $interpreterObject = $this->interpreterRegistry->get($interpreter['type']);

        if (!$interpreterObject instanceof InterpreterInterface) {
            return $value;
        }

        if ($interpreterObject instanceof DataSetAwareInterface) {
            $interpreterObject->setDataSet($this->getDataSet());
        }

        return $interpreterObject->interpret($object, $value, $map, $data, $definition, $params,
            $interpreter['interpreterConfig']);
    }
}


