<?php

namespace Admin\Controller;

use Admin\Response\BackendTemplateResponse;
use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\PageRepository;
use Gephart\ORM\EntityManager;
use Gephart\Request\Request;
use Gephart\Routing\Router;

/**
 * @Security ROLE_ADMIN
 * @RoutePrefix /admin/product
 */
class ProductController
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
     * @var ProductRepository
     */
    private $product_repository;

    /**
     * @var PageRepository
     */
    private $page_of_product_repository;

    /**
     * @var EntityManager
     */
    private $entity_manager;

    public function __construct(
        Router $router,
        BackendTemplateResponse $template_response,
        Request $request,
        EntityManager $entity_manager,
        PageRepository $page_of_product_repository,
        ProductRepository $product_repository
    )
    {
        $this->router = $router;
        $this->template_response = $template_response;
        $this->request = $request;
        $this->page_of_product_repository = $page_of_product_repository;
        $this->product_repository = $product_repository;
        $this->entity_manager = $entity_manager;
    }

    /**
     * @Route {
     *  "rule": "/",
     *  "name": "admin_product"
     * }
     */
    public function index()
    {
        if ($this->request->post("name")) {
            $product = new Product();
            $this->mapEntityFromRequest($product);

            $this->entity_manager->save($product);

            $url = $this->router->generateUrl("admin_product");
            header("location: $url");
            exit;
        }

        $page_of_products = $this->page_of_product_repository->findBy([],["ORDER BY" => "id"]);
        $products = $this->product_repository->findBy([], [
            "ORDER BY" => "id DESC"
        ]);

        return $this->template_response->template("admin/product/index.html.twig", [
            "page_of_products" => $page_of_products,
            "products" => $products
        ]);
    }

    /**
     * @Route {
     *  "rule": "/edit/{id}",
     *  "name": "admin_product_edit"
     * }
     */
    public function edit($id)
    {
        if ($this->request->post("name")) {
            $product = $this->product_repository->find($id);
            $this->mapEntityFromRequest($product);

            $this->entity_manager->save($product);

            $url = $this->router->generateUrl("admin_product_edit", ["id"=>$product->getId()]);
            header("location: $url");
            exit;
        }

        $page_of_products = $this->page_of_product_repository->findBy([],["ORDER BY" => "id"]);
        $product = $this->product_repository->find($id);

        return $this->template_response->template("admin/product/edit.html.twig", [
            "page_of_products" => $page_of_products,
            "product" => $product
        ]);
    }

    /**
     * @Route {
     *  "rule": "/delete/{id}",
     *  "name": "admin_product_delete"
     * }
     */
    public function delete($id)
    {
        $product = $this->product_repository->find($id);
        $this->entity_manager->remove($product);

        $url = $this->router->generateUrl("admin_product");
        header("location: $url");
        exit;
    }

    private function mapEntityFromRequest(Product $product) {
        $product->setName($this->request->post("name"));
        $product->setText($this->request->post("text"));
        $product->setActive($this->request->post("active"));
        $product->setPageOfProduct($this->request->post("page_of_product"));
        if (!empty($_FILES["obrazek"]) && !empty($_FILES["obrazek"]["tmp_name"])) {
            $product->setObrazek($this->uploadFile($_FILES["obrazek"]));
        }
        if ($this->request->post("obrazek_delete")) {
            $product->setObrazek("");
        }
        if (!empty($_FILES["soubor"]) && !empty($_FILES["soubor"]["tmp_name"])) {
            $product->setSoubor($this->uploadFile($_FILES["soubor"]));
        }
        if ($this->request->post("soubor_delete")) {
            $product->setSoubor("");
        }
    }

    private function uploadFile(array $file): string
    {
        $filename = md5($file["name"].time()) . "." . substr($file["name"], -4);
        $dir1 = substr($filename, 0, 2);
        $dir2 = substr($filename, 2, 2);
        $upload_dir = __DIR__ . "/../../../../web/upload";
        $target = $upload_dir . "/" . $dir1 . "/" . $dir2 . "/" . $filename;

        if (!is_dir($upload_dir . "/" . $dir1)) {
            @mkdir($upload_dir . "/" . $dir1);
            @chmod($upload_dir . "/" . $dir1, 0777);
        }

        if (!is_dir($upload_dir . "/" . $dir1 . "/" . $dir2)) {
            @mkdir($upload_dir . "/" . $dir1 . "/" . $dir2);
            @chmod($upload_dir . "/" . $dir1 . "/" . $dir2, 0777);
        }

        if (move_uploaded_file($file["tmp_name"], $target)) {
            @chmod($target, 0777);
            return $dir1 . "/" . $dir2 . "/" . $filename;
        }

        return "";
    }

}