#!/usr/bin/env bash

origin=${BASH_SOURCE[0]}
dir="${origin/utils\/install.sh/}"

if [ ! -d "$dir""node_modules" ]; then
    mkdir $dir"node_modules";
fi

npm install --prefix $dir;
gulp --gulpfile  $dir"gulpfile.js";
composer install -d $dir;