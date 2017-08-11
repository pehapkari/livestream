<?php

namespace Admin\EventListener;

use Admin\Model\Menu;
use Admin\Response\BackendTemplateResponse;
use Gephart\EventManager\Event;
use Gephart\EventManager\EventManager;
use Gephart\Security\Authenticator\Authenticator;

class UserListener
{

    /**
     * @var Authenticator
     */
    private $authenticator;

    public function __construct(EventManager $event_manager,  Authenticator $authenticator)
    {
        $this->authenticator = $authenticator;

        $event_manager->attach(BackendTemplateResponse::DATA_TRANSMIT_EVENT, [$this, "dataPrepend"]);
    }

    public function dataPrepend(Event $event)
    {
        $user = $this->authenticator->getUser();

        $data = array_merge([
            "user" => $user
        ], $event->getParam("data"));

        $event->setParams([
            "data" => $data
        ]);
    }
}