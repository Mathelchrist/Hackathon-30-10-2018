<?php

namespace Controller;
use Model\CategoryManager;
use Twig_Loader_Filesystem;
use Twig_Environment;

class CategoryController extends AbstractController
{
    private $twig;

    public function indexCategory()
    {
        $categoryManager = new CategoryManager();
        $categorys = $categoryManager->selectAllCategorys();

        return $this->twig->render('Category/category.html.twig', ['categorys' => $categorys]);
    }


    public function showCategory(int $id)
    {
        $categoryManager = new CategoryManager();
        $category = $categoryManager->selectOneCategory($id);

        return $this->twig->render('Category/categoryshow.html.twig', ['category' => $category]);
    }
}
?>