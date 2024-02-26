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

namespace Instride\Bundle\DataDefinitionsBundle\Rules\Form\Type;

use CoreShop\Bundle\ResourceBundle\Form\Registry\FormTypeRegistryInterface;
use CoreShop\Bundle\RuleBundle\Form\Type\RuleConditionType;
use Symfony\Component\Form\FormBuilderInterface;

final class ImportRuleConditionType extends RuleConditionType
{
    public function __construct(array $validationGroups, FormTypeRegistryInterface $formTypeRegistry)
    {
        parent::__construct('', $validationGroups, $formTypeRegistry);
    }

    public function buildForm(FormBuilderInterface $builder, array $options = []): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('type', ImportRuleConditionChoiceType::class, [
                'attr' => [
                    'data-form-collection' => 'update',
                ],
            ]);
    }
}
