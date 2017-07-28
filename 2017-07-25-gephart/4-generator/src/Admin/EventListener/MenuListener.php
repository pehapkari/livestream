<?php

namespace Admin\EventListener;

use Admin\Model\Menu;
use Admin\Response\BackendTemplateResponse;
use Gephart\EventManager\Event;
use Gephart\EventManager\EventManager;

class MenuListener
{
    /**
     * @var Menu
     */
    private $menu;

    public function __construct(EventManager $event_manager, Menu $menu)
    {
        $this->menu = $menu;

        $event_manager->attach(BackendTemplateResponse::DATA_TRANSMIT_EVENT, [$this, "dataPrepend"]);
    }

    public function dataPrepend(Event $event)
    {
        $menu_list = $this->menu->getMenu();

        $data = array_merge([
            "menu_list" => $menu_list
        ], $event->getParam("data"));

        $event->setParams([
            "data" => $data
        ]);
    }
}