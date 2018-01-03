<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\DescriptionChallenge;

/**
 * ChallengeController controller.
 *
 * @Route("defis")
 */
class ChallengeController extends Controller
{
    /**
     * @Route("/maison", name="challenges_home_index")
     * @Method("GET")
     */
    public function indexHomeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $descriptionsChallenges = $em->getRepository('AppBundle:DescriptionChallenge')->findAll();

        return $this->render('challenge/indexHome.html.twig', array(
            'descriptionsChallenges' => $descriptionsChallenges,
        ));
    }

    /**
     * @Route("/ecole", name="challenges_school_index")
     * @Method("GET")
     */
    public function indexSchoolAction()
    {
        $em = $this->getDoctrine()->getManager();
        $descriptionsChallenges = $em->getRepository('AppBundle:DescriptionChallenge')->findAll();

        return $this->render('challenge/indexSchool.html.twig', array(
            'descriptionsChallenges' => $descriptionsChallenges,
        ));
    }

    /**
     * @Route("/association", name="challenges_organization_index")
     * @Method("GET")
     */
    public function indexOrganizationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $descriptionsChallenges = $em->getRepository('AppBundle:DescriptionChallenge')->findAll();

        return $this->render('challenge/indexOrganization.html.twig', array(
            'descriptionsChallenges' => $descriptionsChallenges,
        ));
    }
}
