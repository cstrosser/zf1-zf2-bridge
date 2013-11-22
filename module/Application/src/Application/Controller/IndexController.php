<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function zf2Action()
    {
        /* @var $events \Zend\EventManager\EventManager */
        $events = $this->getServiceLocator()->get('Application')->getEventManager();
        $messageEvents = $events->trigger('messageFromZf1', $this);
        $messageArray = array();
        if (count($messageEvents)) {
            foreach ($messageEvents as $messageEvent) {
                $messageArray[] = $messageEvent;
            }
        }

        return array(
            'messageFromZf1' => implode(', ', $messageArray),
        );
    }
}