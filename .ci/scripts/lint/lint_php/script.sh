#!/bin/bash

set -o errexit
set -o pipefail
set -o xtrace

cd "${CI_PROJECT_DIR}" || exit 1
find . -type f -name '*.php' -not -path "./bundles/*" -print0 | xargs -0 -n1 -P4 php -l -n | (! grep -v "No syntax errors detected" )
