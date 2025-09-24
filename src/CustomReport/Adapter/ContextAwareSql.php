<?php

declare(strict_types=1);

namespace App\CustomReport\Adapter;

use Pimcore\Bundle\CustomReportsBundle\Tool\Adapter\Sql;
use Pimcore\Db;
use Pimcore\Model\User;
use Pimcore\Tool\Admin;

class ContextAwareSql extends Sql
{
    /**
     * Builds the query string, replacing :currentUserName or :currentUserId parameters with the current user's name or ID.
     *
     * @param \stdClass $config The configuration object containing the SQL query
     * @param bool $ignoreSelectAndGroupBy Whether to ignore SELECT and GROUP BY clauses
     * @param array<string, mixed>|null $drillDownFilters Additional drill-down filters
     * @param string|null $selectField Specific field to select
     *
     * @return string The built query string
     *
     * @throws \Exception If a :currentUserName or :currentUserId parameter is present but no user is logged in
     */
    protected function buildQueryString(\stdClass $config, bool $ignoreSelectAndGroupBy = false, ?array $drillDownFilters = null, ?string $selectField = null): string
    {
        $where = $config->where ?? '';

        // Check for :currentUserName or :currentUserId placeholders
        if (preg_match('/:currentUser(Name|Id)[^ ]*/', $where)) {
            // Get the current user
            $user = Admin::getCurrentUser();

            if (!$user instanceof User) {
                throw new \Exception('No logged-in user found for query with :currentUserName or :currentUserId');
            }

            $userName = Db::get()->quote($user->getName());
            $where = preg_replace('/:currentUserId[^ ]*/', (string) $user->getId(), $where);
            $where = preg_replace('/:currentUserName[^ ]*/', $userName, $where);
            $config->where = $where;
        }

        return parent::buildQueryString($config, $ignoreSelectAndGroupBy, $drillDownFilters, $selectField);
    }
}
