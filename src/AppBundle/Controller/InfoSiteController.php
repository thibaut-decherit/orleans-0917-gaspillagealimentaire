<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 20/12/17
 * Time: 10:10
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class InfoSiteController
 * @Route("info-site")
 */
class InfoSiteController extends Controller
{
    /**
     * Lists all informMenu entities.
     *
     * @Route("/", name="info_site_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);

        return $this->render('infoSite/index.html.twig', array(
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }

}