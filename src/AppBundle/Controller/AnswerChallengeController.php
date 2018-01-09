<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AnswerChallenge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Answerchallenge controller.
 *
 * @Route("answerChallenge")
 */
class AnswerChallengeController extends Controller
{
    /**
     * Lists all answerChallenge entities.
     *
     * @Route("/", name="answerchallenge_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $answerChallenges = $em->getRepository('AppBundle:AnswerChallenge')->findAll();

        return $this->render('answerchallenge/index.html.twig', array(
            'answerChallenges' => $answerChallenges,
        ));
    }

    /**
     * Creates a new answerChallenge entity.
     *
     * @Route("/new", name="answerchallenge_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $answerChallenge = new Answerchallenge();
        $form = $this->createForm('AppBundle\Form\AnswerChallengeType', $answerChallenge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($answerChallenge);
            $em->flush();

            return $this->redirectToRoute('answerchallenge_show', array('id' => $answerChallenge->getId()));
        }

        return $this->render('challenge/indexResponseChallenge.html.twig', array(
            'answerChallenge' => $answerChallenge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a answerChallenge entity.
     *
     * @Route("/{id}", name="answerchallenge_show")
     * @Method("GET")
     */
    public function showAction(AnswerChallenge $answerChallenge)
    {
        $deleteForm = $this->createDeleteForm($answerChallenge);

        return $this->render('answerchallenge/show.html.twig', array(
            'answerChallenge' => $answerChallenge,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing answerChallenge entity.
     *
     * @Route("/{id}/edit", name="answerchallenge_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AnswerChallenge $answerChallenge)
    {
        $deleteForm = $this->createDeleteForm($answerChallenge);
        $editForm = $this->createForm('AppBundle\Form\AnswerChallengeType', $answerChallenge);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('answerchallenge_edit', array('id' => $answerChallenge->getId()));
        }

        return $this->render('answerchallenge/edit.html.twig', array(
            'answerChallenge' => $answerChallenge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a answerChallenge entity.
     *
     * @Route("/{id}", name="answerchallenge_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AnswerChallenge $answerChallenge)
    {
        $form = $this->createDeleteForm($answerChallenge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($answerChallenge);
            $em->flush();
        }

        return $this->redirectToRoute('answerchallenge_index');
    }

    /**
     * Creates a form to delete a answerChallenge entity.
     *
     * @param AnswerChallenge $answerChallenge The answerChallenge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnswerChallenge $answerChallenge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('answerchallenge_delete', array('id' => $answerChallenge->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
