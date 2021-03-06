<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 08/01/18
 * Time: 13:51
 */

namespace AppBundle\Controller;


use AppBundle\Entity\ResourceTheme;
use AppBundle\Entity\Resource;
use AppBundle\Repository\ResourceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class ResourceController
 * @Route("ressources")
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
        $resources = null;
        $resourceThemes = $em->getRepository('AppBundle:ResourceTheme')->findBy([], ['id'=>'ASC']);
        if ($resourceThemes) {
            $resources = $em->getRepository('AppBundle:Resource')->findByResourceTheme($resourceThemes[0]->getId());
        }

        return $this->render('resources/index.html.twig', array(
            'resources' => $resources,
            'resourceThemes' => $resourceThemes,
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{id}", name="resources_by_theme")
     * @Method({"GET", "POST"})
     */
    public function pagesAction(ResourceTheme $resourceTheme)
    {
        $em = $this->getDoctrine()->getManager();

        $resourceThemes = $em->getRepository('AppBundle:ResourceTheme')->findAll();
        $resources = $em->getRepository('AppBundle:Resource')->findBy(['resourceTheme' => $resourceTheme->getId()]);

        return $this->render('resources/index.html.twig', array(
            'resources' => $resources,
            'resourceThemes' => $resourceThemes,
        ));
    }

}