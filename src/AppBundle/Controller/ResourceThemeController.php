<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ResourceTheme;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Resourcetheme controller.
 *
 * @Route("resourcetheme")
 */
class ResourceThemeController extends Controller
{
    /**
     * Lists all resourceTheme entities.
     *
     * @Route("/", name="resourcetheme_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resourceThemes = $em->getRepository('AppBundle:ResourceTheme')->findAll();

        return $this->render('resourcetheme/index.html.twig', array(
            'resourceThemes' => $resourceThemes,
        ));
    }

    /**
     * Creates a new resourceTheme entity.
     *
     * @Route("/new", name="resourcetheme_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $resourceTheme = new Resourcetheme();
        $form = $this->createForm('AppBundle\Form\ResourceThemeType', $resourceTheme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resourceTheme);
            $em->flush();

            return $this->redirectToRoute('resourcetheme_show', array('id' => $resourceTheme->getId()));
        }

        return $this->render('resourcetheme/new.html.twig', array(
            'resourceTheme' => $resourceTheme,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resourceTheme entity.
     *
     * @Route("/{id}", name="resourcetheme_show")
     * @Method("GET")
     */
    public function showAction(ResourceTheme $resourceTheme)
    {
        $deleteForm = $this->createDeleteForm($resourceTheme);

        return $this->render('resourcetheme/show.html.twig', array(
            'resourceTheme' => $resourceTheme,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resourceTheme entity.
     *
     * @Route("/{id}/edit", name="resourcetheme_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ResourceTheme $resourceTheme)
    {
        $deleteForm = $this->createDeleteForm($resourceTheme);
        $editForm = $this->createForm('AppBundle\Form\ResourceThemeType', $resourceTheme);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resourcetheme_edit', array('id' => $resourceTheme->getId()));
        }

        return $this->render('resourcetheme/edit.html.twig', array(
            'resourceTheme' => $resourceTheme,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resourceTheme entity.
     *
     * @Route("/{id}", name="resourcetheme_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ResourceTheme $resourceTheme)
    {
        $form = $this->createDeleteForm($resourceTheme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resourceTheme);
            $em->flush();
        }

        return $this->redirectToRoute('resourcetheme_index');
    }

    /**
     * Creates a form to delete a resourceTheme entity.
     *
     * @param ResourceTheme $resourceTheme The resourceTheme entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ResourceTheme $resourceTheme)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resourcetheme_delete', array('id' => $resourceTheme->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
