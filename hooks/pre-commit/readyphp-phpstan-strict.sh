#!/bin/bash
set -e

FILES="$@"

if [ -z "$FILES" ]; then
    exit 0
fi

echo "→ PHPStan strict rules sur fichiers stagés..."

vendor/bin/phpstan analyse --error-format=table $FILES

echo "✔ PHPStan OK"
