#!/bin/bash

szcmd='rm -Rfv ./composer.lock ./composer.phar ./vendor'

echo "Before cleaning this folder let see size df -cs : "
du -cs . | tail -n 1
echo
echo Will do the cleaning, command : "${szcmd}"
echo '##### Output of command $szcme     ######' >> rmfiles.output.log

$(echo $szcmd) >> rmfiles.output.log

echo
echo "After cleaning size ${szcmd} is "
du -cs . | tail -n 1


