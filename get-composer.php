#!/bin/bash
#shebang

#assuming php is installed. (tried with 8.2)
#
## get composer
#https://getcomposer.org/download/
#

echo "Hello,
$BASH_ARGV0 will install composer and gather the required projects.
"

phpbin=$(which php)
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

#read -p 'on continue ?(if not Ctrl-C)'
#php composer.phar update

#
# Aliases  are  not expanded when the shell is not interactive, unless the expand_aliases shell option is set using shopt (see the de‐
#       scription of shopt under SHELL BUILTIN COMMANDS below).
#
## so by default no aliases thanks to : https://askubuntu.com/questions/98782/how-to-run-an-alias-in-a-shell-script

shopt -s expand_aliases
alias composer="'$phpbin' '$(pwd)/composer.phar'"

echo "Alias execution"
composer update

echo "I will create a skeletton file name example-to-start-using-project.php"

cat head_of_phpfile.php body_exampleinvoke_php-cli.php > test_phpcli.php

echo "Will execute $phpbin test_phpcli ."
$phpbin test_phpcli.php

echo "End of $BASH_ARGV0."

exit 0
#docker-compose up php-8.2_intl
#sudo apt install python3.11-venv

#docker community (finally)
#https://docs.docker.com/engine/install/debian/#install-using-the-repository
#
#../MyNuxConfigs/common/add-docker-apt-repository-debian.sh
#sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
