<?php

namespace Webjawns\View\Helper;

use Zend\View\HelperPluginManager;
use Zend_View_Helper_Abstract as AbstractHelper;

class Zf2 extends AbstractHelper
{
    protected $helperManager;

    public function __construct(HelperPluginManager $helperManager)
    {
        $this->helperManager = $helperManager;
    }

    public function zf2($name = null)
    {
        if (null !== $name) {
            return $this->helperManager->get($name);
        }
        return $this;
    }

    public function __call($method, $argv)
    {
        $helper = $this->helperManager->get($method);

        if (is_callable($helper)) {
            return call_user_func_array($helper, $argv);
        }
        return $helper;
    }
}