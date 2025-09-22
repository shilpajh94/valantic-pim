#!/bin/bash

set -o errexit
set -o pipefail
set -o xtrace

cd "${CI_PROJECT_DIR}" || exit 1

yamllint config src -c .yamllint.yaml
