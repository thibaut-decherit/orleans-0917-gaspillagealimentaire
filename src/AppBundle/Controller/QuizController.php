<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\QuestionQuizz;
use AppBundle\Entity\QuizzTitle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * QuizController controller.
 *
 * @Route("quiz")
 */
class QuizController extends Controller
{
    /**
     * Lists all quiz entities.
     *
     * @Route("/", name="quiz_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $quizz = $em->getRepository('AppBundle:QuizzTitle')->findAll();
        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);


        return $this->render('quiz/index.html.twig', array(
            'quizz' => $quizz,
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }

    /**
     * @Route("/{id}", name="quizTest")
     * @Method({"GET", "POST"})
     */
    public function quizzIndex($id)
    {
        $em = $this->getDoctrine()->getManager();

        $question = $em->getRepository("AppBundle:QuestionQuizz")->findOneBy(['titleQuizz' => $id]);
        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);

        return $this->render('quiz/alimentation.html.twig', array(
            'question' => $question,
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }

    /**
     * @param Request $request
     * @Route("/quizzAnswer", name="quizz_answer")
     * @Method({"GET", "POST"})
     * @return JsonResponse
     */
    public function quizzAnswer(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if ($request->isXmlHttpRequest()) {
            $id = $request->query->get('id');
            $data = $em->getRepository("AppBundle:QuestionQuizz")->find($id + 1);

            return new JsonResponse(array("data" => json_encode($data)));
        }
    }
}
