<?php
require_once 'library/Host.php';

class Deep
{
    protected $_hosts = null;

    public function __construct()
    {
        $this->_hosts = new Deep\Host();
    }

    public function run($comList)
    {
        if (isset($comList[0])) {

            switch ($comList[0]) {
                case 'host': $this->_hosts->getHostList(); break;
            }

        }
    }
}

