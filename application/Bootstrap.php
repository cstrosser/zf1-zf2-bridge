<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Bootstrap ZF2 application and action helper
     *
     * @return \Zend\Mvc\Application
     */
    protected function _initZf2()
    {
        $application = \Zend\Mvc\Application::init(require 'config/application.config.php');

        // Controller helper
        Zend_Controller_Action_HelperBroker::addHelper(
            new \Webjawns\Controller\Action\Helper\Zf2($application)
        );

        // View helper
        $serviceManager = $application->getServiceManager();
        $zf2Helper = new \Webjawns\View\Helper\Zf2($serviceManager->get('ViewHelperManager'));

        $this->bootstrap('view');
        $this->getResource('view')->registerHelper($zf2Helper, 'zf2');

        return $application;
    }
}