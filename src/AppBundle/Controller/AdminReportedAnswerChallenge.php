<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AnswerChallenge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * AdminReportedAnswerChallenge controller.
 *
 * @Route("admin/moderation")
 */
class AdminReportedAnswerChallenge extends Controller
{
    /**
     * Lists all answerChallenge entities where isReport == true.
     *
     * @Route("/", name="admin_reported_answerchallenge_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adminReportedAnswerChallenges = $em->getRepository('AppBundle:AnswerChallenge')
            ->findby(['isReport' => true], ['id' => 'DESC']);

        $deleteForms = [];

        foreach ($adminReportedAnswerChallenges as $adminReportedAnswerChallenge) {
            $deleteForm = $this->createDeleteForm($adminReportedAnswerChallenge)->createView();
            $deleteForms[$adminReportedAnswerChallenge->getId()] = $deleteForm;
        }

        return $this->render('admin/reportedAnswerChallenge/index.html.twig', array(
            'adminReportedAnswerChallenges' => $adminReportedAnswerChallenges,
            'delete_form' => $deleteForms,
        ));
    }

    /**
     * @param AnswerChallenge $answerChallenge
     * @Route("/unreport/{id}", name="unreport_content")
     * @Method({"GET", "POST"})
     */
    public function toggledCheck(AnswerChallenge $answerChallenge)
    {
        $em = $this->getDoctrine()->getManager();

        if ($answerChallenge->getIsReport() == true) {
            $answerChallenge->setIsReport(false);
        }

        $em->persist($answerChallenge);
        $em->flush();
        $this->addFlash(
            "success",
            "Le contenu a été autorisé."
        );

        return $this->redirectToRoute('admin_reported_answerchallenge_index');
    }

    /**
     * Deletes a answerChallenge entity where isReport == true.
     *
     * @Route("/{id}", name="answerChallenge_delete")
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
            $this->addFlash(
                "success",
                "Le contenu a été supprimé."
            );
        }

        return $this->redirectToRoute('admin_reported_answerchallenge_index');
    }

    /**
     * Creates a form to delete a answerChallenge entity where isReport == true.
     *
     * @param answerChallenge $answerChallenge The answerChallenge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnswerChallenge $answerChallenge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('answerChallenge_delete', array('id' => $answerChallenge->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
