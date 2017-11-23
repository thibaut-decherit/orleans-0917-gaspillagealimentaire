<?php

namespace AppBundle\Controller;

use AppBundle\Entity\trainMenu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Trainmenu controller.
 *
 * @Route("trainmenu")
 */
class trainMenuController extends Controller
{
    /**
     * Lists all trainMenu entities.
     *
     * @Route("/", name="trainmenu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $trainMenus = $em->getRepository('AppBundle:trainMenu')->findAll();

        return $this->render('trainmenu/index.html.twig', array(
            'trainMenus' => $trainMenus,
        ));
    }

    /**
     * Creates a new trainMenu entity.
     *
     * @Route("/new", name="trainmenu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $trainMenu = new Trainmenu();
        $form = $this->createForm('AppBundle\Form\trainMenuType', $trainMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($trainMenu);
            $em->flush();

            return $this->redirectToRoute('trainmenu_index', array('id' => $trainMenu->getId()));
        }

        return $this->render('trainmenu/new.html.twig', array(
            'trainMenu' => $trainMenu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing trainMenu entity.
     *
     * @Route("/{id}/edit", name="trainmenu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, trainMenu $trainMenu)
    {
        $deleteForm = $this->createDeleteForm($trainMenu);
        $editForm = $this->createForm('AppBundle\Form\trainMenuType', $trainMenu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trainmenu_edit', array('id' => $trainMenu->getId()));
        }

        return $this->render('trainmenu/edit.html.twig', array(
            'trainMenu' => $trainMenu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a trainMenu entity.
     *
     * @Route("/{id}", name="trainmenu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, trainMenu $trainMenu)
    {
        $form = $this->createDeleteForm($trainMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($trainMenu);
            $em->flush();
        }

        return $this->redirectToRoute('trainmenu_index');
    }

    /**
     * Creates a form to delete a trainMenu entity.
     *
     * @param trainMenu $trainMenu The trainMenu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(trainMenu $trainMenu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trainmenu_delete', array('id' => $trainMenu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
