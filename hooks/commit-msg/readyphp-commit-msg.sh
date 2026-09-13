#!/bin/sh

MSG_FILE="$1"
MSG=$(head -n 1 "$MSG_FILE")

# Regex stricte : type(scope): description
REGEX="^(feat|fix|docs|style|refactor|test|chore)\([a-zA-Z0-9_-]+\): .+$"

if ! echo "$MSG" | grep -Eq "$REGEX"; then
    echo "❌ Commit invalide."
    echo "Format attendu : type(scope): description"
    echo "Exemple : feat(api): ajouter endpoint utilisateur"
    exit 1
fi

echo "✔ Commit valide."
