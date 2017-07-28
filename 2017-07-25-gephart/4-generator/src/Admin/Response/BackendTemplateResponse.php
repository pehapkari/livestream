<?php

namespace Admin\Response;

use Gephart\EventManager\Event;
use Gephart\EventManager\EventManager;
use Gephart\Framework\Response\TemplateResponse;
use Gephart\Response\ResponseInterface;

class BackendTemplateResponse implements ResponseInterface
{
    const DATA_TRANSMIT_EVENT = __CLASS__ . "::DATA_TRANSMIT_EVENT";

    /**
     * @var TemplateResponse
     */
    private $template_response;

    /**
     * @var EventManager
     */
    private $event_manager;

    public function __construct(TemplateResponse $template_response, EventManager $event_manager)
    {
        $this->template_response = $template_response;
        $this->event_manager = $event_manager;
    }

    public function template(string $template, array $data = [])
    {
        $data = $this->triggerDataTransmit($data);

        $this->template_response->template($template, $data);

        return $this;
    }

    public function render()
    {
        return $this->template_response->render();
    }

    private function triggerDataTransmit(array $data = []): array
    {
        $event = new Event();
        $event->setName(self::DATA_TRANSMIT_EVENT);
        $event->setParams([
            "data" => $data
        ]);

        $this->event_manager->trigger($event);

        return $event->getParam("data");
    }
}