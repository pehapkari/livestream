<?php

namespace Admin\Controller;

use Gephart\Framework\Response\TemplateResponse;
use Gephart\Request\Request;
use Gephart\Routing\Router;
use Gephart\Security\Authenticator\Authenticator;
use Gephart\Sessions\Sessions;

final class LoginController
{

    /**
     * @var TemplateResponse
     */
    private $response;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var Authenticator
     */
    private $authenticator;

    public function __construct(
        TemplateResponse $template_response,
        Request $request,
        Router $router,
        Sessions $sessions,
        Authenticator $authenticator
    )
    {
        $this->response = $template_response;
        $this->request = $request;
        $this->router = $router;
        $this->authenticator = $authenticator;
    }

    /**
     * @Route {
     *  "rule": "/login",
     *  "name": "admin_login"
     * }
     */
    public function index()
    {
        if ($this->request->post("email") && $this->request->post("password")) {
            $email = $this->request->post("email");
            $password = $this->request->post("password");
            if ($this->authenticator->authorise($email, $password)) {
                $url = $this->router->generateUrl("admin_homepage");
                header("location: $url");
                exit;
            }
        }

        return $this->response->template("admin/login.html.twig");
    }
}