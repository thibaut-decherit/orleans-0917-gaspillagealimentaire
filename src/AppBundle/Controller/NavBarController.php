<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 09/12/17
 * Time: 09:45
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\InformMenu;

/**
 * Class NavBarController
 * @package AppBundle\Controller
 * @Route("/")
 */
class NavBarController extends Controller
{
    /**
     * Lists is_menu informMenu entities.
     *
     * @Route("/", name="navbar_links")
     * @Method("GET")
     */
    public function linksNavBarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $informMenus = $em->getRepository('AppBundle:InformMenu')->findAll();

        return $this->render('navbar.html.twig', array(
            'informMenus' => $informMenus,
        ));
    }
}