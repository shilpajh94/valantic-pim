<?php

declare(strict_types=1);

namespace App\Elasticsearch;

trait SiteAwareTenantTrait
{
    public function getTenants(): array
    {
        return ['main'];
    }

    public function getDefaultTenant(): string
    {
        return 'main';
    }
}
