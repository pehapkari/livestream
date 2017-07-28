<?php

namespace Admin\Generator\Entity;

class ModuleStatus
{
    /**
     * @var bool
     */
    private $controller = false;

    /**
     * @var bool
     */
    private $table = false;

    /**
     * @var bool
     */
    private $entity = false;

    /**
     * @var bool
     */
    private $repository = false;

    /**
     * @var bool
     */
    private $view = false;

    /**
     * @return bool
     */
    public function isController(): bool
    {
        return $this->controller;
    }

    /**
     * @param bool $controller
     */
    public function setController(bool $controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return bool
     */
    public function isTable(): bool
    {
        return $this->table;
    }

    /**
     * @param bool $table
     */
    public function setTable(bool $table)
    {
        $this->table = $table;
    }

    /**
     * @return bool
     */
    public function isEntity(): bool
    {
        return $this->entity;
    }

    /**
     * @param bool $entity
     */
    public function setEntity(bool $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return bool
     */
    public function isRepository(): bool
    {
        return $this->repository;
    }

    /**
     * @param bool $repository
     */
    public function setRepository(bool $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return bool
     */
    public function isView(): bool
    {
        return $this->view;
    }

    /**
     * @param bool $view
     */
    public function setView(bool $view)
    {
        $this->view = $view;
    }
}