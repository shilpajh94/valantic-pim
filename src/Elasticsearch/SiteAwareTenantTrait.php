<?php

declare(strict_types=1);

namespace App\Elasticsearch;

/**
 * Implement tenant specific methods for Elasticsearch index definitions.
 */
trait SiteAwareTenantTrait
{
    /** @return string[] */
    public function getTenants(): array
    {
        return ['main'];
    }

    public function getDefaultTenant(): string
    {
        return 'main';
    }
}
