<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DescriptionChallenge;
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
     * @Route("/{id}/participer", name="responsechallenge_index")
     * @Method({"GET", "POST"})
     */
    public function indexResponseAction(Request $request, DescriptionChallenge $descriptionChallenge)
    {
        $em = $this->getDoctrine()->getManager();
        $challengeId = $descriptionChallenge->getId();
        $answers = $this
            ->getDoctrine()->getRepository("AppBundle:AnswerChallenge")
            ->createQueryBuilder('a')->where("a.description = $challengeId");

        $paginator = $this->get('knp_paginator');
        $answers = $paginator->paginate(
            $answers,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );

        $answerChallenge = new Answerchallenge();

        if ($descriptionChallenge->getIsPicture()) {
            $form = $this->createForm('AppBundle\Form\AnswerChallengeType', $answerChallenge, array(
                'action' => '#formulaire'
            ));
        } else {
            $form = $this->createForm('AppBundle\Form\AnswerChallengeTextType', $answerChallenge, array(
                'action' => '#formulaire'
            ));
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $answerChallenge->setDescription($descriptionChallenge);
            $answerChallenge->setIsReport(false);
            $em->persist($answerChallenge);
            $em->flush();

            $this->addFlash(
                "success",
                "Ton défi a été envoyé ! Tu peux le retrouver plus bas sur cette page."
            );

            return $this->redirectToRoute('responsechallenge_index', [
                    'id' => $descriptionChallenge->getId()
                ]
            );
        }

        return $this->render('challenge/indexResponseChallenge.html.twig', array(
            'descriptionChallenge' => $descriptionChallenge,
            'answerChallenge' => $answerChallenge,
            'answers' => $answers,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param AnswerChallenge $answerChallenge
     * @Route("/report/{id}", name="report_content")
     * @Method({"GET", "POST"})
     */
    public function toggledCheck(AnswerChallenge $answerChallenge)
    {
        if ($answerChallenge->getIsReport() == false) {
            $em = $this->getDoctrine()->getManager();
            $answerChallenge->setIsReport(true);

            $adminEmail = $em->getRepository('AppBundle:AdminEmail')->findOneBy([])->getEmail();
            $adminUrl = $this->getParameter('admin_url');

            $em->persist($answerChallenge);
            $em->flush();

            $message = \Swift_Message::newInstance()
                ->setSubject("Rest' à table - Signalement de contenu")
                ->setFrom($this->getParameter('mailer_user'))
                ->setTo($adminEmail)
                ->setBody(
                    $this->renderView('mail/mail.html.twig',
                        ['adminUrl' => $adminUrl]),
                    'text/html'
                );

            $this->get('mailer')->send($message);
        }

        $this->addFlash(
            "success",
            "Le défi a été signalé à un modérateur."
        );

        return $this->redirectToRoute('responsechallenge_index',
            ['id' => $answerChallenge->getDescription()->getId(),
                '_fragment' => 'formulaire']);
    }
}
