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
     * Displays a form to edit an existing challenge entity.
     *
     * @Route("/{id}/edit", name="descriptionchallenge_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DescriptionChallenge $descriptionChallenge)
    {
        $deleteForm = $this->createDeleteForm($descriptionChallenge);
        $editForm = $this->createForm('AppBundle\Form\DescriptionChallengeType', $descriptionChallenge);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('descriptionchallenge_edit', array('id' => $descriptionChallenge->getId()));
        }

        return $this->render('challenge/edit.html.twig', array(
            'challenge' => $descriptionChallenge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a challenge entity.
     *
     * @Route("/{id}", name="descriptionchallenge_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DescriptionChallenge $descriptionChallenge)
    {
        $form = $this->createDeleteForm($descriptionChallenge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($descriptionChallenge);
            $em->flush();
        }

        return $this->redirectToRoute('challenge_index');
    }

    /**
     * Creates a form to delete a challenge entity.
     *
     * @param DescriptionChallenge $descriptionChallenge The challenge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DescriptionChallenge $descriptionChallenge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('descriptionchallenge_delete', array('id' => $descriptionChallenge->getId())))
            ->setMethod('DELETE')
            ->getForm();
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
        $em->getRepository('AppBundle:DescriptionChallenge')->findOneBy(['id' => $descriptionChallenge->getId()]);

        $answerChallenge = new Answerchallenge();
        $form = $this->createForm('AppBundle\Form\AnswerChallengeType', $answerChallenge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($answerChallenge);
            $em->flush();

            return $this->redirectToRoute('responsechallenge_index', array('id' => $descriptionChallenge->getId()));
        }

        $answers = $em->getRepository('AppBundle:AnswerChallenge')->findAllDesc();

        $lastAnswer = $em->getRepository('AppBundle:AnswerChallenge')->findOneBy([], ['id' => 'DESC']);

        return $this->render('challenge/indexResponseChallenge.html.twig', array(
            'descriptionChallenge' => $descriptionChallenge,
            'answerChallenge' => $answerChallenge,
            'form' => $form->createView(),
            'answers' => $answers,
            'lastAnswer' => $lastAnswer,
        ));
    }


}
