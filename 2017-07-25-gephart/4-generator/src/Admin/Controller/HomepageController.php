<?php

namespace Admin\Controller;

use Admin\Response\BackendTemplateResponse;
use Gephart\Routing\Router;
use Gephart\Sessions\Sessions;

/**
 * @Security ROLE_ADMIN
 */
class HomepageController
{

    /**
     * @var BackendTemplateResponse
     */
    private $template_response;

    public function __construct(BackendTemplateResponse $template_response)
    {
        $this->template_response = $template_response;
    }

    /**
     * @Route {
     *  "rule": "/admin",
     *  "name": "admin_homepage"
     * }
     */
    public function index()
    {
        return $this->template_response->template("admin/homepage.html.twig");
    }

}