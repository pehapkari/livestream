<?php

namespace Admin\Generator\Controller;

use Admin\Generator\Repository\ModuleRepository;
use Gephart\Framework\Response\TemplateResponse;

/**
 * @Security ROLE_ADMIN
 * @RoutePrefix /admin/generator
 */
class JavaScriptController
{

    /**
     * @var TemplateResponse
     */
    private $template_response;

    public function __construct(TemplateResponse $template_response)
    {
        $this->template_response = $template_response;
    }

    /**
     * @Route {
     *  "rule": "/generator.js",
     *  "name": "admin_generator_javascript"
     * }
     */
    public function index()
    {
        return $this->template_response->template("admin/generator/js/index.js.twig");
    }

}