<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * AdminGameController controller.
 *
 * @Route("admin/jeux")
 */
class AdminGameController extends Controller
{
    /**
     * Lists all game entities.
     *
     * @Route("/", name="admin_game_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $games = $em->getRepository('AppBundle:Game')->findAllDesc();

        return $this->render('admin/game/index.html.twig', array(
            'games' => $games,
        ));
    }

    /**
     * Creates a new game entity.
     *
     * @Route("/new", name="game_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $game = new Game();
        $form = $this->createForm('AppBundle\Form\GameNewType', $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $game->setUploadedAt(new \DateTime());
            $em->persist($game);
            $em->flush();

            return $this->redirectToRoute('admin_game_index', array('id' => $game->getId()));
        }

        return $this->render('admin/game/new.html.twig', array(
            'game' => $game,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing game entity.
     *
     * @Route("/{id}/edit", name="game_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Game $game)
    {
        $deleteForm = $this->createDeleteForm($game);
        $editForm = $this->createForm('AppBundle\Form\GameEditType', $game);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('game_edit', array('id' => $game->getId()));
        }

        return $this->render('admin/game/edit.html.twig', array(
            'game' => $game,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a game entity.
     *
     * @Route("/{id}", name="game_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Game $game)
    {
        $form = $this->createDeleteForm($game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($game);
            $em->flush();
        }

        return $this->redirectToRoute('admin_game_index');
    }

    /**
     * Creates a form to delete a game entity.
     *
     * @param game $game The game entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Game $game)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('game_delete', array('id' => $game->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @param Game $game
     * @Route("/toggled-checked/{id}", name="game_link_menu")
     * @Method({"GET", "POST"})
     */
    public function toggledCheck(Game $game)
    {
        $em = $this->getDoctrine()->getManager();

        $linksTrueNumber = count($em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]));

        if ($game->getIsMenu() == true) {
            $game->setIsMenu(false);
        } elseif (($game->getIsMenu() == false) && ($linksTrueNumber < 5)) {
            $game->setIsMenu(true);
        } else {
            $this->addFlash("Error", "Vous ne pouvez pas afficher plus de 5 liens à la fois. Désélectionnez un lien pour en afficher un nouveau.");
        }

        $em->persist($game);
        $em->flush();
        return $this->redirectToRoute('admin_game_index');
    }
}
