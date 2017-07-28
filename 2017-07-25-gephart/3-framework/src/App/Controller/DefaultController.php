<?php

namespace App\Controller;

use Gephart\Framework\Response\TemplateResponse;

final class DefaultController
{

    /**
     * @var TemplateResponse
     */
    private $response;

    public function __construct(TemplateResponse $template_response)
    {
        $this->response = $template_response;
    }

    /**
     * @Route /
     */
    public function index() {
        return $this->response->template("_framework/default.html.twig");
    }
}
