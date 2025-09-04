<?php

declare(strict_types=1);

namespace App\Model\OptionsProvider;

use App\Enum\OptionsProviderSupport;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

/** @template TEnum of OptionsProviderSupport */
abstract class AbstractEnumOptionsProvider implements SelectOptionsProviderInterface
{
    /**
     * @param array<mixed> $context
     *
     * @return array<array{'key':string,'value':int|string}>
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        return array_map(
            /** @var TEnum $case */
            static fn(OptionsProviderSupport $case): array => [
                'key' => $case->label(),
                'value' => $case->value,
            ],
            $this->getEnumClass()::cases()
        );
    }

    /**
     * @param array<mixed> $context
     */
    public function hasStaticOptions(array $context, Data $fieldDefinition): bool
    {
        return true;
    }

    /**
     * @param array<mixed> $context
     */
    public function getDefaultValue(array $context, Data $fieldDefinition): ?string
    {
        return null;
    }

    /** @return class-string<TEnum> */
    abstract protected function getEnumClass(): string;
}
