<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 18/12/17
 * Time: 14:43
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class MenuController
 * @package AppBundle\Controller
 */
class MenuController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();

        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);

        return $this->render('navbar.html.twig', array(
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }
}