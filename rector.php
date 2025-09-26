<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Symfony\Configs\Rector\Closure\MergeServiceNameTypeRector;
use Rector\Symfony\Set\SymfonySetList;

$isCI = array_key_exists('CI', $_ENV);

return RectorConfig::configure()
    ->withPreparedSets(
        deadCode: true,
        typeDeclarations: true,
        privatization: true,
        strictBooleans: true,
        carbon: true,
        symfonyCodeQuality: true,
        symfonyConfigs: true,
    )
    ->withAttributesSets(
        symfony: true,
        doctrine: true,
        mongoDb: true,
        gedmo: true,
        phpunit: true,
        fosRest: true,
        jms: true,
        sensiolabs: true,
    )
    ->withSets([
        DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES,
        SymfonySetList::SYMFONY_CONSTRUCTOR_INJECTION,
        SymfonySetList::SYMFONY_50,
        SymfonySetList::SYMFONY_50_TYPES,
        SymfonySetList::SYMFONY_51,
        SymfonySetList::SYMFONY_52,
        SymfonySetList::SYMFONY_53,
        SymfonySetList::SYMFONY_54,
        SymfonySetList::SYMFONY_60,
        SymfonySetList::SYMFONY_61,
        SymfonySetList::SYMFONY_62,
        SymfonySetList::SYMFONY_63,
        SymfonySetList::SYMFONY_64,
    ])
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withSkip([
        __DIR__ . '/src/Pimcore',
        __DIR__ . '/src/Services', // Happiest Minds
        __DIR__ . '/src/Kernel.php',
    ])
    ->withParallel(
        timeoutSeconds: $isCI ? 10 * 60 : null,
        maxNumberOfProcess: $isCI ? 2 : null,
    )
    ->withRootFiles();
