<?php

namespace Admin\Model;

use Admin\Generator\Repository\ModuleRepository;
use Gephart\Routing\Router;

final class Menu
{
    private $menu = [
        "homepage" => [
            "title" => "Nástěnka",
            "icon" => "home"
        ],
        "generator" => [
            "title" => "Generátor",
            "icon" => "console"
        ]
    ];

    /**
     * @var MenuList
     */
    private $menu_list;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var ModuleRepository
     */
    private $module_repository;

    public function __construct(Router $router, ModuleRepository $module_repository)
    {
        $this->menu_list = new MenuList();
        $this->router = $router;
        $this->module_repository = $module_repository;
    }

    public function getMenu()
    {
        $this->generateMenu();

        return $this->menu_list->getItems();
    }

    private function generateMenu()
    {
        $modules = $this->module_repository->findBy(["in_menu = %1", true]);
        foreach ($modules as $module) {
            $this->menu[$module->getSlugSingular()] = [
                "title" => $module->getName(),
                "icon" => $module->getIcon()
            ];
        }

        $actual_link = $this->router->actualUrl();
        foreach ($this->menu as $route_name => $menu_item) {
            $link = $this->router->generateUrl("admin_" . $route_name);

            $item = new MenuItem();
            $item->setLink($link);
            $item->setTitle(!empty($menu_item["title"])?$menu_item["title"]:"");
            $item->setIcon(!empty($menu_item["icon"])?$menu_item["icon"]:"");

            if (strpos($actual_link, $link) === 0) {
                $item->setActive(true);
            }

            $this->menu_list->add($item);
        }
    }
}