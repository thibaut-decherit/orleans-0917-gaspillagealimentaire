<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Resource;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * AdminResource controller.
 *
 * @Route("admin/resource")
 */
class AdminResourceController extends Controller
{
    /**
     * Lists all resource entities.
     *
     * @Route("/", name="admin_resource_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $resources = $em->getRepository('AppBundle:Resource')->findAllDesc();

        return $this->render('admin/resource/index.html.twig', array(
            'resources' => $resources,
        ));
    }

    /**
     * Creates a new resource entity.
     *
     * @Route("/nouveau", name="admin_resource_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $resource = new Resource();
        $form = $this->createForm('AppBundle\Form\ResourceNewType', $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resource);
            $em->flush();

            $this->addFlash(
                "success",
                "La ressource a été ajoutée."
            );

            return $this->redirectToRoute('admin_resource_index', array('id' => $resource->getId()));
        }

        return $this->render('admin/resource/new.html.twig', array(
            'resource' => $resource,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resource entity.
     *
     * @Route("/{id}/modifier", name="admin_resource_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Resource $resource)
    {
        $deleteForm = $this->createDeleteForm($resource);
        $editForm = $this->createForm('AppBundle\Form\ResourceEditType', $resource);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                "success",
                "La ressource a été modifiée."
            );

            return $this->redirectToRoute('admin_resource_edit', array('id' => $resource->getId()));
        }

        return $this->render('admin/resource/edit.html.twig', array(
            'resource' => $resource,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resource entity.
     *
     * @Route("/{id}", name="admin_resource_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Resource $resource)
    {
        $form = $this->createDeleteForm($resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resource);
            $em->flush();

            $this->addFlash(
                "success",
                "La ressource a été supprimée."
            );
        }

        return $this->redirectToRoute('admin_resource_index');
    }

    /**
     * Creates a form to delete a resource entity.
     *
     * @param resource $resource The resource entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Resource $resource)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_resource_delete', array('id' => $resource->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
