<?php

namespace Admin\Generator\Controller;

use Admin\Generator\Entity\Item;
use Admin\Generator\Entity\Module;
use Admin\Generator\Repository\ItemRepository;
use Admin\Generator\Repository\ModuleRepository;
use Admin\Response\BackendTemplateResponse;
use Gephart\ORM\EntityManager;
use Gephart\Request\Request;
use Gephart\Routing\Router;

/**
 * @Security ROLE_ADMIN
 * @RoutePrefix /admin/generator
 */
class DeleteController
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

    /**
     * @var ModuleRepository
     */
    private $module_repository;

    /**
     * @var ItemRepository
     */
    private $item_repository;

    public function __construct(
        BackendTemplateResponse $template_response,
        Router $router,
        Request $request,
        EntityManager $entity_manager,
        ModuleRepository $module_repository,
        ItemRepository $item_repository
    )
    {
        $this->template_response = $template_response;
        $this->router = $router;
        $this->request = $request;
        $this->entity_manager = $entity_manager;
        $this->module_repository = $module_repository;
        $this->item_repository = $item_repository;
    }

    /**
     * @Route {
     *  "rule": "/delete/{id}",
     *  "name": "admin_generator_delete"
     * }
     */
    public function index($id)
    {
        $module = $this->module_repository->find($id);
        $this->removeItems($id);
        $this->entity_manager->remove($module);

        $url = $this->router->generateUrl("admin_generator");
        header("location: $url");
        exit;
    }

    private function removeItems(int $id)
    {
        $items = $this->item_repository->findBy(["module_id = %1", $id], ["ORDER BY" => "id"]);
        foreach ($items as $item) {
            $this->entity_manager->remove($item);
        }
    }

}