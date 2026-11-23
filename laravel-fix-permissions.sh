#!/bin/sh
set -eu

BASE=/apps/www

if [ "$#" -ne 3 ]; then
    echo "Usage: $0 /apps/www/<app> <uid> <gid>" >&2
    exit 64
fi

APP_REL=$1
OWNER_UID=$2
OWNER_GID=$3

case "$OWNER_UID" in
    82|33|github) ;;
    *) echo "UID is not allowed: $OWNER_UID" >&2; exit 64 ;;
esac

case "$OWNER_GID" in
    82|tape|github) ;;
    *) echo "GID is not allowed: $OWNER_GID" >&2; exit 64 ;;
esac

BASE_REAL=$(realpath -e -- "$BASE")
APP_REAL=$(realpath -e -- "$BASE_REAL/$APP_REL")

# simply set all files to specified userid
chown -R "$OWNER_UID:$OWNER_GID" "$APP_REAL"

# Laravel beschreibbare Verzeichnisse
for dir in "$APP_REAL/storage" "$APP_REAL/bootstrap/cache"; do
    if [[ -d "$dir" ]]; then
        find "$dir" -type d -exec chmod 775 {} +
        find "$dir" -type f -exec chmod 664 {} +
    fi
done