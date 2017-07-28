<?php

namespace Admin\Controller;

use Admin\Response\BackendTemplateResponse;
use App\Entity\Page;
use App\Repository\PageRepository;
use Gephart\ORM\EntityManager;
use Gephart\Request\Request;
use Gephart\Routing\Router;

/**
 * @Security ROLE_ADMIN
 * @RoutePrefix /admin/page
 */
class PageController
{

    /**
     * @var Router
     */
    private $router;

    /**
     * @var BackendTemplateResponse
     */
    private $template_response;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var PageRepository
     */
    private $page_repository;

    /**
     * @var EntityManager
     */
    private $entity_manager;

    public function __construct(
        Router $router,
        BackendTemplateResponse $template_response,
        Request $request,
        EntityManager $entity_manager,
        PageRepository $page_repository
    )
    {
        $this->router = $router;
        $this->template_response = $template_response;
        $this->request = $request;
        $this->page_repository = $page_repository;
        $this->entity_manager = $entity_manager;
    }

    /**
     * @Route {
     *  "rule": "/",
     *  "name": "admin_page"
     * }
     */
    public function index()
    {
        if ($this->request->post("title")) {
            $page = new Page();
            $this->mapEntityFromRequest($page);

            $this->entity_manager->save($page);

            $url = $this->router->generateUrl("admin_page");
            header("location: $url");
            exit;
        }

        $pages = $this->page_repository->findBy([], [
            "ORDER BY" => "id DESC"
        ]);

        return $this->template_response->template("admin/page/index.html.twig", [
            "pages" => $pages
        ]);
    }

    /**
     * @Route {
     *  "rule": "/edit/{id}",
     *  "name": "admin_page_edit"
     * }
     */
    public function edit($id)
    {
        if ($this->request->post("title")) {
            $page = $this->page_repository->find($id);
            $this->mapEntityFromRequest($page);

            $this->entity_manager->save($page);

            $url = $this->router->generateUrl("admin_page_edit", ["id"=>$page->getId()]);
            header("location: $url");
            exit;
        }

        $page = $this->page_repository->find($id);

        return $this->template_response->template("admin/page/edit.html.twig", [
            "page" => $page
        ]);
    }

    /**
     * @Route {
     *  "rule": "/delete/{id}",
     *  "name": "admin_page_delete"
     * }
     */
    public function delete($id)
    {
        $page = $this->page_repository->find($id);
        $this->entity_manager->remove($page);

        $url = $this->router->generateUrl("admin_page");
        header("location: $url");
        exit;
    }

    private function mapEntityFromRequest(Page $page) {
        $page->setTitle($this->request->post("title"));
        $page->setText($this->request->post("text"));
        $page->setDatePublish(new \DateTime($this->request->post("date_publish")));
        $page->setPublished($this->request->post("published"));
        $page->setAuthor($this->request->post("author"));
        $page->setNeco($this->request->post("neco"));
    }

}