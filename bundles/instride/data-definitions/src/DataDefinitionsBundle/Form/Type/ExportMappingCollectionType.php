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

namespace Instride\Bundle\DataDefinitionsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ExportMappingCollectionType extends AbstractType
{
    private DataMapperInterface $dataMapper;

    public function __construct(
        DataMapperInterface $dataMapper
    ) {
        $this->dataMapper = $dataMapper;
    }

    public function getParent(): ?string
    {
        return CollectionType::class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->setDataMapper($this->dataMapper);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'entry_type' => ExportMappingType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => true,
        ]);
    }
}
