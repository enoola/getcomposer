//the head will come from head_of_phpfile.php

use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Options;

class Minimal extends CLI
{
    // register options and arguments
    protected function setup(Options $options)
    {
        $options->setHelp('A very minimal example that does nothing but print a version');
        $options->registerOption('version', 'print version', 'v');
    }

    // implement your code
    protected function main(Options $options)
    {
        if ($options->getOpt('version')) {
            $this->info('1.0.0');
        } else {
            echo $options->help();
        }
    }
}
// execute it

echo 'Will execute : $cli = new Minimal();'.PHP_EOL;
$cli = new Minimal();
$cli->run();
