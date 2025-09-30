<?php

require_once __DIR__ . '/vendor/autoload.php';

return Valantic\PhpCsFixerConfig\ConfigFactory::createValanticConfig([])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in([
                __DIR__ . '/src',
                __DIR__ . '/.ci',
            ])
            ->name(['*.php', '*.stub'])
            ->notPath([ // Happiest Minds
                'Services',
                'Kernel.php',
            ])
    )
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setRiskyAllowed(true);
