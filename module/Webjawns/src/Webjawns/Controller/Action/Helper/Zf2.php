<?php

namespace Webjawns\Controller\Action\Helper;

use Zend\Mvc\Application;
use Zend_Controller_Action_Helper_Abstract as AbstractHelper;

/**
 * @method getConfig()
 * @method getEventManager()
 * @method getMvcEvent()
 * @method \Zend\ServiceManager\ServiceManager getServiceManager()
 */
class Zf2 extends AbstractHelper
{
    protected $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function preDispatch()
    {
        /* @var $controller \Zend_Controller_Action */
        $controller = $this->getActionController();
        $controller->zf2 = $this->application;
    }

    public function routeToZf2()
    {
        $controller = $this->getActionController();
        $controller->getHelper('layout')->disableLayout();
        $controller->getHelper('viewRenderer')->setNoRender(true);
        $this->application->run();
    }

    public function direct()
    {
        return $this;
    }

    public function __call($method, $args)
    {
        return call_user_func_array(array($this->application, $method), $args);
    }
}