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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->clear();
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
        $nbrMax = 0;


        $em = $this->getDoctrine()->getManager();
        $test = $em->getRepository("AppBundle:QuestionQuizz")->findBy([
            'titleQuizz' => $quizzTitle->getId(),
        ]);

        $question = $em->getRepository("AppBundle:QuestionQuizz")->findOneBy([
            'titleQuizz' => $quizzTitle->getId(),
            'questionNbr' => $questionNbr,
        ]);

        foreach ($test as $nbr) {
            $nbrMax++;
        }
        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);

        return $this->render('quiz/question.html.twig', array(
            'quizzTitle' => $quizzTitle->getId(),
            'question' => $question,
            'nbrMax' => $nbrMax,
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }

    /**
     * @Route("/{quizzTitle}-{questionNbr}-{nbrMax}", name="quizzAnswer")
     * @Method({"GET", "POST"})
     */
    public function quizzAnswer(Request $request, $nbrMax, int $questionNbr, QuizzTitle $quizzTitle)
    {
        $em = $this->getDoctrine()->getManager();
        $answerId = $request->request->get('answer');
        if ($answerId != null) {
            $answerQuizz = $em->getRepository("AppBundle:AnswerQuizz")->find($answerId);
            $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
            $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);
            $session = $request->getSession();
            if ($answerQuizz->getIsTrue() === true) {
                $session->set('points', $session->get('points') + 1);
            }
            return $this->render('quiz/answer.html.twig', array(
                'nbrMax' => $nbrMax,
                'answer' => $answerQuizz,
                'navInformLinks' => $navInformLinks,
                'navGameLinks' => $navGameLinks,
            ));
        } else {
            return $this->redirectToRoute('quizTest', array(
                'questionNbr' => $questionNbr,
                'id' => $quizzTitle->getId(),
            ));
        }
    }

    /**
     * @Route("/resultatQuizz{id}-{nbrMax}", name="quizzResultat")
     * @Method({"GET", "POST"})
     */
    public function resultatQuizz(Request $request, QuizzTitle $quizzTitle, int $nbrMax)
    {
        $em = $this->getDoctrine()->getManager();
        $question = $em->getRepository("AppBundle:QuestionQuizz")->findOneBy([
            'titleQuizz' => $quizzTitle->getId(),
        ]);
        $session = $request->getSession();
        $points = $session->get('points');
        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);

        return $this->render('quiz/resultat.html.twig', array(
            'points' => $points,
            'nbrMax' => $nbrMax,
            'question' => $question,
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }
}
