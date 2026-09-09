#!/bin/bash

echo "→ Exécution des tests PHP (PHPUnit)"

# Aller à la racine du projet (important si le commit est lancé depuis un sous-dossier)
PROJECT_ROOT="$(git rev-parse --show-toplevel)"
cd "$PROJECT_ROOT" || exit 1

# Lancer PHPUnit
vendor/bin/phpunit --no-output
status=$?

if [ $status -ne 0 ]; then
    echo "❌ Tests PHP échoués — commit refusé"
    exit 1
fi

echo "✔ Tests PHP OK — commit accepté"
exit 0
