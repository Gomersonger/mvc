<?php
namespace application\controllers;
use \application\models\Article as Article;
use \application\models\Category as Category;

class HomepageController extends \core\Controller
{
    /**
     * @var string Название страницы
     */
    public $homepageTitle = "Домашняя страница";
    
    /**
     * Выводит на экран страницу "Домашняя страница"
     */
    public function indexAction()
    {
        $Article = new Article();
        $Category = new Category();
//        \DebugPrinter::debug($Article);
        $homepageArticles = $Article->getList();
        $homepageCategories = $Category->getList();
        
        $this->view->addVar('homepageArticles', $homepageArticles);
        $this->view->addVar('homepageCategories', $homepageCategories);
        $this->view->addVar('homepageTitle', $this->homepageTitle);
        
        $this->view->render('homepage/index.php');
        
        
    }
    
    /**
     * Выводит на экран страницу "Домашняя страница" Администратора
     */
    public function indexAdminAction()
    {
        $Article = new Article();
//        \DebugPrinter::debug($Article);
        $Category = new Category();
        $homepageArticles = $Article->getList();
        $homepageCategories = $Category->getList();
        \DebugPrinter::debug($homepageCategories);
           
        $this->view->addVar('homepageArticles', $homepageArticles);
        $this->view->addVar('homepageCategories', $homepageCategories);
        $this->view->addVar('homepageTitle', $this->homepageTitle);
        
        $this->view->render('homepage/indexAdmin.php');
        
        
    }
}

