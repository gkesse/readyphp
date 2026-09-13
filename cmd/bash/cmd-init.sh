#!/bin/bash

root_dir=$(dirname $(dirname $(dirname "$0")))

function cmd_init_commit_msg()
{
    echo "→ Initialisation du hook commit-msg"
    cp -f $root_dir/hooks/commit-msg/readyphp-commit-msg.sh $root_dir/.git/hooks/commit-msg
    chmod +x $root_dir/.git/hooks/commit-msg
    echo "✔ Hook commit-msg installé"
}

function cmd_main()
{
    cmd_init_commit_msg
}

cmd_main
