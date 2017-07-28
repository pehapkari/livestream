<?php

include_once "vendor/autoload.php";

class Hrnek
{
    public function render()
    {
        return "Hrnek" . PHP_EOL;
    }
}

class Kafe
{
    /**
     * @var Hrnek
     */
    private $hrnek;

    public function __construct(Hrnek $hrnek)
    {

        $this->hrnek = $hrnek;
    }

    public function render()
    {
        return "Kafe a " . $this->hrnek->render();
    }
}

$container = new \Gephart\DependencyInjection\Container();

/** @var Kafe $kafe */
$kafe = $container->get(Kafe::class);

echo $kafe->render();