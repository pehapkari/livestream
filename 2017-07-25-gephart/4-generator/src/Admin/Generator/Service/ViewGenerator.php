<?php

namespace Admin\Generator\Service;

use Admin\Generator\Repository\ItemRepository;
use Admin\Generator\Repository\ModuleRepository;
use Gephart\Framework\Template\Engine;
use Gephart\ORM\EntityManager;

class ViewGenerator
{
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

    /**
     * @var Engine
     */
    private $template_engine;

    public function __construct(
        EntityManager $entity_manager,
        ModuleRepository $module_repository,
        ItemRepository $item_repository,
        Engine $template_engine
    )
    {
        $this->entity_manager = $entity_manager;
        $this->module_repository = $module_repository;
        $this->item_repository = $item_repository;
        $this->template_engine = $template_engine;
        $this->view_dir = realpath(__DIR__ . "/../../../../template/admin/");
    }

    public function isGenerated(int $module_id)
    {
        $module = $this->module_repository->find($module_id);
        $filename = $module->getEntityName();

        return file_exists($this->view_dir . "/" . $filename . "/index.html.twig");
    }

    public function generate(int $module_id)
    {
        $module = $this->module_repository->find($module_id);
        $items = $this->item_repository->findBy(["module_id = %1", $module_id], ["ORDER BY" => "id"]);

        $view_index_template = $this->template_engine->render("admin/generator/template/view/index.html.twig", [
            "module" => $module,
            "items" => $items
        ]);
        $view_edit_template = $this->template_engine->render("admin/generator/template/view/edit.html.twig", [
            "module" => $module,
            "items" => $items
        ]);

        $filename = $module->getSlugSingular();

        if (!is_dir($this->view_dir . "/" . $filename)) {
            @mkdir($this->view_dir . "/" . $filename);
        }

        file_put_contents($this->view_dir . "/" . $filename . "/index.html.twig", $view_index_template);
        file_put_contents($this->view_dir . "/" . $filename . "/edit.html.twig", $view_edit_template);

        try {
            @chmod($this->view_dir . "/" . $filename, 0777);
            @chmod($this->view_dir . "/" . $filename. "/index.html.twig", 0777);
            @chmod($this->view_dir . "/" . $filename. "/edit.html.twig", 0777);
        } catch (\Exception $e) {}

        return htmlspecialchars($view_index_template);
    }
}