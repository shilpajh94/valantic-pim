#!/bin/bash

set -o errexit
set -o pipefail
set -o xtrace

cd "${CI_PROJECT_DIR}" || exit 1

find config/ packages/ src/ -type f \( -iname \*.yml -o -iname \*.yaml \) -print0 | xargs -0 -n1 -P4 yamllint -d relaxed

