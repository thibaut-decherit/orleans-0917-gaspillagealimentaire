<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 19/12/17
 * Time: 17:11
 */

namespace AppBundle\Controller;

use AppBundle\Entity\AnswerQuizz;
use AppBundle\Entity\QuestionQuizz;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * QuizzController controller
 * @package AppBundle\Controller
 * @Route("quizz")
 */
class QuizzController extends Controller
{
    /**
     * @Route("/", name="quizz_index")
     * @Method("GET")
     */
    public function quizzIndex()
    {
        $em = $this->getDoctrine()->getManager();

        $questions = $em->getRepository("AppBundle:QuestionQuizz")->findAll();
        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);

        return $this->render('quizz/index.html.twig', array(
            'questions' => $questions,
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }
}