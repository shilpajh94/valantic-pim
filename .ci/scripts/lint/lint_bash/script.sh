#!/bin/bash

set -o errexit
set -o pipefail
set -o xtrace

cd "${PROJECT_SCRIPTS_DIR}" || exit 1

find . -type f -name '*.sh' -print0 | xargs -0 -n1 -P4 shellcheck -x

