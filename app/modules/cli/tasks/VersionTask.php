<?php
namespace Shop_categories\Modules\Cli\Tasks;

class VersionTask extends MainTask
{
    public function mainAction()
    {
        $config = $this->getDI()->get('config');

        echo 'Api version: ' . $config['api']['version'] . "\n";
        echo "Phalcon version: " . \Phalcon\Version::get();
    }

}
