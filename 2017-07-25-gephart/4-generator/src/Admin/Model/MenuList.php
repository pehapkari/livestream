<?php

namespace Admin\Model;

final class MenuList
{
    /**
     * @var array
     */
    private $menuItems;

    public function __construct()
    {
        $this->menuItems = [];
    }

    public function add(MenuItem $menuItem)
    {
        $this->menuItems[] = $menuItem;
    }

    public function getItems(): array
    {
        return $this->menuItems;
    }
}