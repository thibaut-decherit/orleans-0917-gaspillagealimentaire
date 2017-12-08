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


class HomeAdminController extends Controller
{
    /**
     * @Route("/admin", name="home_admin")
     */
    public function homeAdminAction()
    {
        return $this->render('admin/homeAdmin.html.twig');
    }
}