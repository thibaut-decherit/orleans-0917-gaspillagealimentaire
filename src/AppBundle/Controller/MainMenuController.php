<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 20/11/17
 * Time: 17:41
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\InformMenu;


/**
 * Class MainMenuController
 * @package AppBundle\Controller
 * @Route("menu-principal")
 */
class MainMenuController extends Controller
{
    /**
     * @Route("/", name="main_menu")
     */
    public function mainMenuAction()
    {
        return $this->render('mainMenu.html.twig');
    }
}
