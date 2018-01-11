<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 08/01/18
 * Time: 13:51
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class ResourceController
 * @Route("resources")
 */
class ResourceController extends Controller
{
    /**
     * Lists all resource entities.
     *
     * @Route("/", name="resources_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resources = $em->getRepository('AppBundle:Resource')->findAllDesc();

        return $this->render('resources/index.html.twig', array(
            'resources' => $resources,
        ));
    }

}