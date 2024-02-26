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
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Instride\Bundle\DataDefinitionsBundle\Exception\InterpreterException;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareTrait;
use Instride\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\MappingInterface;

class ExpressionInterpreter implements InterpreterInterface, DataSetAwareInterface
{
    use DataSetAwareTrait;

    /**
     * @var ExpressionLanguage
     */
    protected $expressionLanguage;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param ExpressionLanguage $expressionLanguage
     * @param ContainerInterface $container
     */
    public function __construct(ExpressionLanguage $expressionLanguage, ContainerInterface $container)
    {
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
        $expression = $configuration['expression'];

        try {
            return $this->expressionLanguage->evaluate($expression, [
                'value' => $value,
                'object' => $object,
                'map' => $map,
                'data' => $data,
                'definition' => $definition,
                'params' => $params,
                'configuration' => $configuration,
                'container' => $this->container,
            ]);
        } catch (\Throwable $exception) {
            throw InterpreterException::fromInterpreter($definition, $map, $params, $value, $exception);
        }
    }
}


