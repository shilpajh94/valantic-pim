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

declare(strict_types=1);

namespace Instride\Bundle\DataDefinitionsBundle\Context;

use Instride\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;

abstract class Context implements ContextInterface
{
    public function __construct(
        protected DataDefinitionInterface $definition,
        protected array $params,
        protected array $configuration,
    ) {
    }

    public function getDefinition(): DataDefinitionInterface
    {
        return $this->definition;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function withConfiguration(array $configuration): self
    {
        $context = clone $this;
        $context->setConfiguration($configuration);

        return $context;
    }

    protected function setConfiguration(array $configuration): void
    {
        $this->configuration = $configuration;
    }

    public function getConfiguration(): array
    {
        return $this->configuration;
    }
}
