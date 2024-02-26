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

namespace Instride\Bundle\DataDefinitionsBundle\Importer;

use Instride\Bundle\DataDefinitionsBundle\Model\ImportDefinitionInterface;

interface AsyncImporterInterface
{
    public function doImportRowAsync(ImportDefinitionInterface $definition, array $row, array $params): void;

    public function doImportAsync(ImportDefinitionInterface $definition, array $params): void;
}
