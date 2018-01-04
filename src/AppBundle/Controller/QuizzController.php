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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * QuizzController controller
 * @package AppBundle\Controller
 * @Route("alimentation")
 */
class QuizzController extends Controller
{
    /**
     * @Route("/", name="quiz/{name}")
     * @Method({"GET", "POST"})
     */
    public function quizzIndex($id)
    {
        $em = $this->getDoctrine()->getManager();

        $question = $em->getRepository("AppBundle:QuestionQuizz")->findBy(['title_quizz_id' => $id]);
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