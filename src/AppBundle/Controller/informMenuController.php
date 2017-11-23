<?php

namespace AppBundle\Controller;

use AppBundle\Entity\informMenu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Informmenu controller.
 *
 * @Route("informmenu")
 */
class informMenuController extends Controller
{
    /**
     * Lists all informMenu entities.
     *
     * @Route("/", name="informmenu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $informMenus = $em->getRepository('AppBundle:informMenu')->findAll();

        return $this->render('informmenu/index.html.twig', array(
            'informMenus' => $informMenus,
        ));
    }

    /**
     * Creates a new informMenu entity.
     *
     * @Route("/new", name="informmenu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $informMenu = new informMenu();
        $form = $this->createForm('AppBundle\Form\informMenuType', $informMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($informMenu);
            $em->flush();

            return $this->redirectToRoute('informmenu_index', array('id' => $informMenu->getId()));
        }

        return $this->render('informmenu/new.html.twig', array(
            'informmenu' => $informMenu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing informMenu entity.
     *
     * @Route("/{id}/edit", name="informmenu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, informMenu $informMenu)
    {
        $deleteForm = $this->createDeleteForm($informMenu);
        $editForm = $this->createForm('AppBundle\Form\menuInformerType', $informMenu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('informmenu_edit', array('id' => $informMenu->getId()));
        }

        return $this->render('informmenu/edit.html.twig', array(
            'menuInformer' => $informMenu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a informMenu entity.
     *
     * @Route("/{id}", name="informmenu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, informMenu $informMenu)
    {
        $form = $this->createDeleteForm($informMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($informMenu);
            $em->flush();
        }

        return $this->redirectToRoute('informmenu_index');
    }

    /**
     * Creates a form to delete a informMenu entity.
     *
     * @param informMenu $informMenu The informMenu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(informMenu $informMenu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('informmenu_delete', array('id' => $informMenu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
