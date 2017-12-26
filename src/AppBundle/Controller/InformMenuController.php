<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * InformMenuController controller.
 *
 * @Route("sinformer")
 */
class InformMenuController extends Controller
{
    /**
     * Lists all informMenu entities.
     *
     * @Route("/", name="inform_menu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $informMenus = $em->getRepository('AppBundle:InformMenu')->findAllDesc();

        return $this->render('informMenu/index.html.twig', array(
            'informMenus' => $informMenus,
        ));
    }
}
