<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        /* @var $zf2 \Webjawns\Controller\Action\Helper\Zf2 */
        $zf2 = $this->getHelper('zf2');

        /* @var $eventManager \Zend\EventManager\EventManagerInterface */
        $this->view->events = $zf2->getEventManager()->getEvents();
    }

    public function zf2Action()
    {
        $zf2 = $this->getHelper('zf2');

        /* @var $events \Zend\EventManager\EventManagerInterface */
        $method = __METHOD__;
        $zf2->getEventManager()->attach('messageFromZf1', function() use ($method) {
            return sprintf('This event was attached by <code>%s()</code>.', $method);
        });

        $zf2->routeToZf2();
    }
}