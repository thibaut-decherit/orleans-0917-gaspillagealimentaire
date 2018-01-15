<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DescriptionChallenge;
use AppBundle\Entity\CategoryChallenge;
use AppBundle\Entity\AnswerChallenge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Descriptionchallenge controller.
 *
 * @Route("defis")
 */
class DescriptionChallengeController extends Controller
{
    /**
     * @Route("/maison", name="challenges_home_index")
     * @Method("GET")
     */
    public function indexHomeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AppBundle:CategoryChallenge')->findBy(['name' => 'home']);
        $descriptionsChallenges = $em->getRepository('AppBundle:DescriptionChallenge')->findBy(['category' => $category]);

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
        $category = $em->getRepository('AppBundle:CategoryChallenge')->findBy(['name' => 'school']);
        $descriptionsChallenges = $em->getRepository('AppBundle:DescriptionChallenge')->findBy(['category' => $category]);

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
        $category = $em->getRepository('AppBundle:CategoryChallenge')->findBy(['name' => 'organization']);
        $descriptionsChallenges = $em->getRepository('AppBundle:DescriptionChallenge')->findBy(['category' => $category]);

        return $this->render('challenge/indexOrganization.html.twig', array(
            'descriptionsChallenges' => $descriptionsChallenges,
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{id}/response", name="responsechallenge_index")
     * @Method({"GET", "POST"})
     */
    public function indexResponseAction(Request $request, DescriptionChallenge $descriptionChallenge)
    {
        $em = $this->getDoctrine()->getManager();

        $answerChallenge = new Answerchallenge();

        $form = $this->createForm('AppBundle\Form\AnswerChallengeType', $answerChallenge);
        $form->handleRequest($request);

        $form2 = $this->createForm('AppBundle\Form\AnswerChallengeTextType', $answerChallenge);
        $form2->handleRequest($request);

        if (($form->isSubmitted() && $form->isValid()) || ($form2->isSubmitted() && $form2->isValid())) {
            $em = $this->getDoctrine()->getManager();
            $answerChallenge->setDescription($descriptionChallenge);
            $answerChallenge->setIsReport(false);
            $answerChallenge->setUploadedAt(new \DateTime());
            $em->persist($answerChallenge);
            $em->flush();
            $this->addFlash(
                "success",
                "Le défi a été envoyé."
            );

            return $this->redirectToRoute('responsechallenge_index', [
                    'id' => $descriptionChallenge->getId()
                ]
            );
        }

        return $this->render('challenge/indexResponseChallenge.html.twig', array(
            'descriptionChallenge' => $descriptionChallenge,
            'answerChallenge' => $answerChallenge,
            'form' => $form->createView(),
            'form2' => $form2->createView(),
        ));
    }

    /**
     * @param AnswerChallenge $answerChallenge
     * @Route("/report/{id}", name="report_content")
     * @Method({"GET", "POST"})
     */
    public function toggledCheck(AnswerChallenge $answerChallenge)
    {
        $em = $this->getDoctrine()->getManager();

        $answerChallenge->setIsReport(true);

        $adminEmail = $em->getRepository('AppBundle:AdminEmail')->findOneBy([])->getEmail();

        $em->persist($answerChallenge);
        $em->flush();
        $this->addFlash(
            "successReport",
            "Le contenu a été signalé."
        );

        $message = \Swift_Message::newInstance()
            ->setSubject('Rest\'aTable - Signalement de contenu')
            ->setFrom($this->getParameter('mailer_user'))
            ->setTo($adminEmail)
            ->setBody(
                $this->renderView('mail/mail.html.twig'),
                'text/html'
            );

        $this->get('mailer')->send($message);
        return $this->redirectToRoute('responsechallenge_index',
            ['id' => $answerChallenge->getDescription()->getId(),
            '_fragment' => 'reponses']);
    }
}
