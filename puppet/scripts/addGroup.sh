#!/bin/bash
GROUPID="$1"
/bin/egrep  -i "^${GROUPID}:" /etc/group

if [ $? -ne 0 ]; then
    groupadd -g 10010 "$GROUPID"; addgroup vagrant "$GROUPID";
fi
