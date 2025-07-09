#!/bin/bash

set -o errexit
set -o pipefail
set -o xtrace

cd "${CI_PROJECT_DIR}" || exit 1

composer install --ignore-platform-reqs --no-scripts
# composer audit --ignore-severity=low

composer run rector -- --dry-run
composer run php-cs-fixer-check
composer run phpstan
