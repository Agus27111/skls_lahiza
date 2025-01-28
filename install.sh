#!/bin/sh

# Tambahkan library yang dibutuhkan
apk add --no-cache openssl1.0-compat

# Tambahkan symbolic link jika dibutuhkan
ln -s /lib/libssl.so.1.0.0 /usr/lib/libssl.so.10
ln -s /lib/libcrypto.so.1.0.0 /usr/lib/libcrypto.so.10
