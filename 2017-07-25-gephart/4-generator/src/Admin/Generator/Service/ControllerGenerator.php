<?php

namespace Admin\Generator\Service;

use Admin\Generator\Entity\Item;
use Admin\Generator\Entity\Module;
use Admin\Generator\Repository\ItemRepository;
use Admin\Generator\Repository\ModuleRepository;
use Gephart\Framework\Template\Engine;
use Gephart\ORM\EntityManager;

class ControllerGenerator
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
        $this->controller_dir = realpath(__DIR__ . "/../../Controller");
    }

    public function isGenerated(int $module_id)
    {
        $module = $this->module_repository->find($module_id);
        $filename = $module->getEntityName() . "Controller.php";

        return file_exists($this->controller_dir . "/" . $filename);
    }

    public function generate(int $module_id)
    {
        $module = $this->module_repository->find($module_id);
        $items = $this->item_repository->findBy(["module_id = %1", $module_id], ["ORDER BY" => "id"]);

        $entities = $this->getEntities($module, $items);

        $entity_template = $this->template_engine->render("admin/generator/template/controller.php.twig", [
            "module" => $module,
            "items" => $items,
            "entities" => $entities
        ]);

        $filename = $module->getEntityName() . "Controller.php";
        file_put_contents($this->controller_dir . "/" . $filename, $entity_template);

        try {
            @chmod($this->controller_dir . "/" . $filename, 0777);
        } catch (\Exception $e) {}

        return htmlspecialchars($entity_template);
    }

    private function getEntities(Module $module, $items) {
        $entities = [$module->getEntityName()];

        /** @var Item $item */
        foreach ($items as $item) {
            if ($item->isRelation()) {
                $entities[] = $item->getType();
            }
        }

        return array_unique($entities);
    }
}