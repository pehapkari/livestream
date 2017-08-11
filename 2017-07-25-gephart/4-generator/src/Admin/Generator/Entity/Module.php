<?php

namespace Admin\Generator\Entity;

/**
 * @ORM\Table generator_module
 * @ORM\Translation
 */
class Module
{

    /**
     * @var int
     *
     * @ORM\Id
     */
    private $id = 0;

    /**
     * @var string
     *
     * @ORM\Type VARCHAR(255)
     * @ORM\Column name
     * @ORM\Translatable
     */
    private $name = "";

    /**
     * @var string
     *
     * @ORM\Type VARCHAR(255)
     * @ORM\Column slug_singular
     */
    private $slug_singular = "";

    /**
     * @var string
     *
     * @ORM\Type VARCHAR(255)
     * @ORM\Column slug_plural
     */
    private $slug_plural = "";

    /**
     * @var bool
     *
     * @ORM\Type TINYINT(1)
     * @ORM\Column in_menu
     */
    private $in_menu = "";

    /**
     * @var string
     *
     * @ORM\Type VARCHAR(255)
     * @ORM\Column icon
     */
    private $icon = "";

    /**
     * @var int
     *
     * @ORM\Type int
     * @ORM\Column sort
     */
    private $sort = 0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlugSingular(): string
    {
        return $this->slug_singular;
    }

    /**
     * @param string $slug_singular
     */
    public function setSlugSingular(string $slug_singular)
    {
        $this->slug_singular = $slug_singular;
    }

    /**
     * @return string
     */
    public function getSlugPlural(): string
    {
        return $this->slug_plural;
    }

    /**
     * @param string $slug_plural
     */
    public function setSlugPlural(string $slug_plural)
    {
        $this->slug_plural = $slug_plural;
    }

    public function getEntityName()
    {
        return str_replacE("_", "", ucwords($this->getSlugSingular(), "_"));
    }

    /**
     * @return bool
     */
    public function isInMenu(): bool
    {
        return $this->in_menu;
    }

    /**
     * @param bool $in_menu
     */
    public function setInMenu(bool $in_menu)
    {
        $this->in_menu = $in_menu;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon(string $icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return int
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @param int $sort
     */
    public function setSort(int $sort)
    {
        $this->sort = $sort;
    }

}