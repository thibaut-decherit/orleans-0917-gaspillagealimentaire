<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AdminEmail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Adminemail controller.
 *
 * @Route("admin/mail-administrateur")
 */
class AdminEmailController extends Controller
{
    /**
     * Displays a form to edit the adminEmail entity.
     *
     * @Route("/", name="adminemail_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $adminEmail = $em->getRepository('AppBundle:AdminEmail')->findOneBy([]);
        if (!$adminEmail) {
            $adminEmail = new AdminEmail();
        }
        $editForm = $this->createForm('AppBundle\Form\AdminEmailType', $adminEmail);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $em->persist($adminEmail);
            $em->flush();

            return $this->redirectToRoute('adminemail_edit');
        }

        return $this->render('admin/adminEmail/edit.html.twig', array(
            'adminEmail' => $adminEmail,
            'edit_form' => $editForm->createView(),
        ));
    }
}
