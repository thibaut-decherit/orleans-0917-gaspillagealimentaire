<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 19/12/17
 * Time: 17:11
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\AnswerQuizz;
use AppBundle\Entity\QuestionQuizz;
use Doctrine\ORM\Mapping\Id;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * QuizzController controller
 * @package AppBundle\Controller
 * @Route("quizz")
 */
class QuizzController extends Controller
{
    /**
     * @Route("/", name="quizz_index")
     * @Method({"GET", "POST"})
     */
    public function quizzIndex()
    {
        $em = $this->getDoctrine()->getManager();

        $question = $em->getRepository("AppBundle:QuestionQuizz")->find(1);
        $navInformLinks = $em->getRepository('AppBundle:InformMenu')->findBy(['isMenu' => true]);
        $navGameLinks = $em->getRepository('AppBundle:Game')->findBy(['isMenu' => true]);

        return $this->render('quizz/index.html.twig', array(
            'question' => $question,
            'navInformLinks' => $navInformLinks,
            'navGameLinks' => $navGameLinks,
        ));
    }
}