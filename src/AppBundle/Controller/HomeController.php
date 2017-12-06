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

/**
 * Class HomeController
 * @package AppBundle\Controller
 * @Route("accueil")
 */
class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {
        return $this->render('public/home/home.html.twig');
    }
}
