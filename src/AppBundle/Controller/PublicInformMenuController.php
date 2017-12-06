<?php

namespace AppBundle\Controller;

use AppBundle\Entity\InformMenu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * PublicInformMenu controller.
 *
 * @Route("informer")
 */
class PublicInformMenuController extends Controller
{
    /**
     * Lists all informMenu entities.
     *
     * @Route("/", name="public_inform_menu_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $informMenus = $em->getRepository('AppBundle:InformMenu')->findAll();

        return $this->render('public/informMenu/index.html.twig', array(
            'informMenus' => $informMenus,
        ));
    }
}
