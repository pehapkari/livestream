<?php

namespace Admin\Controller;

use Gephart\Routing\Exception\NotFoundRouteException;
use Gephart\Routing\Router;
use Gephart\Security\Authenticator\Authenticator;

final class LogoutController
{

    /**
     * @var Router
     */
    private $router;

    /**
     * @var Authenticator
     */
    private $authenticator;

    public function __construct(
        Router $router,
        Authenticator $authenticator
    )
    {
        $this->router = $router;
        $this->authenticator = $authenticator;
    }

    /**
     * @Route {
     *  "rule": "/logout",
     *  "name": "admin_logout"
     * }
     */
    public function index()
    {
        $this->authenticator->unauthorise();

        try {
            $url = $this->router->generateUrl("homepage");
        } catch (NotFoundRouteException $exception) {
            $url = $this->router->generateUrl("app\controller\defaultcontroller_index");
        } catch (\Exception $exception) {
            $url = "/";
        }

        header("location: $url");
        exit;
    }
}