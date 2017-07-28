<?php

include_once "vendor/autoload.php";

class TextyConfiguration
{
    /**
     * @var array
     */
    private $configuration;

    public function __construct(\Gephart\Configuration\Configuration $configuration)
    {
        $this->configuration = $configuration->get("texty");
    }

    public function get(string $key): string
    {
        if (!isset($this->configuration[$key])) {
            throw new Exception("Not found '$key' in configuration 'texty'");
        }

        return $this->configuration[$key];
    }
}

class Hrnek
{

    /**
     * @var TextyConfiguration
     */
    private $textyConfiguration;

    public function __construct(TextyConfiguration $textyConfiguration)
    {
        $this->textyConfiguration = $textyConfiguration;
    }

    public function render()
    {
        return $this->textyConfiguration->get("hrnek") . PHP_EOL;
    }
}

class Kafe
{
    /**
     * @var Hrnek
     */
    private $hrnek;

    /**
     * @var TextyConfiguration
     */
    private $textyConfiguration;


    public function __construct(Hrnek $hrnek, TextyConfiguration $textyConfiguration)
    {

        $this->hrnek = $hrnek;
        $this->textyConfiguration = $textyConfiguration;
    }

    public function render()
    {
        return $this->textyConfiguration->get("kafe") . " a " . $this->hrnek->render();
    }
}

$container = new \Gephart\DependencyInjection\Container();

/** @var \Gephart\Configuration\Configuration $configuration */
$configuration = $container->get(\Gephart\Configuration\Configuration::class);
$configuration->setDirectory(__DIR__ . "/config");


/** @var Kafe $kafe */
$kafe = $container->get(Kafe::class);

echo $kafe->render();