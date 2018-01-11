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
     * Lists all informMenu entities.
     *
     * @Route("/", name="resources_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resourceThemes = $em->getRepository('AppBundle:AnswerChallenge')->findAll();

        return $this->render('resources/index.html.twig');
    }

}