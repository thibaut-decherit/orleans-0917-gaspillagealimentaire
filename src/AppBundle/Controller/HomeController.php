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
 */
class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $informMenus = $em->getRepository('AppBundle:InformMenu')->findAll();
        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);

        return $this->render('home.html.twig', array(
            'informMenus' => $informMenus,
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }
}