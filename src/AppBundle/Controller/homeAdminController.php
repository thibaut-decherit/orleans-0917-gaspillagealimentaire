<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 23/11/17
 * Time: 11:01
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class homeAdminController extends Controller
{
    /**
     * @Route("/homepageAdmin", name="homepageAdmin")
     */
    public function indexAction()
    {
        return $this->render('homeAdmin/homeAdmin.html.twig');
    }
}