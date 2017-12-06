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
 * Class FrontPageController
 * @package AppBundle\Controller
 */
class FrontPageController extends Controller
{
    /**
     * @Route("/", name="front_page")
     */
    public function frontPageAction()
    {
        // replace this example code with whatever you need
        return $this->render('public/frontPage/frontPage.html.twig');
    }
}