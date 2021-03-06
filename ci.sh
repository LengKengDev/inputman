#!/usr/bin/env bash
# Test before send pull request
# Check phpcs
echo "> Checking phpcs"
php phpcs.phar --standard=PSR2  app/ --encoding=utf-8
echo ">----------------------------------------------------"
php phpcbf.phar --standard=PSR2  app/ --encoding=utf-8
echo ">----------------------------------------------------"
# Check eslints
npm run lint
