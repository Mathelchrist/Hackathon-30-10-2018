<?php

namespace Controller;

use Model\CategoryManager;


class CategoryController
{
    public function indexCategory()
    {
        $categoryManager = new CategoryManager();
        $categorys = $categoryManager->selectAllCategorys();
        require __DIR__ . '/../View/category.php';

    }

    public function showCategory(int $id)
    {
        $categoryManager = new CategoryManager();
        $category = $categoryManager->selectOneCategory($id);

        require __DIR__ . '/../View/showCategory.php';
    }
}
?>