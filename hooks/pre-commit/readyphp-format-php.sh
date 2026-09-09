#!/bin/bash

PROJECT="."
FIXER="$PROJECT/vendor/bin/php-cs-fixer"
CONFIG="$PROJECT/.php-cs-fixer.php"

echo "→ Formatage PHP via PHP-CS-Fixer"

$FIXER fix --quiet --using-cache=no --config="$CONFIG"
if [ $? -ne 0 ]; then
    echo "❌ Formatage PHP échoué — commit refusé"
    exit 1
fi

echo "✔ Formatage OK"
exit 0
