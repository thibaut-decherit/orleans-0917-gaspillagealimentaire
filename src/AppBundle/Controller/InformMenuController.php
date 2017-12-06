<?php

namespace AppBundle\Controller;

use AppBundle\Entity\InformMenu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * InformMenu controller.
 *
 * @Route("inform_menu")
 */
class InformMenuController extends Controller
{
    /**
     * Lists all informMenu entities.
     *
     * @Route("/", name="admin_inform_menu_index")
     * @Method("GET")
     */
    public function adminIndexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $informMenus = $em->getRepository('AppBundle:InformMenu')->findAll();

        return $this->render('admin/informMenu/index.html.twig', array(
            'informMenus' => $informMenus,
        ));
    }

    /**
     * Lists all informMenu entities.
     *
     * @Route("/", name="public_inform_menu_index")
     * @Method("GET")
     */
    public function publicIndexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $informMenus = $em->getRepository('AppBundle:InformMenu')->findAll();

        return $this->render('admin/informMenu/index.html.twig', array(
            'informMenus' => $informMenus,
        ));
    }

    /**
     * Creates a new informMenu entity.
     *
     * @Route("/new", name="admin_inform_menu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $informMenu = new InformMenu();
        $form = $this->createForm('AppBundle\Form\InformMenuType', $informMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $informMenu->setUploadDate(new \DateTime());
            $em->persist($informMenu);
            $em->flush();

            return $this->redirectToRoute('admin_inform_menu_index', array('id' => $informMenu->getId()));
        }

        return $this->render('admin/informMenu/new.html.twig', array(
            'informMenu' => $informMenu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing informMenu entity.
     *
     * @Route("/{id}/edit", name="admin_inform_menu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InformMenu $informMenu)
    {
        $deleteForm = $this->createDeleteForm($informMenu);
        $editForm = $this->createForm('AppBundle\Form\InformMenuType', $informMenu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_inform_menu_edit', array('id' => $informMenu->getId()));
        }

        return $this->render('admin/informMenu/edit.html.twig', array(
            'informMenu' => $informMenu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a informMenu entity.
     *
     * @Route("/{id}", name="admin_inform_menu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InformMenu $informMenu)
    {
        $form = $this->createDeleteForm($informMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($informMenu);
            $em->flush();
        }

        return $this->redirectToRoute('admin_inform_menu_index');
    }

    /**
     * Creates a form to delete a informMenu entity.
     *
     * @param informMenu $informMenu The informMenu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InformMenu $informMenu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_inform_menu_delete', array('id' => $informMenu->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
