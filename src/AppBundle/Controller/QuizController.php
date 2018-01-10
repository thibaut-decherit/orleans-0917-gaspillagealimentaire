<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\QuestionQuizz;
use AppBundle\Entity\QuizzTitle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/{id}/{questionNbr}", name="quizTest")
     * @Method({"GET", "POST"})
     */
    public function quizzIndex(QuizzTitle $quizzTitle, int $questionNbr)
    {
        $em = $this->getDoctrine()->getManager();

        $question = $em->getRepository("AppBundle:QuestionQuizz")->findOneBy([
            'titleQuizz' => $quizzTitle->getId(),
            'questionNbr' => $questionNbr
        ]);
        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);

        return $this->render('quiz/question.html.twig', array(
            'question' => $question,
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }

    /**
     * @Route("/reponse", name="quizzAnswer")
     * @Method({"GET", "POST"})
     */
    public function quizzAnswer(Request $request)
    {

        $em = $this->getDoctrine()->getManager();


        $answerId = $request->request->get('answer');
        $answerQuizz = $em->getRepository("AppBundle:AnswerQuizz")->find($answerId);
        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);

        return $this->render('quiz/answer.html.twig', array(
            'answer' => $answerQuizz,
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }
}
