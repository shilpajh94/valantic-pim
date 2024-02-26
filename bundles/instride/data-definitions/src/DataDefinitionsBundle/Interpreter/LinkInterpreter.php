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
use Pimcore\Model\DataObject\Data\Link;
use Pimcore\Model\Element\ElementInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\ExportDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\ImportDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\MappingInterface;

class LinkInterpreter implements InterpreterInterface
{
    public function interpret(
        Concrete $object,
        $value,
        MappingInterface $map,
        $data,
        DataDefinitionInterface $definition,
        $params,
        $configuration
    ) {
        if (($definition instanceof ExportDefinitionInterface) && $value instanceof Link) {
            return $value->getHref();
        }

        if (($definition instanceof ImportDefinitionInterface)) {
            $link = new Link();

            if (filter_var($value, FILTER_VALIDATE_URL)) {
                $link->setDirect($value);
            }

            $link->setText($value);

            if ($value instanceof ElementInterface) {
                $link->setObject($value);
            }

            return $link;
        }

        return null;
    }
}


