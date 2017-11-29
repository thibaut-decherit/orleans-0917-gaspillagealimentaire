<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TrainMenu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * TrainMenu controller.
 *
 * @Route("trainMenu")
 */
class TrainMenuController extends Controller
{
    /**
     * Lists all trainMenu entities.
     *
     * @Route("/", name="trainMenu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $trainMenus = $em->getRepository('AppBundle:TrainMenu')->findAll();

        return $this->render('TrainMenu/index.html.twig', array(
            'trainMenus' => $trainMenus,
        ));
    }

    /**
     * Creates a new trainMenu entity.
     *
     * @Route("/new", name="trainMenu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $trainMenu = new TrainMenu();
        $form = $this->createForm('AppBundle\Form\TrainMenuType', $trainMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($trainMenu);
            $em->flush();

            return $this->redirectToRoute('trainMenu_index', array('id' => $trainMenu->getId()));
        }

        return $this->render('TrainMenu/new.html.twig', array(
            'trainMenu' => $trainMenu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing trainMenu entity.
     *
     * @Route("/{id}/edit", name="trainMenu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TrainMenu $trainMenu)
    {
        $deleteForm = $this->createDeleteForm($trainMenu);
        $editForm = $this->createForm('AppBundle\Form\TrainMenuType', $trainMenu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trainMenu_edit', array('id' => $trainMenu->getId()));
        }

        return $this->render('TrainMenu/edit.html.twig', array(
            'trainMenu' => $trainMenu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a trainMenu entity.
     *
     * @Route("/{id}", name="trainMenu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TrainMenu $trainMenu)
    {
        $form = $this->createDeleteForm($trainMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($trainMenu);
            $em->flush();
        }

        return $this->redirectToRoute('trainMenu_index');
    }

    /**
     * Creates a form to delete a trainMenu entity.
     *
     * @param trainMenu $trainMenu The trainMenu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TrainMenu $trainMenu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trainMenu_delete', array('id' => $trainMenu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
