<?php

namespace Admin\Generator\Controller;

use Admin\Generator\Entity\Module;
use Admin\Response\BackendTemplateResponse;
use Gephart\ORM\EntityManager;
use Gephart\Request\Request;
use Gephart\Routing\Router;

/**
 * @Security ROLE_ADMIN
 * @RoutePrefix /admin/generator
 */
class NewController
{

    /**
     * @var BackendTemplateResponse
     */
    private $template_response;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var EntityManager
     */
    private $entity_manager;

    public function __construct(
        BackendTemplateResponse $template_response,
        Router $router,
        Request $request,
        EntityManager $entity_manager

    )
    {
        $this->template_response = $template_response;
        $this->router = $router;
        $this->request = $request;
        $this->entity_manager = $entity_manager;
    }

    /**
     * @Route {
     *  "rule": "/new",
     *  "name": "admin_generator_new"
     * }
     */
    public function index()
    {
        if ($this->request->post("name")) {
            $module = new Module();
            $this->mapEntityFromRequest($module);

            $this->entity_manager->save($module);

            $url = $this->router->generateUrl("admin_generator_edit", [
                "id" => $module->getId()
            ]);
            header("location: $url");
            exit;
        }

        return $this->template_response->template("admin/generator/new.html.twig");
    }

    private function mapEntityFromRequest(Module $module) {
        $module->setName($this->request->post("name"));
        $module->setSlugPlural($this->request->post("slug_plural"));
        $module->setSlugSingular($this->request->post("slug_singular"));
    }

}