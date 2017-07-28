<?php

namespace Admin\Generator\Controller;

use Admin\Generator\Entity\Module;
use Admin\Generator\Repository\ItemRepository;
use Admin\Generator\Repository\ModuleRepository;
use Admin\Generator\Service\ControllerGenerator;
use Admin\Generator\Service\EntityGenerator;
use Admin\Generator\Service\RepositoryGenerator;
use Admin\Generator\Service\ViewGenerator;
use Gephart\Framework\Response\TemplateResponse;
use Gephart\ORM\EntityManager;
use Gephart\ORM\SQLBuilder;
use Gephart\Request\Request;
use Gephart\Response\ResponseJson;

/**
 * @Security ROLE_ADMIN
 * @RoutePrefix /admin/generator/ajax
 */
class AjaxController
{

    /**
     * @var TemplateResponse
     */
    private $template_response;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var ModuleRepository
     */
    private $module_repository;

    /**
     * @var ItemRepository
     */
    private $item_repository;

    /**
     * @var EntityManager
     */
    private $entity_manager;

    /**
     * @var EntityGenerator
     */
    private $entity_generator;

    /**
     * @var ControllerGenerator
     */
    private $controller_generator;

    /**
     * @var SQLBuilder
     */
    private $sql_builder;

    /**
     * @var RepositoryGenerator
     */
    private $repository_generator;
    /**
     * @var ViewGenerator
     */
    private $view_generator;

    public function __construct(
        TemplateResponse $template_response,
        Request $request,
        ModuleRepository $module_repository,
        ItemRepository $item_repository,
        EntityManager $entity_manager,
        EntityGenerator $entity_generator,
        ControllerGenerator $controller_generator,
        RepositoryGenerator $repository_generator,
        ViewGenerator $view_generator,
        SQLBuilder $sql_builder
    )
    {
        $this->template_response = $template_response;
        $this->request = $request;
        $this->module_repository = $module_repository;
        $this->item_repository = $item_repository;
        $this->entity_manager = $entity_manager;
        $this->entity_generator = $entity_generator;
        $this->sql_builder = $sql_builder;
        $this->controller_generator = $controller_generator;
        $this->repository_generator = $repository_generator;
        $this->view_generator = $view_generator;
    }

    /**
     * @Route {
     *  "rule": "/item",
     *  "name": "admin_generator_ajax_item_new"
     * }
     */
    public function newItem()
    {
        $iterator = 0;
        if ($this->request->get("iterator")) {
            $iterator = $this->request->get("iterator");
        }
        $modules = $this->module_repository->findBy();
        return $this->template_response->template("admin/generator/snippet/item.html.twig", [
            "iterator" => $iterator,
            "modules" => $modules
        ]);
    }

    /**
     * @Route {
     *  "rule": "/tablesync",
     *  "name": "admin_generator_ajax_tablesync"
     * }
     */
    public function tableSync()
    {
        $id = $this->request->get("id");
        if (!$id) {
            throw new \Exception("Id must be sent in request.");
        }

        $module = $this->module_repository->find($id);

        if (!$this->entity_generator->isGenerated($id)) {
            $this->entity_generator->generate($id);
        }

        $sql = $this->sql_builder->syncTable("App\\Entity\\".$module->getEntityName());

        $this->entity_manager->syncTable("App\\Entity\\".$module->getEntityName());

        return $sql;

    }

    /**
     * @Route {
     *  "rule": "/entitysync",
     *  "name": "admin_generator_ajax_entitysync"
     * }
     */
    public function entitySync()
    {
        $id = $this->request->get("id");
        if (!$id) {
            throw new \Exception("Id must be sent in request.");
        }

        return $this->entity_generator->generate($id);
    }

    /**
     * @Route {
     *  "rule": "/controllersync",
     *  "name": "admin_generator_ajax_controllersync"
     * }
     */
    public function controllerSync()
    {
        $id = $this->request->get("id");
        if (!$id) {
            throw new \Exception("Id must be sent in request.");
        }

        return $this->controller_generator->generate($id);
    }

    /**
     * @Route {
     *  "rule": "/repositorysync",
     *  "name": "admin_generator_ajax_repositorysync"
     * }
     */
    public function repositorySync()
    {
        $id = $this->request->get("id");
        if (!$id) {
            throw new \Exception("Id must be sent in request.");
        }

        return $this->repository_generator->generate($id);
    }

    /**
     * @Route {
     *  "rule": "/viewsync",
     *  "name": "admin_generator_ajax_viewsync"
     * }
     */
    public function viewSync()
    {
        $id = $this->request->get("id");
        if (!$id) {
            throw new \Exception("Id must be sent in request.");
        }

        return $this->view_generator->generate($id);
    }

    /**
     * @Route {
     *  "rule": "/save_sort_modules",
     *  "name": "admin_generator_ajax_savesortmodules"
     * }
     */
    public function saveSortModules()
    {
        $sorts = $this->request->get("sorts");
        if (empty($sorts)) {
            throw new \Exception("Sorts must be sent in request.");
        }

        $modules = $this->module_repository->findBy();

        $sort = 0;
        foreach ($sorts as $module_id) {
            /** @var Module $module */
            foreach ($modules as $module) {
                if ($module->getId() == $module_id) {
                    $module->setSort(++$sort);
                    $this->entity_manager->save($module);
                }
            }
        }

        return new ResponseJson(["sorted" => $sort]);
    }

}