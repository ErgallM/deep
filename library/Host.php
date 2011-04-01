<?php
namespace Deep;

class Host
{
    const DEEP_FILE_HOSTS = '/etc/hosts';

    protected $_hosts = array();

    /**
     * Get hosts list
     * 
     * @return array
     */
    public function getHostList()
    {
        $file = file_get_contents(self::DEEP_FILE_HOSTS);
        $hosts = array();
        foreach (explode(PHP_EOL, $file) as $h) {
            if (empty($h) || 0 === strpos($h, '::') || 0 === strpos($h, '#')) {
                continue;
            }

            $h = str_replace("\t", ' ', $h);
            $h = str_replace('  ', ' ', $h);

            $comment = strpos($h, '#');
            if (false !== $comment) {
                $h = substr($h, 0, (!$comment) ? 0 : $comment - 1);
            }

            if (!empty($h)) {
                $hosts[] = trim($h);
                echo $h . PHP_EOL;
            }
        }

        $this->_hosts = array();

        return $hosts;
    }
}
