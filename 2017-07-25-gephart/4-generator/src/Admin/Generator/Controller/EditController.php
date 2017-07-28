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
class EditController
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
     *  "rule": "/edit/{id}",
     *  "name": "admin_generator_edit"
     * }
     */
    public function index($id)
    {
        $module = $this->module_repository->find($id);

        if ($this->request->post("name")) {
            $this->mapModuleFromRequest($module);
            $this->entity_manager->save($module);

            if (is_array($this->request->post("items"))) {
                $this->removeItems($id);
                $items = $this->mapItemsFromRequest($id);
                foreach($items as $item) {
                    $this->entity_manager->save($item);
                }
            }


            $url = $this->router->generateUrl("admin_generator_edit", [
                "id" => $id
            ]);
            header("location: $url");
            exit;
        }

        $items = $this->item_repository->findBy(["module_id = %1", $id], ["ORDER BY" => "id"]);
        $modules = $this->module_repository->findBy();

        return $this->template_response->template("admin/generator/edit.html.twig", [
            "modules" => $modules,
            "module" => $module,
            "items" => $items
        ]);
    }

    private function removeItems(int $id)
    {
        $items = $this->item_repository->findBy(["module_id = %1", $id], ["ORDER BY" => "id"]);
        foreach ($items as $item) {
            $this->entity_manager->remove($item);
        }
    }

    private function mapModuleFromRequest(Module $module)
    {
        $module->setName($this->request->post("name"));
        $module->setSlugPlural($this->request->post("slug_plural"));
        $module->setSlugSingular($this->request->post("slug_singular"));
        $module->setInMenu((bool) $this->request->post("in_menu"));
        $module->setIcon($this->request->post("icon"));
    }

    private function mapItemsFromRequest(int $id): array
    {
        $items = [];

        $items_data = $this->request->post("items");
        foreach ($items_data as $item_data) {
            $item = new Item();
            $item->setName($item_data["name"]);
            $item->setSlug($item_data["slug"]);
            $item->setType($item_data["type"]);
            $item->setModuleId($id);

            $items[] = $item;
        }

        return $items;
    }

}